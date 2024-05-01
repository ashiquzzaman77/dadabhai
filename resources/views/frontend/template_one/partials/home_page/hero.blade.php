@php
    $heros = App\Models\Banner::where('status', '1')->orderBy('id', 'ASC')->get();
@endphp

<section class="hero hero__area">
    <div class="hero__active slider-active">

        @if (count($heros) > 0)

            @foreach ($heros as $hero)
                <div class="single__hero single-slider hero__bg pt-140 pb-120" style="height: 440px"
                    data-background="{{ asset($hero->banner_image) }}">
                </div>
            @endforeach
            
        @else
            <p class="text-center text-danger">No Image Avaiable</p>
        @endif

    </div>

</section>
