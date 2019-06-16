        <section id="Contact" class="">
            <div class="section--basic section--darker">
                <div class="container">
                    <div class="headline">
                        <h2>
                            {{ $sections['contact']['sectionTitle'] }}
                        </h2>
                    </div>
                    <div class="Contact pt-2">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-1 col-sm-6" data-aos="fade">
                                <contact-form>
                                    <form-input name="name" label="Name*"></form-input>
                                    <form-input name="email" label="E-mail*"></form-input>
                                    <form-input name="subject" label="Subject"></form-input>
                                    <form-input name="message" label="Type your message here*" type="textarea"></form-input>
                                </contact-form>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <h4 data-aos="fade">
                                    {{ $sections['contact']['textTitle'] }}
                                </h4>
                                <p data-aos="fade">
                                    {{ $sections['contact']['textContent'] }}
                                </p>
                                <div class="Contact__details">

                    @if($sections['footer']['phone']['enabled'])
                        @if($sections['footer']['phone']['link'])<a href="{{ $sections['footer']['phone']['link'] }}" class="footer-link">@endif

                            <div class="Contact__detail"  data-aos="fade">
<!--                                 <i class="fa fa-phone"></i>
                                503.619.6366 -->

                                <i class="fa {{ $sections['footer']['phone']['icon'] }}"></i>
                                {{ $sections['footer']['phone']['text'] }}

                            </div>

                        @if($sections['footer']['phone']['link'])</a>@endif
                    @endif


                                    <div class="Contact__detail"  data-aos="fade">
                                        <i class="fa fa-envelope"></i> jeremykenedy@gmail.com
                                    </div>
                                    <div class="Contact__detail"  data-aos="fade">
                                        <i class="fa fa-clock-o"></i> Pacific Standard Time
                                    </div>
                                    <div class="Contact__detail"  data-aos="fade">
                                        <i class="fa fa-map-marker"></i> Portland, OR, USA
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
