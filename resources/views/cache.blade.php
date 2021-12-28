
@extends('layout')


@section('content')
    <div class="container">

        <h1>Cache</h1>

        <section class="mt-30">
            <p>
                1. Настройка кеш админки от OpenServer
            </p>
            <figure class="highlight">
                CACHE_DRIVER=redis<br/>
                REDIS_URL=http://127.0.0.1/openserver/phpredisadmin/?overview&s=0&d=0<br/>
            </figure>
        </section>

        <section class="mt-30">
            <p>
                2. Кеш операции
            </p>
            <figure class="highlight">
              Очистить весь кеш<br/>
             php artisan cache:clear <br/>
            </figure>
        </section>




    </div><!-- /.row -->
@endsection

