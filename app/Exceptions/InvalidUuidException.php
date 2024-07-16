<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class InvalidUuidException extends Exception
{
    protected $status = Response::HTTP_BAD_REQUEST;
    protected $message;

    public function __construct(protected string $uuid)
    {
        $this->message = "Invalid Uuid. [$this->uuid]";
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
