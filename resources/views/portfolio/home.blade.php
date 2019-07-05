@extends('layouts.portfolio')

@section('template_title'){{ trans('portfolio.home.title') }}@endsection
@section('template_description'){{ trans('portfolio.home.description') }}@endsection

@push('head')
@endpush

@section('content')
    @if($sections['preloader']['enabled'])
        @include("portfolio.preloaders.preloader-{$sections['preloader']['type']}")
    @endif
    @include('portfolio.partials.nav')
    @if($sections['intro']['enabled'])
        @include('portfolio.partials.intro')
    @endif
    @if($sections['about']['enabled'])
        @include('portfolio.partials.about')
    @endif
    @if($sections['services']['enabled'])
        @include('portfolio.partials.services')
    @endif
    @if($sections['counters']['enabled'])
        @include('portfolio.partials.counters')
    @endif
    @if($sections['portfolio']['enabled'])
        @include('portfolio.partials.portfolio')
    @endif
    @if($sections['experienceTimeline']['enabled'])
        @include('portfolio.partials.timeline', ['title' => $sections['experienceTimeline']['sectionTitle'], 'items' => $sections['experienceTimeline']['items']])
    @endif
    @if($sections['educationTimeline']['enabled'])
        @include('portfolio.partials.timeline', ['title' => $sections['educationTimeline']['sectionTitle'], 'items' => $sections['educationTimeline']['items'], 'sectionClass' => $sections['educationTimeline']['sectionClass']])
    @endif
    @if($sections['blog']['enabled'])
        @include('portfolio.partials.blog', ['posts' => $sections['blog']['posts'], 'sectionData' => $sections['blog']])
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

@push('scripts')
@endpush
