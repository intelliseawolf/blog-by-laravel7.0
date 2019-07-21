@php
    $footerLogoLink = '#Intro';
    if(isset($single)) {
        $footerLogoLink = route('home');
    }
@endphp
<footer>
    <div class="container">
        <div class="flex-row">
            <div class="col-sm-4">
                <div class="footer-contacts">
                    @if($sections['footer']['phone']['enabled'])
                        @if($sections['footer']['phone']['link'])<a href="{{ $sections['footer']['phone']['link'] }}" class="footer-link">@endif
                            <div class="footer-contact">
                                <i class="fa {{ $sections['footer']['phone']['icon'] }}"></i>
                                {{ $sections['footer']['phone']['text'] }}
                            </div>
                        @if($sections['footer']['phone']['link'])</a>@endif
                    @endif
                    @if($sections['footer']['email']['enabled'])
                        @if($sections['footer']['email']['link'])<a href="{{ $sections['footer']['email']['link'] }}" class="footer-link">@endif
                            <div class="footer-contact">
                                <i class="fa {{ $sections['footer']['email']['icon'] }}"></i>
                                {{ $sections['footer']['email']['text'] }}
                            </div>
                        @if($sections['footer']['email']['link'])</a>@endif
                    @endif
                </div>
            </div>
            <div class="col-sm-4">
                <a @if(!isset($single))class="page-scroll"@endif href="{{ $footerLogoLink }}">
                    <h2 class="logo">
                        {{ $logoText }}
                    </h2>
                </a>
                <div class="copyrights">
                    {!! $sections['footer']['copyright'] !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-socials">
                    @foreach($sections['footer']['socialmedia']['items'] as $item)
                        @if($item['active'])
                            <a href="{{ $item['link'] }}" target="_blank" class="footer-link">
                                <i class="fa {{ $item['icon'] }}" aria-hidden="true"></i>
                                <span class="sr-only">
                                    {!! $item['name'] !!}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
