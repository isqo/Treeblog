@extends('layouts.master')
@section('content')
    <div class="docs-container off-canvas off-canvas-sidebar-show">
        @include('layouts.sidebar.sidebar')
        <a class="off-canvas-overlay" href="#close"></a>

        <div id="content" class="docs-content">

            @include('layouts.errors')

            <div class="container">

                <div class="columns">
                    <div class="column col-12">@include('layouts.navbar')</div>
                </div>
                <div class="columns">
                    <div class="column col-10 col-mx-auto">
                        @if ($currentSection->name != 'main' && $currentSection->page)
                            <div style="margin-bottom: 40px;">
                                <div class="chip" style="float: right;">
                                    <img class="avatar avatar-sm" src="{{ asset('img/icons8-anonymous-mask.png') }}"
                                         alt="Ismail qouiqa">
                                    {{ date("d M Y", strtotime($currentSection->page->created_at))}}
                                </div>
                            </div>
                            <h1>{{ $currentSection->page->title }}</h1>
                        @endif
                        @auth
                            <form method="post" id="savecontent"
                                  action="{{ route('savecontent',$currentSection->name) }}">
                                @csrf
                                <textarea id="summernote" name="content">
                        @endauth
                                    {!! $content !!}
                                    @auth
                                </textarea>
                                <a style="float: right;margin-top:0.5%" class="btn btn-primary" onclick="event.preventDefault();
                                               document.getElementById('savecontent').submit();">save</a>
                            </form>
                        @endauth
                    </div>

                    <div class="column col-10 col-mx-auto">
                        </br>
                        @if ($currentSection->name == 'main')
                            <h4>Latest posts</h4>
                            <div class="divider"></div>
                       
                        @endif
                    </div>
                </div>
            </div>

            <div class="column col-10 col-mx-auto">@include('layouts.footer')</div>
        </div>
    </div>
@stop