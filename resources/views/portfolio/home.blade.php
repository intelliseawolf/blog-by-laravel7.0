@extends('layouts.portfolio')

@section('template_title'){{ trans('portfolio.home.title') }}@endsection
@section('template_description'){{ trans('portfolio.home.description') }}@endsection

@push('head')
@endpush

@section('content')
    {{--
        @include('blog.partials.header', ['image' => $post_image, 'title' => $title, 'subtitle'  => $subtitle ])
        @include('blog.partials.posts-roll', ['blogposts' => $posts])
        @if(!$tag)
            @include('blog.partials.posts-pager')
        @endif
    --}}

    @if($sections['preloader']['enabled'])
        @include("portfolio.preloaders.preloader-{$sections['preloader']['type']}")
    @endif
    @include('portfolio.partials.nav')
    @if($sections['intro']['enabled'])
        @include('portfolio.partials.intro')
    @endif
    @include('portfolio.partials.about')
    @if($sections['services']['enabled'])
        @include('portfolio.partials.services')
    @endif
    @if($sections['counters']['enabled'])
        @include('portfolio.partials.counters')
    @endif
    @if($sections['portfolio']['enabled'])
        @include('portfolio.partials.portfolio')
    @endif
    @if($sections['blog']['enabled'])
        @include('portfolio.partials.blog')
    @endif
    @if($sections['testimonials']['enabled'])
        @include('portfolio.partials.testimonials')
    @endif
    @if($sections['contact']['enabled'])
        @include('portfolio.partials.contact')
    @endif
    @if($sections['footer']['enabled'])
        @include('portfolio.partials.footer')
    @endif
@endsection
