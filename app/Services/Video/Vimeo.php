<?php


namespace App\Services\Video;


use App\Contracts\Video\VideoHosting;

class Vimeo implements VideoHosting
{
    /**
     * @var int
     */
    private $random;

    public function __construct()
    {
        $this->random = rand(0,100);
    }

    public function showRandomString()
    {
        return 'Вывод из функции '.__METHOD__.": ".$this->random;
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
