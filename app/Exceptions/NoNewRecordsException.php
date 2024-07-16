<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NoNewRecordsException extends Exception
{
    protected $message = 'No new recods were sent.';
    protected $status = Response::HTTP_BAD_REQUEST;

    public function getStatus(): int
    {
        return $this->status;
    }
}
