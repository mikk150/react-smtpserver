<?php
namespace mikk150\React\SmtpServer;

use Evenement\EventEmitter;
use React\Socket\ServerInterface as SocketServerInterface;
use React\Socket\ConnectionInterface;

/**
*
*/
class Server extends EventEmitter
{
    // public $proccessors=[
    //     'HELO' =>
    // ];

    private $io;

    public function __construct(SocketServerInterface $io)
    {
        $this->io = $io;

        $this->io->on('connection', function (ConnectionInterface $conn) {
            $emit=true;
            $conn->on('data', function ($data, $conn) use (&$emit) {
                $event=strtolower(substr($data, 0, 4));
                if ($emit) {
                    $this->emit($event, [$data, $conn, &$emit]);
                }
            });

            $conn->write('220 HELLO M8!'.PHP_EOL);
        });
    }
}
