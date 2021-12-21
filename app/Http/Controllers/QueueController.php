<?php


namespace App\Http\Controllers;


use App\Jobs\QueueJob;

class QueueController extends Controller
{
    public function index()
    {
        QueueJob::dispatch()->delay(now()->addSeconds(20));

        return view('queue');
    }
}
