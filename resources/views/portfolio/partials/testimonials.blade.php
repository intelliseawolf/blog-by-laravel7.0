<div class="section paralax-testimonials ">
    <testimonials>
        @foreach($sections['testimonials']['items'] as $testimonial)
            <testimonial author="{{ $testimonial['author'] }}">
                <i class="{{ $testimonial['icon'] }}"></i>
                <br />
                {!! $testimonial['text'] !!}
            </testimonial>
        @endforeach
    </testimonials>
</div>
