<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    private $spreadsheetId = "1-vCmh2FQ1uWJH3MA103_uZ4QNcxg1eSvZ7ClWV0PBpM";

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function appendRow(Request $request)
    {
        // throw new HttpResponseException(response()->json([
        //     'success' => false,
        //     'message' => 'Error occurred while processing the request',
        //     'request_details' => $request->json()->all(),
        // ], 400));

        $client = $this->getClient();
        $service = new Google_Service_Sheets($client);

        $columns = array("date", "time", "name", "phone", "stylist", "ratingStylist", "ratingSpeed", "ratingOverall", "aboutUs", "comments");

        // Get values to append
        $values = [
            array_map(function($column) use ($request) {
                if($column == "date") {
                    return date("d-m-y");
                } else if($column == "time") {
                    return date("h:i:s");
                } else {
                    return $request->json($column);
                }
            }, $columns)
        ];

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $range = 'Sheet1'; // Change to your specific sheet name and range

        $result = $service->spreadsheets_values->append(
            $this->spreadsheetId,
            $range,
            $body,
            $params
        );

        return response()->json(data: ['success' => true, 'updatedRange' => $result->getUpdates()->getUpdatedRange()]);
    }

    private function getClient() {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API Laravel');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig(storage_path('app/credentials.json')); // Path to your credentials.json
        $client->setAccessType('offline');

        $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $client->setHttpClient($guzzleClient);

        return $client;
    }
}
