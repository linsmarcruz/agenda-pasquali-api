<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ClassNotExistsException extends Exception
{
    protected $message = 'The Class has been not found.';
    protected $status = Response::HTTP_INTERNAL_SERVER_ERROR;

    public function getStatus(): int
    {
        return $this->status;
    }
}
