<portfolio @if($sections['portfolio']['spacing']) type="spacing" @endif :lightbox="@if($sections['portfolio']['lightBox']) true @else false @endif" :data='[
    @foreach($sections["portfolio"]["items"] as $item)
        @if(isset($limit))
            @php if($portfolioItemsCount == $itemLimit) break; @endphp
        @endif
            {"name": "{{ $item->title }}",
             "image": "{{ $item->item_image }}",
             "href": "@if($sections["portfolio"]["lightBox"]) {{ $item->item_image_large }} @else {{ route("portfolio") . "/" . $item->slug }} @endif",
             "tags": [@foreach($item->tags as $tag) "{{ $tag->title }}", @endforeach]
            },
        @if(isset($limit))
            @php $portfolioItemsCount++; @endphp
        @endif
    @endforeach
    ]'>
</portfolio>
