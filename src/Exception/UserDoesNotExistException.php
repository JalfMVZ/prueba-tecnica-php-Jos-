<?php

namespace App\Exception;

use Exception;

class UserDoesNotExistException extends Exception {
    protected $message = 'User does not exist';
}
