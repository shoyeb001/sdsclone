@extends('Fontend.main')
@section('content')

    <!-- Gallery Section -->
    <section class="gallery_view">
        <div class="heading">
            <h1>Gallery</h1>
        </div>
        <div class="gallery" id="gallery">

            @foreach ($galleryData as $gallery)
                <?php
                $img = json_decode($gallery->gallery);
                $pic = asset('/uploads/' . $img[0]);
                ?>
                <div class="gallery-item">
                    <div class="content"><img src="{{ $pic }}" alt=""></div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Footer -->

@endsection
