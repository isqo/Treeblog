<div id="sidebar" class="docs-sidebar off-canvas-sidebar">

    <div>
        <a href="/">
            <figure class="avatar avatar-xl">
                    <img src="img/avatar-6.png" alt="...">
            </figure>
        </a>
    </div>

    <div class="docs-nav">
        <div class="accordion-container">
            @foreach ($sections as $section)
                <div class="accordion">
                    <input type="checkbox" id="docs-accordion-{{$section->id}}" name="docs-accordion-checkbox" hidden="" checked="">
                    @if($section->section_id)
                        <label class="accordion-header c-hand">
                            <a href="/{{$section->section_id}}">Go Back</a>
                        </label>
                    @endif
                    <label class="accordion-header c-hand" for="docs-accordion-{{$section->id}}">
                        {{$section->name}}
                    </label>
                    <div class="accordion-body">
                        <ul class="menu menu-nav">
                            @foreach ($section->subSections as $subSection)
                            <li class="menu-item">
                                @if(!$subSection->has_content)
                                    <a href="/{{$subSection->id}}">{{$subSection->name}}</a>
                                    @else
                                    <a href="/content/{{$subSection->id}}">{{$subSection->name}}</a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>