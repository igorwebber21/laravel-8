<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index()
    {
        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });
        $res1 = ($collection->toArray());


        Collection::macro('toUpper', function () {
            return $this->map(function ($value) {
                return Str::upper($value);
            });
        });
        $collection2 = collect(['first', 'second']);
        $res2 = $collection2->toUpper();


        $res3 = collect([1, 1, 2, 4])->avg();

        var_dump($res3);


        return view('collection', compact('res1', 'res2'));
    }
}
