<div class="@if($sections['about']['enabled']) col-md-5 col-md-offset-1 @else col-md-12 @endif">
    <div class="about-me-skills mb-3">
        @if($sections['skills']['titleEnabled'])
            <h4 data-aos="fade">
                {{ $sections['skills']['title'] }}
            </h4>
        @endif
        @foreach($sections['skills']['items'] as $item)
            @if($item->active)
                <skill percent="{{ $item->percent }}">
                    {!! $item->name !!}
                </skill>
            @endif
        @endforeach
    </div>
</div>
