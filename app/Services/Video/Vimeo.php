<?php


namespace App\Services\Video;


use App\Contracts\Video\VideoHosting;

class Vimeo implements VideoHosting
{
    public function __construct()
    {

    }

    public function showRandomString()
    {
        return 'Вывод из функции '.__METHOD__.": ".rand(0,100);
    }

    public function getVideoWidth()
    {
        // TODO: Implement getVideoWidth() method.
    }

    public function getVideoHeight()
    {
        // TODO: Implement getVideoHeight() method.
    }

    public function showString()
    {
        return $this->showRandomString();
    }
}
