<?php

namespace App\Services\Messaging;

/**
 * https://firebase.google.com/docs/cloud-messaging/http-server-ref#error-codes
 */
class Message implements \JsonSerializable
{
    /**
     * @var array
     */
    protected $message = [];

    /**
     * Set target of message.
     * 
     * @param string $tapic
     * @return $this
     */
    public function withTarget(string $topic)
    {
        $this->message['to'] = "/topics/{$topic}";

        return $this;
    }

    /**
     * @param Notification $notification
     * @return $this
     */
    public function withNotification($notification)
    {
        $this->message['notification'] = $notification->jsonSerialize();

        return $this;
    }

    /**
     * @param array $registrationTokens
     * @return $this
     */
    public function withTokens($registrationTokens)
    {
        $this->message['registration_tokens'] = $registrationTokens;

        return $this;
    }

    /**
     * @param string $type
     * @param string $value
     * @return $this
     */
    public function withData($type, $value)
    {
        $data = [];
        $data['type'] = $type;
        $data['value'] = $value;

        $this->message['data'] = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->message;
    }
}
