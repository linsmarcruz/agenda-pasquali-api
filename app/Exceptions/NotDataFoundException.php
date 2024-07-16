<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NotDataFoundException extends Exception
{
    protected $message = 'Not Data Found.';
    protected $status = Response::HTTP_NOT_FOUND;

    public function getStatus(): int
    {
        return $this->status;
    }
}
