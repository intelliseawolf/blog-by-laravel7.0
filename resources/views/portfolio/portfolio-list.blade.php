@extends('layouts.portfolio')

@section('template_title'){{ trans('portfolio.portfolio-list.title') }}@endsection
@section('template_description'){{ trans('portfolio.portfolio-list.description') }}@endsection

@push('head')
@endpush

@section('content')
    <div id="app" class="portfolio-list-page">
        @if($sections['preloader']['enabled'])
            @include("portfolio.preloaders.preloader-{$sections['preloader']['type']}")
        @endif
        @include('portfolio.partials.section-nav', ['title' => $navTitle])
        <section id="Project-list" class="project-list space-from-topbar @if($sections['portfolio']['spacing'] == false) mb-0 @endif">
            <div class="section--basic --nopadding-bottom">
                @include('portfolio.partials.portfolio-items')
            </div>
        </section>
        @if($sections['footer']['enabled'])
            @include('portfolio.partials.footer', ['single' => true])
        @endif
    </div>
@endsection

@push('scripts')
@endpush
