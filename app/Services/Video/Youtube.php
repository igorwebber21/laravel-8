<?php


namespace App\Services\Video;


use App\Contracts\Video\VideoHosting;

class Youtube implements VideoHosting
{
    /**
     * @var int
     */
    private $random;

    public function __construct()
    {
        $this->random = rand(100000,1000000);
    }

    public function showString()
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
}
