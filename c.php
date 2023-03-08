<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Process;

$process = new Process(['node', __DIR__ . '/public/code.js']);
$process->setTimeout(5);
$process->start();

try {
    $process->wait(function ($type, $buffer) {
        if (Process::ERR === $type) {
            echo 'Error: ' . $buffer;
        } else {
             $buffer;
        }
    });
} catch (ProcessTimedOutException $e) {
    $process->stop(0);
}

echo "TUGADIIIIIIII";
