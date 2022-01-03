<?php


namespace App\Services\Video;


use App\Contracts\Video\VideoHosting;

class Youtube implements VideoHosting
{
    public function __construct()
    {

    }

    public function showString()
    {
        return 'Вывод из функции '.__METHOD__.": ".rand(100000,1000000);
    }

    public function getVideoWidth()
    {
        // TODO: Implement getVideoWidth() method.
    }

    public function getVideoHeight()
    {
        // TODO: Implement getVideoHeight() method.
    }
}
