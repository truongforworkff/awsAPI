<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use GuzzleHttp\Client;

class ApiController extends Controller
{
    //

    public function fetchData()
    {
        $queryParams = [
            'api_key' => 'B6701164B46C4DF9ADABB4246FCE66F5',
            'type' => 'search',
            'amazon_domain' => 'amazon.com',
            'search_term' => '*',
            'category_id' => '1000',
            'page' => '1'
        ];

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.rainforestapi.com/request', [
                'query' => $queryParams,
                'verify' => false,
                'timeout' => 180
            ]);

            $apiResult = $response->getBody()->getContents();
            $apiResult = json_decode($apiResult, true);

          

// Truy xuất thông tin từ trường "search_results"
            $searchResults = $apiResult['search_results'];

            return view('api_result', compact('searchResults'));
            // return response()->json($apiResult);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
