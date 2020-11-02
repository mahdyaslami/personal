<?php

namespace App\Services\Messaging;

use Illuminate\Support\Facades\Http;

/**
 * Firebase Cloud Messaging HTTP protocol | Older than v1
 * https://firebase.google.com/docs/cloud-messaging/http-server-ref#error-codes
 * https://firebase.google.com/docs/cloud-messaging/send-message#send_using_the_fcm_legacy_http_api
 * 
 * REST Resource: projects.messages | v1
 * https://firebase.google.com/docs/reference/fcm/rest/v1/projects.messages
 * 
 * Send messages to topics | Topic naming restriction
 * https://firebase.google.com/docs/cloud-messaging/send-message#send-messages-to-topics
 * 
 * Server Reference
 * https://developers.google.com/instance-id/reference/server
 * 
 */
class FirebaseMessaging
{
    /**
     * Firebase default header.
     * 
     * @var array
     */
    protected $header;

    /**
     * Response of the request to firebase.
     * 
     * @var \Illuminate\Http\Client\Response
     */
    protected $response;

    /**
     * Url for requesting.
     * 
     * @var string
     */
    protected $url;

    /**
     * Data of body for requesting.
     * 
     * @var mixed
     */
    protected $data;

    public function __construct($firebaseCredential)
    {
        $firebaseCredential = $firebaseCredential;

        $this->header = [
            'Content-Type' => 'application/json;charset=utf-8',
            'Authorization' => "key={$firebaseCredential}"
        ];
    }

    /**
     * https://firebase.google.com/docs/cloud-messaging/send-message#send_using_the_fcm_legacy_http_api
     * 
     * @param Message $message
     * @return bool
     */
    public function send(Message $message)
    {
        $this->url = 'https://fcm.googleapis.com/fcm/send';

        $this->data = $message->jsonSerialize();

        return $this->request();
    }

    /**
     * https://developers.google.com/instance-id/reference/server#manage_relationship_maps_for_multiple_app_instances
     * 
     * @param string $topic
     * @param array<string> $registrationTokens
     * @return bool
     */
    public function subscribeToTopic($topic, $registrationTokens)
    {
        $this->url = 'https://iid.googleapis.com/iid/v1:batchAdd';

        $this->data = (new Message)
            ->withTarget($topic)
            ->withTokens($registrationTokens)
            ->jsonSerialize();

        return $this->request();
    }

    /**
     * https://developers.google.com/instance-id/reference/server#manage_relationship_maps_for_multiple_app_instances
     * 
     * @param string $topic
     * @param array<string> $registrationTokens
     * @return bool
     */
    public function unsubscribeFromTopic($topic, $registrationTokens)
    {
        $this->url = 'https://iid.googleapis.com/iid/v1:batchRemove';

        $this->data = (new Message)
            ->withTarget($topic)
            ->withTokens($registrationTokens)
            ->jsonSerialize();

        return $this->request();
    }

    /**
     * Request to $url with $header and $data.
     * 
     * @return bool
     */
    protected function request()
    {
        $this->response = Http::withHeaders($this->header)
            ->post($this->url, $this->data);

        return $this->successful();
    }

    /**
     * Check if firebase response is successful.
     * 
     * @return bool
     */
    protected function successful()
    {
        if (!$this->response->successful()) {
            return false;
        }

        $body = $this->response->json();

        if (isset($body['message_id']) || isset($body['results'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the JSON decoded body of the response as an array.
     *
     * @return array
     */
    public function responseBody()
    {
        return $this->response->json();
    }
}
