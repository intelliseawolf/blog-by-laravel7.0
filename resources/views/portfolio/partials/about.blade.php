<section id="About">
    <div class="section--basic">
        <div class="container">
            @if($sections['about']['titleEnabled'])
                @if($sections['about']['intro'])
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="headline">
                                <h2>
                                    {!! $sections['about']['intro'] !!}
                                </h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="row">
                @if($sections['about']['enabled'])
                    <div class="@if($sections['skills']['enabled']) col-md-6 @else col-md-12 @endif">
                        <div class="about-me mb-4">
                            @if($sections['about']['textTitle'])
                                <h4 data-aos="fade">
                                    {!! $sections['about']['textTitle'] !!}
                                </h4>
                            @endif
                            @if($sections['about']['text'])
                                <div class="about-me-text ta-j" data-aos="fade">
                                    {!! $sections['about']['text'] !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @if($sections['skills']['enabled'])
                    @include('portfolio.partials.skills')
                @endif
            </div>
        </div>
    </div>
</section>
