<div class="Intro Intro--single-photo" id="Intro" style="background-image: url({{ $sections['intro']['bgImage'] }})">
    @if($sections['intro']['particlesEnabled'])
        <div id="particles-js"></div>
    @endif
    <intro-typing :statictextinput="'{{ $sections['intro']['introStaticText'] }}'" :typingtextsinput="[@foreach($sections['intro']['introTypeingText'] as $typingTextItem)'{{ $typingTextItem }}', @endforeach]" :timing="{{ $sections['intro']['speed'] }}"></intro-typing>
    @if($sections['intro']['scrollHtmlEnabled'])
        <start-arrow text="{{ $sections['intro']['downText'] }}"></start-arrow>
    @endif
</div>

@push('scripts')
    @if($sections['intro']['particlesEnabled'])
        @if(config('portfolio.particlesjs.useCdn'))
            <script type="text/javascript" src="{{ config('portfolio.particlesjs.cdn') }}"></script>
        @else
            <script type="text/javascript" src="/js/particles.js"></script>
        @endif
        <script type="text/javascript">
            window.addEventListener("load", function(event) {
                particlesJS.load('particles-js', '/js/particles-config.json');
            });
        </script>
    @endif
@endpush
