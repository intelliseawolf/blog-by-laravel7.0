<div class="Navigation">
    <nav class="Navigation__bar navbar navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand page-scroll" href="#Intro">
                <h2 class="logo">
                    {{ $logoText }}
                </h2>
            </a>
            <div class="Navigation__mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="Navigation__navbar-nav navbar-right">
            <ul class="nav navbar-nav">
                @if($sections['intro']['enabled'])
                    <li class="active">
                        <a class="page-scroll" href="#Intro">
                            {!! $sections['intro']['navTitle'] !!}
                        </a>
                    </li>
                @endif
                @if($sections['about']['enabled'])
                    <li class="">
                        <a class="page-scroll" href="#About">
                            {!! $sections['about']['navTitle'] !!}
                        </a>
                    </li>
                @endif

                @if($sections['services']['enabled'])
                    <li class="">
                        <a class="page-scroll" href="#Services">
                            {!! $sections['services']['navTitle'] !!}
                        </a>
                    </li>
                @endif
                @if($sections['portfolio']['enabled'])
                    <li>
                        <a class="page-scroll" href="#Portfolio">
                            {!! $sections['portfolio']['navTitle'] !!}
                        </a>
                    </li>
                @endif
                @if($sections['blog']['enabled'])
                    <li>
                        <a class="page-scroll" href="#Blog">
                            {!! $sections['blog']['navTitle'] !!}
                        </a>
                    </li>
                @endif
                @if($sections['contact']['enabled'])
                    <li>
                        <a class="page-scroll" href="#Contact">
                            {!! $sections['contact']['navTitle'] !!}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
