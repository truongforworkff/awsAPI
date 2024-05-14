<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\AwsClient; 
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AmazonController extends Controller
{
    //
    public function getProductInfo()
    {
        // Khởi tạo client của AWS SDK for PHP
        $client = new Client();
        try {
        $response = $client->request('GET', 'https://webservices.amazon.com/onca/xml', [
            'query' => [
                'Service' => 'AWSECommerceService',
                'Operation' => 'ItemSearch',
                'AWSAccessKeyId' => env('AWS_ACCESS_KEY_ID'),
                'Keywords' => 'Razer BlackShark V2 X Gaming Headset',
                'SearchIndex' => 'Electronics',
                'ResponseGroup' => 'ItemAttributes,Images',
            ]
        ]);

        $xml = simplexml_load_string($response->getBody()->getContents());
        $items = [];
        
        foreach ($xml->Items->Item as $item) {
            $product = [
                'Title' => (string)$item->ItemAttributes->Title,
                'Price' => (string)$item->ItemAttributes->ListPrice->FormattedPrice,
                'URL' => (string)$item->DetailPageURL,
                'Image' => (string)$item->MediumImage->URL,
            ];
            $items[] = $product;
        }

        return view('product', ['items' => $items]);
    }catch (ClientException $e) {
        // Xử lý ngoại lệ khi xảy ra lỗi
        $statusCode = $e->getResponse()->getStatusCode();
        if ($statusCode == 410) {
            // Xử lý khi API Endpoint không tồn tại
            return view('error', ['message' => 'API Endpoint không tồn tại']);
        } else {
            // Xử lý khi thông tin xác thực không chính xác
            return view('error', ['message' => 'Thông tin xác thực không chính xác hoặc hết hạn']);
        }
    }
}
    
}
