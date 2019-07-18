@php
    $counterDelay      = 0;
    $counterDelayInc   = 150;
@endphp

<div class="section paralax-counters" id="Counters" style="background-image: url({!! $sections['counters']['background'] !!})">
    <div class="section--basic">
        <div class="container">
            <div class="row">
                @foreach($sections['counters']['items'] as $counter)
                    <div class="{{ $sections['counters']['bsClass'] }}">
                        @if($counter['link'])<a href="{{ $counter['link'] }}" target="_blank">@endif
                            <counter data-aos="fade" data-aos-offset="150" data-aos-delay="{{ $counterDelay }}" :number="{{ $counter['number'] }}" @if($counter['increment']):increment="{{ $counter['increment'] }}"@endif text="{{ $counter['title'] }}" icon="{{ $counter['icon'] }}" inline-tepmlate></counter>
                        @if($counter['link'])</a>@endif
                    </div>
                    @php
                        $counterDelay += $counterDelayInc;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
