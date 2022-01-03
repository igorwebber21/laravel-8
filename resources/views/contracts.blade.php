
@extends('layout')


@section('content')
    <div class="container">

        <h1>Контракты</h1>

        <section class="mt-30">
            <p>
                1. Контракты - это интерфейсы, которые помогают быстро решить проблемы с переименованием.
                К примеру, заменить все объекты класса Youtube на Vimeo
            </p>
            <figure class="highlight">

            </figure>
        </section>

        <section class="mt-30">
            <p>
                2. Вывод результата showString() интерфейса VideoHosting, который берет метод Youtube или Vimeo
                в зависимости от AppServiceProvider
            </p>
            <figure class="highlight">
                {{ $string }} <br/>
                {{ $fakeService }}
            </figure>
        </section>




    </div><!-- /.row -->
@endsection

