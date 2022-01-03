<!DOCTYPE html>
<html>
    <head>
        <title>Pusher Test</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script> var userId = '{{ session('userId') }}'; </script>
        <script src="{{ asset('js/pusher-handler.js') }}"></script>
    </head>
    <body>

    <div class="text-center">
        <h1>Laravel BroadCast - Pusher Test</h1>
        <p>
            Try publishing an event to channel <code>notification</code>
            with event name <code>App\Events\MessageNotification</code>.
        </p>
        <p><a href="/"> На главную</a></p>

            @if (session()->has('userName'))

                <div class="auth-block">
                    <div>
                        Добрый день, {{ session('userName') }}
                    </div>
                    <div>
                        <img src="{{ session('userAvatar') }}" alt="" width="40">

                        <form action="/chat-logout" method="post" id="form-logout">
                            <button class="btn btn-info">Выйти</button>
                        </form>

                    </div>
                </div>
            @else
            <div class="enter-form">
                <form action="#" class="text-left" method="post" id="enter-chat-form">
                    <div class="form-group">
                        <label for="message">Ваше имя:</label>
                        <input type="text" class="form-control"  name="user_name" id="user_name" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Выберите аватар:</label><br/>
                        <div class="avatar-block">
                            <img class="active" src="{{ asset('images/avatar1.png') }}" alt="avatar" width="30">
                            <img src="{{ asset('images/avatar2.png') }}" alt="avatar" width="30">
                            <img src="{{ asset('images/avatar3.png') }}" alt="avatar" width="30">
                            <img src="{{ asset('images/avatar4.png') }}" alt="avatar" width="30">
                            <img src="{{ asset('images/avatar5.png') }}" alt="avatar" width="30">
                        </div>

                    </div>

                <button type="submit" class="btn btn-info enter-chat-btn">Войти в чат</button>
                </form>
            </div>
            @endif
    </div>


    @if (session()->has('userName'))
    <main class="content" id="chat-section">
        <div class="container p-0">

            <h1 class="h3 mb-3">Messages</h1>

            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">

                       {{-- <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>--}}

                        <div id="chat-participants"></div>

                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="{{ session('userAvatar') }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-3">
                                    <strong>{{ session('userName') }}</strong>
                                    <div class="text-muted small"><em>Начните диалог и Вы появитесь в чате...</em></div>
                                </div>
                                {{--<div>
                                    <button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
                                    <button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
                                    <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
                                </div>--}}
                            </div>
                        </div>

                        <div class="position-relative">
                            <div class="chat-messages p-4">     </div>
                        </div>

                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <div class="input-group">
                                <form action="" method="post" id="chat-form">
                                    <input type="text" class="form-control" id="message" name="message" placeholder="Напишите в чат">
                                    <button class="btn btn-primary">Отправить</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    @endif

    <script>

      $(".avatar-block img").click(function () {

        $(".avatar-block img").removeClass('active');
        $(this).addClass('active');

      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $("#form-logout").submit(function(){

        $.ajax({
          url: '/chat-logout',
          type: 'POST',
          data: {},
          beforeSend: function(){},
          success: function(res){
            if(res == 1){
              location.reload();
            }
          },
          error: function(){
            alert("Error!");
          }
        });

        return false;

      });

      $('#enter-chat-form').submit(function(){

        var userName =  $("#user_name").val();
        var userAvatar =  $(".avatar-block img.active").attr('src');

        $.ajax({
          url: '/enter-chat',
          type: 'POST',
          data: { userName: userName, userAvatar:  userAvatar},
          beforeSend: function(){},
          success: function(res){
            if(res == 1){
              location.reload();
            }
          },
          error: function(){
            alert("Error!");
          }
        });

        return false;

      });

      $("#chat-form").submit(function(){

        var message =  $("#message").val();

      /*  var token =  $('input[name="_token"]').val(); console.log("token: ", token);*/

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: '/chat',
          type: 'POST',
          data: { message: message },
          beforeSend: function(){},
          success: function(res){

            $("#chat-form")[0].reset();
          },
          error: function(){
            alert("Error!");
          }
        });

        return false;
      });
    </script>
    </body>
</html>
