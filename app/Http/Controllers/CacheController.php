<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function index()
    {
       // Cache::put('laravelTest', "Igor", now()->addMinutes(10));
        //echo Cache::get('laravelTest');
        /*Cache::store('file')->put('name', 'Alex');
        Cache::store('redis')->put('name', 'Sam');

        echo  Cache::store('redis')->get('name');
        echo Cache::store('file')->get('name');*/

        // Cache::put('laravelTest', "Igor", now()->addMinutes(10));
        //   Cache::forget('laravelTest');

        /*if (Cache::has('name')){
            echo Cache::get('name');
        }*/

       /* Cache::put('number', 1);
        $number =  Cache::increment('number');
        echo $number;*/

       /* Cache::add('constant', 4665);

        echo  Cache::get('constant');*/

    /*   Cache::tags('custom')->put('name','Igor2');
       Cache::tags('custom')->put('email','Igor@gmail.com2');
       Cache::tags('custom')->put('site','laravel.com2');*/

        return view('cache');
    }
}
