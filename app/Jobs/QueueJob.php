<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nowDate = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->nowDate = date('d.m.Y H:i:s');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       // logs()->info('Job has been completed at '.$this->nowDate);
        Log::channel('jobslogs')->info('Job has been completed at '.$this->nowDate);
    }
}
