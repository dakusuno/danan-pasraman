@extends('layouts.master')
@section('dashboard')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row" id="app">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pengguna Aktif</h3>
                        </div>
                        <div class="panel-body">
                            <div class="users-wrapper">
                                <ul class="users">
                                    @foreach($users as $user)
                                    <li class="user" id="{{ $user->id }}">
                                        <span class="pending">1</span>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                            </div>

                                            <div class="media-body">
                                                <p class="name">{{ $user->name }}</p>
                                                <p class="email">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" id="messages">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<style type="text/css">
    ul {
        margin: 0;
        padding 0;
    }

    li {
        list-style: none;
    }

    .users-wrapper,
    .messages-wrapper {
        border: 1px solid #dddddd;
        overflow-y: auto;
    }

    .users-wrapper,
    .messages-wrapper {
        height: 500px;
    }

    .user {
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }

    .user:hover {
        background: #eeeeee;
    }

    .user:last-child {
        margin-bottom: 0;
    }

    .pending {
        position: absolute;
        left: 5px;
        top: 20px;
        background: #b600ff;
        margin: 0;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        line-height: 18px;
        padding-left: 5px;
        color: #ffffff;
        font-size: 12px;
    }

    .media-left {
        margin: 0 10px;
    }

    .media-left img {
        width: 64px;
        border-radius: 64px;
    }

    .media-body p {
        margin: 6px 0;
    }

    .message-wrapper {
        padding: 10px;
        height: 536px;
        background: #eeeeee;
    }

    .messages .message {
        margin-bottom: 0;
    }

    .received,
    .sent {
        width: 45%;
        padding: 3px 10px;
        border-radius: 10px;
    }

    .received {
        background: #7b9eb8;
        color: #ffffff;
    }

    .sent {
        background: #7bb889;
        float: right;
        text-align: right;
        color: #ffffff;
    }

    .message p {
        margin: 5px 0;
    }

    .date {
        font-size: 12px;
        color: #e3e1e1;
    }

    .active {
        background: #eeeeee;
    }

    .input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 4px;
        box-sizing: border-box;
        outline: none;
        border: 1px solid #eeeeee;
    }

    .input[type=text]:focus {
        border: 1px solid #aaaaaa;
    }
</style>
<style type="text/css">
    .chatcolor {
        background-color: #dedcdc;
        padding: 10px;
        border-bottom-left-radius: 24px;
        border-bottom-right-radius: 28px;
        border-top-right-radius: 28px;
        margin-top: 6px;
        color: black;
    }
</style>
@section('footer')

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('abbfb4a197566107f900', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                console.log(datastr);
                $.ajax({
                    type: 'POST',
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                      
                    },
                    error: function (jqXHR, status, err) {
                       
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            } 
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
@stop

