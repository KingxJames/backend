<?php

// namespace App\Services;

// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;

// class FCMService
// {
//     protected $client;

//     public function __construct()
//     {
//         $this->client = new Client([
//             'base_uri' => 'https://fcm.googleapis.com/fcm/',
//         ]);
//     }

//     public function sendNotification($deviceToken, $title, $body)
//     {
//         try {
//             $response = $this->client->post('send', [
//                 'headers' => [
//                     'Authorization' => 'key=' . env('FCM_SERVER_KEY'), // Use an environment variable
//                     'Content-Type' => 'application/json',
//                 ],
//                 'json' => [
//                     'to' => $deviceToken,
//                     'notification' => [
//                         'title' => $title,
//                         'body' => $body,
//                     ],
//                 ],
//             ]);

//             return json_decode($response->getBody()->getContents(), true);
//         } catch (RequestException $e) {
//             // Handle the error, you can log it or return an error response
//             return [
//                 'error' => true,
//                 'message' => $e->getMessage(),
//                 'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null,
//             ];
//         }
//     }
// }

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FCMService
{
    protected $client;
    protected $projectId;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://fcm.googleapis.com/v1/projects/' . env('FCM_PROJECT_ID') . '/messages:send',
        ]);
        $this->projectId = env('FCM_PROJECT_ID'); // Set your project ID
    }

    public function sendNotification($deviceToken, $title, $body)
    {
        // Get OAuth2 token for authentication
        $accessToken = $this->getAccessToken();

        try {
            $response = $this->client->post('', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'message' => [
                        'token' => $deviceToken,
                        'notification' => [
                            'title' => $title,
                            'body' => $body,
                        ],
                    ],
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ];
        }
    }

    protected function getAccessToken()
    {
        // Implement your logic to obtain an OAuth2 token
        // For example, you can use the Google API Client Library
        // or use your service account's JSON key file to fetch the token

        $serviceAccountKeyFilePath = env('GOOGLE_APPLICATION_CREDENTIALS'); // Path to your service account key file

        $client = new \Google_Client();
        $client->setAuthConfig($serviceAccountKeyFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        // Get the access token
        return $client->fetchAccessTokenWithAssertion()['access_token'];
    }
}
