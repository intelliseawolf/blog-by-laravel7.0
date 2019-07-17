@php
    $delay      = 0;
    $dealyInc   = 150;
@endphp
<section id="Services">
    <div class="section--basic section--darker">
        <div class="container">
            <div class="headline">
                @if($sections['services']['sectionTitleEnabled'])
                    <h2>
                        {!! $sections['services']['sectionTitle'] !!}
                    </h2>
                @endif
            </div>
            <div class="row pt-2">
                @foreach($sections['services']['items'] as $item)
                    <div class="{{ $sections['services']['bsClass'] }}">
                        <div class="offer-wrap" data-aos="fade" data-aos-delay="{{ $delay }}">
                            <div class="offer-box">
                                <i class="{{ $item['icon'] }}"></i>
                                <h4>
                                    {!! $item['name'] !!}
                                </h4>
                                {!! $item['text'] !!}
                            </div>
                        </div>
                    </div>
                    @php
                        $delay += $dealyInc;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</section>
