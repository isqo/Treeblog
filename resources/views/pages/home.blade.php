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
                        @if ($currentSection->name != 'main')
                            <div style="margin-bottom: 40px;">
                                <div class="chip" style="float: right;">
                                    <img class="avatar avatar-sm" src="{{url('storage/avatar.png')}}"
                                         alt="Ismail qouiqa">
                                    {{ date("d M Y", strtotime($currentSection->page->created_at))}}
                                </div>
                            </div>
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
                        @if ($currentSection->name == 'main')
                            @foreach ($recentPosts as $post)
                              {{ $post->section->name }}
                            @endforeach
                            <div class="columns">
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                                <div class="column col-2">
                                    <div class="card" style="border: 0;box-shadow: 0 0.25rem 1rem rgba(48,55,66,.15);">
                                        <div class="card-header">
                                            <div class="card-title h5">Installation</div>
                                        </div>
                                        <div class="card-body">How to install and use Spectre.css</div>
                                        <div class="card-footer"><a class="btn btn-primary" href="getting-started/installation.html">View</a></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="column col-10 col-mx-auto">@include('layouts.footer')</div>
        </div>
    </div>
@stop