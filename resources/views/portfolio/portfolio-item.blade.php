@extends('layouts.portfolio')

@section('template_title'){{ trans('portfolio.portfolio-item.title', ['name' => '']) }}@endsection
@section('template_description'){{ trans('portfolio.portfolio-item.description', ['dest' => '']) }}@endsection

@push('head')
@endpush

@section('content')
    <div id="app" class="portfolio-item-page">
        @if($sections['preloader']['enabled'])
            @include("portfolio.preloaders.preloader-{$sections['preloader']['type']}")
        @endif
        @include('portfolio.partials.section-nav', ['title' => $navTitle])

        <section id="Project-page" class="project-page space-from-topbar">
            <div class="section--basic">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="project-image">
                                <img src="{{ $sections['portfolioItem']->item_image_large }}" alt="{{ $sections['portfolioItem']->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="project-details">
                                        <div class="sidebar-headline">
                                            <h4>
                                                {!! trans('portfolio.portfolio-item.details') !!}
                                            </h4>
                                        </div>
                                        <div class="project-detail">
                                            <div class="project-detail-label">
                                                {!! trans('portfolio.portfolio-item.type') !!}
                                            </div>
                                            <div class="project-detail-value">
                                                @foreach($sections['portfolioItem']->tags as $tag)
                                                    {{ $tag->title }} <br />
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="project-detail">
                                            <div class="project-detail-label">
                                                {!! trans('portfolio.portfolio-item.technologies') !!}
                                            </div>
                                            <div class="project-detail-value">
                                                PHP, Javasctipt, VueJs, HTML5, Laravel, MySQL
                                            </div>
                                        </div>
                                        <div class="project-detail">
                                            <div class="project-detail-label">
                                                {!! trans('portfolio.portfolio-item.link') !!}
                                            </div>
                                            <div class="project-detail-value">
                                                <a href="https://jeremykenedy.com" target="_blank">
                                                    jeremykenedy.com
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-sm-offset-1">
                                    <div class="project-description">
                                        <p>
                                            {!! $sections['portfolioItem']->content_html !!}
                                        </p>
                                    </div>
                                    <div class="project-naviagtion">
                                        <a href="#">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('portfolio') }}">
                                            <i class="fa fa-th-list" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($sections['footer']['enabled'])
            @include('portfolio.partials.footer', ['single' => true])
        @endif
    </div>


@endsection

@push('scripts')
@endpush
