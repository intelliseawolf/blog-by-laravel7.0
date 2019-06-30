@php
    $logoLinkText = config('app.name', 'JK');
    $logoClass = 'page-scroll';
    $logoLink = '#Intro';

    if(isset($logoText)) {
        $logoLinkText = $logoText;
    }

    if(isset($single)) {
        $logoLink = route('home');
    }

@endphp

<div class="Navigation">
    <nav class="Navigation__bar navbar navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand {{ $logoClass }}" href="{{ $logoLink }}">
                <h2 class="logo">
                    {{ $logoLinkText }}
                </h2>
            </a>
            <div class="Navigation__mobile-menu">
                <span></span>
                <span></span>
                <span></span>
                <span class="sr-only">
                    {!! trans('larablog.nav.menu') !!}
                </span>
            </div>
        </div>
        <div class="Navigation__navbar-nav navbar-right">
            <ul class="nav navbar-nav">
                @if (!Request::is('/'))
                    <li class="{{ Request::is('/') ? 'active' : null }}">
                        <a href="/">
                            {!! trans('larablog.nav.home') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('portfolio'))
                    <li class="{{ Request::is('portfolio') ? 'active' : null }}">
                        <a class="" href="{{ route('portfolio') }}">
                            {!! trans('larablog.nav.portfolio') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('blog'))
                    <li class="{{ Request::is('blog') ? 'active' : null }}">
                        <a href="{{ route('blog') }}">
                            {!! trans('larablog.nav.blog') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('authors'))
                    <li class="{{ Request::is('blog/authors') ? 'active' : null }}">
                        <a href="{{ route('authors') }}">
                            {!! trans('larablog.nav.authors') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('about'))
                    <li class="{{ Request::is('blog/about') ? 'active' : null }}">
                        <a class="" href="{{ route('about') }}">
                            {!! trans('larablog.nav.about') !!}
                        </a>
                    </li>
                @endif
                @if (Route::has('contact'))
                    <li class="{{ Request::is('blog/contact') ? 'active' : null }}">
                        <a href="{{ route('contact') }}">
                            {!! trans('larablog.nav.contact') !!}
                        </a>
                    </li>
                @endif
                @auth
                    <li class="{{ Request::is('admin') ? 'active' : null }}">
                        <a href="{{ route('admin') }}">
                            {!! trans('larablog.nav.admin') !!}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {!! trans('larablog.nav.logout') !!}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>
