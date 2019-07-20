@php
    $contactRightCssClass = 'col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3';
@endphp
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
                    @if($sections['contact']['form']['enabled'])
                        @php
                            $contactRightCssClass = 'col-md-4 col-sm-6';
                        @endphp
                        <div class="col-md-6 col-md-offset-1 col-sm-6" data-aos="fade">
                            <contact-form :buttonText="'{{ $sections['contact']['form']['submitButton'] }}'" successMsg="'{{ $sections['contact']['form']['messages']['successMsg'] }}'" serverErrorMsg="'{{ $sections['contact']['form']['messages']['serverErrorMsg'] }}'">
                                <form-input name="name" label="{{ $sections['contact']['form']['labels']['name'] }}"></form-input>
                                <form-input name="email" label="{{ $sections['contact']['form']['labels']['email'] }}"></form-input>
                                <form-input name="subject" label="{{ $sections['contact']['form']['labels']['subject'] }}"></form-input>
                                <form-input name="message" label="{{ $sections['contact']['form']['labels']['message'] }}" type="textarea"></form-input>
                            </contact-form>
                        </div>
                    @endif
                    <div class="{{ $contactRightCssClass }}">
                        <h4 data-aos="fade">
                            {{ $sections['contact']['textTitle'] }}
                        </h4>
                        <p data-aos="fade">
                            {{ $sections['contact']['textContent'] }}
                        </p>
                        <div class="Contact__details">
                            @if($sections['contact']['phone']['enabled'])
                                @if($sections['contact']['phone']['link'])<a href="{{ $sections['contact']['phone']['link'] }}" class="contact-link">@endif
                                    <div class="Contact__detail"  data-aos="fade">
                                        <i class="fa {{ $sections['contact']['phone']['icon'] }}"></i>
                                        {{ $sections['contact']['phone']['text'] }}
                                    </div>
                                @if($sections['contact']['phone']['link'])</a>@endif
                            @endif
                            @if($sections['contact']['email']['enabled'])
                                @if($sections['contact']['email']['link'])<a href="{{ $sections['contact']['email']['link'] }}" class="contact-link">@endif
                                    <div class="Contact__detail"  data-aos="fade">
                                        <i class="fa {{ $sections['contact']['email']['icon'] }}"></i>
                                        {!! $sections['contact']['email']['text'] !!}
                                    </div>
                                @if($sections['contact']['email']['link'])</a>@endif
                            @endif
                            @if($sections['contact']['time']['enabled'])
                                <div class="Contact__detail"  data-aos="fade">
                                    <i class="fa {{ $sections['contact']['time']['icon'] }}"></i>
                                    {!! $sections['contact']['time']['text'] !!}
                                </div>
                            @endif
                            @if($sections['contact']['location']['enabled'])
                                <div class="Contact__detail"  data-aos="fade">
                                    <i class="fa {{ $sections['contact']['location']['icon'] }}"></i>
                                    {!! $sections['contact']['location']['text'] !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
