<?php

namespace App\Http\Controllers;

use App\Contracts\Video\VideoHosting;
use App\Services\Video\FakeService;
use App\Services\Video\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContractsController extends Controller
{

    public function index(VideoHosting $service)
    {
        $string = $service->showString();
        $fakeService = App::make(FakeService::class)->process(); // ??

        return view('contracts', compact('string', 'fakeService'));
    }
}
