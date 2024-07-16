<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class InvalidTransactionException extends Exception
{
    protected $status = Response::HTTP_NOT_IMPLEMENTED;
    protected $message = "Invalid Transaction";

    public function getStatus(): int
    {
        return $this->status;
    }
}
