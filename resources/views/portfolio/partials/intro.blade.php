<div class="Intro Intro--single-photo" id="Intro" style="background-image: url({{ $sections['intro']['bgImage'] }})">
    @if($sections['intro']['particlesEnabled'])
        <div id="particles-js"></div>
    @endif
    <intro-typing :statictextinput="'{{ $sections['intro']['introStaticText'] }}'" :typingtextsinput="[@foreach($sections['intro']['introTypeingText'] as $typingTextItem)'{{ $typingTextItem }}', @endforeach]" :timing="{{ $sections['intro']['speed'] }}"></intro-typing>
    @if($sections['intro']['scrollHtmlEnabled'])
        <start-arrow text="{{ $sections['intro']['downText'] }}"></start-arrow>
    @endif
</div>
