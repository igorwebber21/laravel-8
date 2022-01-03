
@extends('layout')


@section('content')
    <div class="container">

        <h1>Cache</h1>

        <section class="mt-30">
            <p>
                1. Коллекции перебор
            </p>
            <figure class="highlight">
                $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
                return strtoupper($name);
                })->reject(function ($name) {
                return empty($name);
                });

                {{ var_dump($res1) }}
            </figure>
        </section>

        <section class="mt-30">
            <p>
                2. Класс Collection являются «макропрограммируемым», что позволяет вам добавлять дополнительные методы
                к классу во время выполнения.
            </p>
            <figure class="highlight">
                {{ var_dump($res2) }}
            </figure>
        </section>




    </div><!-- /.row -->
@endsection

