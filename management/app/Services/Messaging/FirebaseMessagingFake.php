<?php

namespace App\Services\Messaging;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Http\Client\Response;

class FirebaseMessagingFake extends FirebaseMessaging
{
    /**
     * Request to $url with $header and $data.
     * 
     * @return bool
     */
    protected function request()
    {
        $guzzleResponse = new GuzzleResponse(200, [], json_encode(['message_id' => 1, 'results' => []]));

        $this->response = new Response($guzzleResponse);

        return true;
    }
}
