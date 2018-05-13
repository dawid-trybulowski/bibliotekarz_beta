<?php

namespace App\Http\Helpers;


class Message
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;
    /**
     * @var int
     */
    public $code;
    /**
     * @var bool
     */
    public $success;

    public $additional;

    public function __construct
    (
        string $title,
        string $content,
        int $code,
        bool $success = true,
        $additional = []
    )
    {
        $this->title = $title;
        $this->content = $content;
        $this->code = $code;
        $this->success = $success;
        $this->additional = $additional;
    }
}