<?php namespace HeppyKarlsson\BanHammer\Throwable;

use Exception;

class AccessDenied extends Exception
{
    protected $code = 2001;
}