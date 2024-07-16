<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class InvalidParamsException extends Exception
{
    protected $status = Response::HTTP_BAD_REQUEST;
    protected $message;

    public function __construct(protected string $error)
    {
        $this->message = "Invalid Params: [$this->error]";
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
