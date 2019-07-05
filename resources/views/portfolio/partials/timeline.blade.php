<section section id=timeline>
    <div class="section--basic">
        <div class="container">
            <div class="headline">
                <h2>
                    {!! $title !!}
                </h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">
                        @foreach($items as $item)
                            <div class="timeline" data-aos="fade" data-aos-offset="100" data-aos-delay="100">
                                <div class="timeline-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="timeline-content">
                                    <h3 class="title">
                                        2017 - Present
                                    </h3>
                                    <h5 class="subtitle">
                                        POSITION TITLE
                                    </h5>
                                    <p class="description">
                                        COMPANY NAME
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
