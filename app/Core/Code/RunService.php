<?php

namespace App\Core\Code;

class RunService
{

    public float $time = 0;
    public float $space = 0;
    protected string $path = '';

    public function __construct($path)
    {
        $this->path = $path;
    }

    public static function execute()
    {

    }

}
