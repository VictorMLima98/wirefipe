<?php

namespace App\Exceptions;

use Exception;

class FipeUnknownTypeException extends Exception
{
    protected $message = 'Unknown Vehicle Type';
}
