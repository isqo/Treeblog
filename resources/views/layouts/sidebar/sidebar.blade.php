<div id="sidebar" class="docs-sidebar off-canvas-sidebar">

    <div>
        <a href="/">
            <figure class="avatar avatar-xl" style="background-color:#f8f9fa;">
                <img src="{{url('storage/avatar.png')}}">
            </figure>
        </a>
    </div>
    <div class="docs-nav">
        <div class="accordion-container">
            @auth
                <div class="accordion">
                    <a class="btn btn-primary" href="#common1-section-modal"
                       onclick="fillSectionModal({{"\"".$currentSection->getChildrenParent()->name."\""}},1);">New
                        section </a>
                </div>
            @endauth
            @if($currentSection->hasGoBackSection())
                <label class="accordion-header c-hand">
                    <a href="/{{$currentSection->getGoBackSection()->name}}">Go Back</a>
                </label>
            @endif
            <div class="accordion">
                <label class="accordion-header c-hand" for="docs-accordion-introduction">
                    <a href="/{{$currentSection->getChildrenParent()->name}}"
                       style="color:#667189;text-decoration: none;">Introduction</a>
                </label>
            </div>

            @foreach ($currentSection->getChildren() as $child)
                <div class="accordion">
                    <input type="checkbox" id="docs-accordion-{{$child->id}}" name="docs-accordion-checkbox" hidden=""
                           @if($child->subSections->contains('name',$currentSection->name))checked="checked"@endif>
                    <label class="accordion-header c-hand" for="docs-accordion-{{$child->id}}">
                        @auth
                            <a class="btn btn-primary btn-sm" href="#common2-section-modal"
                               onclick="fillSectionModal({{"\"".$child->name."\""}},2);"
                               style="margin-bottom:5px;"><i
                                        class="icon icon-edit"></i></a>
                        @endauth
                        @if ($child->hasContent)
                            <a href="/{{$child->name}}"
                               style="color:#667189;text-decoration: none;">{{$child->name}}</a>
                        @else
                            {{$child->name}}
                        @endif
                    </label>

                    <!-- basic dropdown button -->


                    <div class="accordion-body">
                        <ul class="menu menu-nav">
                            @foreach ($child->subSections as $secondChild)
                                <table>
                                    <tr>
                                        <td>
                                            @auth
                                                <a class="btn btn-primary btn-sm" href="#common2-section-modal"
                                                   onclick="fillSectionModal({{"\"".$secondChild->name."\""}},1);"
                                                   style="margin-bottom:5px;margin-left:10px;"><i
                                                            class="icon icon-edit"></i></a>
                                            @endauth
                                        </td>
                                        <td>
                                            <li class="menu-item">
                                                <a class="href" href="/{{$secondChild->name}}">
                                                    {{$secondChild->name}}
                                                </a>
                                            </li>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.sidebar.common1_section_modal')
@include('layouts.sidebar.common2_section_modal')


@section('javascript')
    <script>
        //window.location.hash = '#main';

        function fillSectionModal(value, position) {
            $('.section_parent').attr('value', value);
            $('.horizontal_position').attr('value', position);
            $('.section-to-delete').attr('value', value);
            $('.section-to-move').attr('value', value);
            $(".tab-item > a.active").trigger("click");

        }

        $(".tab-item > a").click(function () {
            var tabid = $(this).attr("for");
            var formAction = $(this).attr("form-action");
            var formMethod = $(this).attr("form-method");
            var formButtonName = $(this).attr("form-button-name");

            $("div.tab-section-mng").addClass("hide-tab-content");
            $("." + tabid).removeClass("hide-tab-content");

            $('.section-mng-form').attr('action', formAction);
            $('.section-mng-form').attr('method', formMethod);
            $('.section-mng-form-btn').text(formButtonName);
        });
    </script>
@stop