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
     * Create an object of self.
     */
    public static function create()
    {
        return (new self());
    }

    /**
     * Set target of message.
     * 
     * @param string $target The value can be a device's registration token, a device group's notification key, or a single topic.
     * @return $this
     */
    public function withTarget($target, $isTopic = true)
    {
        $this->message['to'] = $target;

        if ($isTopic) {
            $this->message['to'] = "/topics/{$target}";
        }

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
