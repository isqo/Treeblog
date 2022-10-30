@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column col-4 col-xl-5 col-lg-7 col-md-8 col-sm-12 col-mx-auto" style="margin-top:10%">

                <div class="panel" style="background-color:white;">
                    <div class="panel-header text-center">
                        <div class="panel-title h1 mt-10">Miscsite Setup</div>
                        <!--  <figure><img src="./icons8-maintenance-100.png"></figure>-->
                    </div>

                    <div class="divider"></div>
                    <div class="panel-body">
                        <div class="empty" style="background: white;">
                            <div class="empty-icon">
                                <figure class="avatar avatar-xl" style="background-color:white;">
                                    <img src="{{ asset('img/icons8-anonymous-mask.png')}}">
                                </figure>
                            </div>
                            <p class="empty-title h5">Miscite Setup is done, Here is your email's password for your
                                admin page authentication,make sure that you save it securely somewhere
                            </p>

                            <br>
                            <p style="word-wrap: break-word;font-size:13px;"> {{$hashed_random_password}}
                            </p>
                            <br>

                            <div class="empty-action">
                                <a class="btn btn-primary" href={{url('/')}}>Main page redirection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        $('body').css('background-color','#f8f9fa')
    </script>
@stop