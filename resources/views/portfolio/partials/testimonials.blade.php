<div class="testimonials-headline" id="testimonials">
    <h2>
        {{ $sections['testimonials']['sectionTitle'] }}
    </h2>
</div>
<div class="section paralax-testimonials testimonials">
    <testimonials>
        @foreach($sections['testimonials']['items'] as $testimonial)
            <testimonial author="{{ $testimonial['author'] }}">
                <i class="{{ $testimonial['icon'] }}"></i>
                <br /><br />
                {!! $testimonial['content'] !!}
            </testimonial>
        @endforeach
    </testimonials>
</div>
