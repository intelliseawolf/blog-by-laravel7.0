@php
    $blogItemsCount     = 0;
    $blogPostFade       = 0;
    $blogPostFadeInc    = 150;
    $blogItemLimit      = $sectionData['itemLimit'];
@endphp
<section id="Blog">
    <div class="section--basic">
        <div class="container">
            <div class="headline">
                <h2>
                    {!! $sectionData['sectionTitle'] !!}
                </h2>
            </div>
            <div class="Blog pt-2">
                <div class="row">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            @php if($blogItemsCount == $blogItemLimit) break; @endphp
                                <div class="col-sm-4" data-aos="fade" data-aos-delay="{{ $blogPostFade }}">
                                    <div class="Blog__post">
                                        <div class="Blog__post-image">
                                            <a href="{{ route('blog') . '/' . $post->slug }}">
                                                <img src="{{ $post->post_image }}" alt="{{ $post->title }}" style="height:300px; width:auto;">
                                            </a>
                                        </div>
                                        <div class="Blog__post-caption">
                                            <a href="{{ route('blog') . '/' . $post->slug }}">
                                                <h4>
                                                    {{ $post->title }}
                                                </h4>
                                            </a>
                                            <ul class="Blog__post-categories">
                                                @foreach($post->tags as $tag)
                                                    <li>
                                                        {{ $tag->title }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @php
                                $blogPostFade += $blogPostFadeInc;
                                $blogItemsCount++;
                            @endphp
                        @endforeach
                    @else
                        <h4 class="text-center">
                            {!! $sectionData['noPosts'] !!}
                        </h4>
                    @endif
                </div>
                @if($sectionData['seeMoreButton']['enabled'] && (count($posts) > 0))
                    <div class="row">
                        <div class="buttons-group buttons-group-center mt-3 Blog-see-more" data-aos="fade">
                            <a href="{{ $sectionData['seeMoreButton']['link'] }}" class="btn btn-black btn-right-icon">
                                {!! $sectionData['seeMoreButton']['text'] !!}
                                <i class="fa {{ $sectionData['seeMoreButton']['icon'] }}"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
