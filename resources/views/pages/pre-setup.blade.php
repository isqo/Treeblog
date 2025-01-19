@extends('layouts.master')
@section('content')
    @include('layouts.errors')

    <div class="container">
        <div class="columns">
            <div class="column col-3 col-xl-5 col-lg-7 col-md-8 col-sm-12 col-mx-auto" style="margin-top:10%">

                <div class="panel" style="background-color:white;">
                    <form class="form-horizontal" action="/setup" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-header text-center">
                            <div class="panel-title h1 mt-10">Treeblog Setup</div>
                            <!--  <figure><img src="./icons8-maintenance-100.png"></figure>-->
                        </div>
                        <div class="divider"></div>

                        <div class="fileinput-new" data-provides="fileinput">
                            <table style="margin: auto;">
                                <tr>
                                    <td>
                                        <figure class="avatar avatar-xl fileinput-preview" data-trigger="fileinput"
                                                style="background:white;margin:auto;display:block;">
                                            <img src="{{ asset('img/icons8-anonymous-mask.png') }}" alt="...">
                                        </figure>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                   <span class="btn btn-primary btn-file"><span
                                               class="fileinput-new"> Choose your avatar </span><span
                                               class="fileinput-exists">Change</span><input
                                               type="file" name="avatar"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="divider"></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-2 col-sm-12">
                                    <label class="form-label" for="input-example-9">Name</label>
                                </div>
                                <div class="col-10 col-sm-12">
                                    <input class="form-input" id="input-example-9" name="name" type="text"
                                           placeholder="ex: Ismael QOUIQA">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-2 col-sm-12">
                                    <label class="form-label" for="input-example-8">Email</label>
                                </div>
                                <div class="col-10 col-sm-12">
                                    <input class="form-input" id="input-example-8" type="email" name="email"
                                           placeholder="ex: qouiqaIsmael@gmail.com"
                                           pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$">
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="form-group">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg" style="float:right;">Next</button>
                                </div>
                            </div>
                        </div>

                    </form>
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