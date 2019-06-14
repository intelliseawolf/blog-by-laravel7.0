<div class="section paralax-counters" id="Counters" style="background-image: url({!! $sections['counters']['background'] !!})">
    <div class="section--basic">
        <div class="container">
            <div class="row">
                @foreach($sections['counters']['items'] as $counter)
                    <div class="{{ $sections['counters']['bsClass'] }}">
                        @if($counter['link'])<a href="https://packagist.org/profile/" target="_blank">@endif
                            <counter data-aos="fade" data-aos-offset="150" @if($counter['delay'])data-aos-delay="{{ $counter['delay'] }}"@endif :number="{{ $counter['number'] }}" @if($counter['increment']):increment="{{ $counter['increment'] }}"@endif text="{{ $counter['title'] }}" icon="{{ $counter['icon'] }}" inline-tepmlate></counter>
                        @if($counter['link'])</a>@endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
