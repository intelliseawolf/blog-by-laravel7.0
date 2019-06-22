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
        @if(count($sections["portfolio"]["items"]) > 0)
            @include('portfolio.partials.portfolio-items',['limit' => true])
            @if($sections['portfolio']['seeMoreButton']['enabled'] && (count($sections["portfolio"]["items"]) >= $itemLimit))
                <div class="buttons-group buttons-group-center mt-3 Portfolio-see-more" data-aos="fade">
                    <a href="{{ $sections['portfolio']['seeMoreButton']['link'] }}" class="btn btn-black btn-right-icon">
                        {!! $sections['portfolio']['seeMoreButton']['text'] !!}
                        <i class="fa {{ $sections['portfolio']['seeMoreButton']['icon'] }}"></i>
                    </a>
                </div>
            @endif
        @else
            <h4 class="text-center">
                {{ $sections['portfolio']['noItems'] }}
            </h4>
        @endif
    </div>
</section>
