
@extends('layout')


@section('content')
    <div class="container">

        <h1>Queue</h1>

        <section class="mt-30">
            <p>
                1. Создаем таблицу jobs (failed_jobs уже создана с коробки), создаем job "QueueJob"
            </p>
            <figure class="highlight">
                php artisan queue:table <br/>
                php artisan make:job QueueJob<br/>
                php artisan migrate<br/>
                QUEUE_CONNECTION=database
            </figure>
        </section>

        <section class="mt-30">
            <p>
                2. Вызываем метод handle() у job "QueueJob"
            </p>
            <figure class="highlight">
                QueueJob::dispatch()->delay(now()->addSeconds(20));
            </figure>
        </section>

        <section class="mt-30">
            <p>
               3. Прослушываем job через консоль (На удаленном сервере активируется супервизор для прослушивания jobs)
            </p>
            <figure class="highlight">
                php artisan queue:listen
            </figure>
        </section>



    </div><!-- /.row -->
@endsection

