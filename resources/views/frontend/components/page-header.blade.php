<section class="page_header @isset($header_classes){{ $header_classes }}@endisset">
    @isset($header_bg_image)
        <div class="bg_holder" style="background-image: url(/storage/{{ $header_bg_image }});">
        @endisset
    </div>
    <div class="container">
        @isset($header_tagline)
            <p class="page_header_tagline">{{ $header_tagline }}</p>
        @endisset
        @isset($header_title)
            <h1 class="page_header_title">{{ $header_title }}</h1>
        @endisset
        @isset($header_description)
            <p class="page_header_description">{{ $header_description }}</p>
        @endisset
    </div>
</section>
