@php
    $portfolioItemsCount = 0;
    $itemLimit = $sections['portfolio']['itemLimit'];
@endphp
<section id="Portfolio">
    <div class="section--basic @if(!$sections['portfolio']['seeMoreButton']['enabled']) pb-0 @endif">
        <div class="container">
            <div class="headline">
                <h2>
                    {!! $sections['portfolio']['sectionTitle'] !!}
                </h2>
            </div>
        </div>
        <portfolio @if($sections['portfolio']['spacing']) type="spacing" @endif :lightbox="@if($sections['portfolio']['lightBox']) true @else false @endif" :data='[
            @foreach($sections["portfolio"]["items"] as $item)
                @php if($portfolioItemsCount == $itemLimit) break; @endphp
                    {"name": "{{ $item["name"] }}", "image": "{{ $item["image"] }}", "href": "@if($sections["portfolio"]["lightBox"]) {{ $item["href2"] }} @else {{ $item["href1"] }} @endif", "tags": [@foreach($item["tags"] as $tag) "{{ $tag }}", @endforeach]},
                @php $portfolioItemsCount++; @endphp
            @endforeach
        ]'>
        </portfolio>
        @if($sections['portfolio']['seeMoreButton']['enabled'])
            <div class="buttons-group buttons-group-center mt-3 Portfolio-see-more" data-aos="fade">
                <a href="{{ $sections['portfolio']['seeMoreButton']['link'] }}" class="btn btn-black btn-right-icon">
                    {!! $sections['portfolio']['seeMoreButton']['text'] !!}
                    <i class="fa {{ $sections['portfolio']['seeMoreButton']['icon'] }}"></i>
                </a>
            </div>
        @endif
    </div>
</section>
