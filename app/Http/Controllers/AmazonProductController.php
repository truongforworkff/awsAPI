<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\ProductAdvertising\ProductAdvertisingClient;
use GuzzleHttp\Client;
class AmazonProductController extends Controller
{

    public function getProductInfo()
    {
        // $client = new ProductAdvertisingClient([
        //     'version' => 'latest',
        //     'region' => 'us-east-1', // Định kỳ AWS của bạn
        //     'credentials' => [
        //         'key' => config('aws.access_key'),
        //         'secret' => config('aws.secret_key'),
        //     ],
        // ]);

        // $response = $client->search([
        //     'Keywords' => 'Python book',
        //     'SearchIndex' => 'Books',
        // ]);

        // $items = $response['Items'];

        // Xử lý dữ liệu và trả về view
        // return view('product', ['items' => $items]);
    }
    
}
