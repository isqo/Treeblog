<div class="docs-navbar" style="position: relative;">
    <a class="off-canvas-toggle btn btn-link btn-action" href="#sidebar">
        <i class="icon icon-menu"></i>
    </a>
    <table style="float: right;margin-right: 25px;">
        <tr>
            <td>
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">Log out</a>
                @endauth
            </td>
            <td>
                <div>
                    <a href="https://github.com/picturepan2/spectre" target="_blank" class="btn btn-primary">Github</a>
                </div>
            </td>
        </tr>
    </table>
</div>