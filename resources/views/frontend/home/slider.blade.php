<div id="owl-carousel-main" class="owl-carousel nav-1">


    @if (count($banners) > 0)

        @foreach ($banners as $banner)
            <div class="gst-slide">
                <img src="{{ asset($banner->banner_image) }}" alt="Banner Image" />
                <div class="gst-caption container theme-container">
                    <div>
                        <div class="caption-center">
                            <p class="slider-title">
                                <span class="fsz-220 funky-font"></span>
                                <span class="funky-font-2 fsz-28"></span>
                            </p>
                            <a class="fancy-btn fsz-16" href="javascript:;">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No Banner Inserted</p>
    @endif


</div>
