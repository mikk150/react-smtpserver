<?php
namespace mikk150\React\SmtpServer;

use Evenement\EventEmitter;

/**
*
*/
class RequestParser extends EventEmitter
{
    private $buffer = '';

    /**
     * @var Request
     */
    private $request;
    private $length = 0;

    public function feed($data)
    {
        
    }
}
