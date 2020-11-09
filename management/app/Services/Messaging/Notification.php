<?php

namespace App\Services\Messaging;

/**
 * https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support
 */
class Notification implements \JsonSerializable
{
    /**
     * @var array
     */
    protected $notification = [];

    public function __construct()
    {
        // 
        // This value specified by mobile developers for link notification.
        // and will change by adding new type of notification.
        //
        $this->notification['click_action'] = 'ActionClickFilter';
    }

    /**
     * Create an object of self.
     */
    public static function create()
    {
        return (new self());
    }

    /**
     * @param string $title
     * @return $this
     */
    public function withTitle($title)
    {
        $this->notification['title'] = $title;

        return $this;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function withBody($body)
    {
        $this->notification['body'] = $body;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->notification;
    }
}
