@if ($products->isEmpty())
    <h4 class="text-center text-danger">Product Not Found</h4>
@else
    <div class="">
        <ul class="items g-2 g-md-3 row row-cols-lg-4 row-cols-md-3 row-cols-sm-2">


            @foreach ($products as $product)
                <div class="d-flex align-items-center w-100">
                    <div class="mini-image text-center"><a class="item-link" href=""><img class="blur-up lazyload"
                                data-src="{{ asset($product->product_image) }}" src="{{ asset($product->product_image) }}"
                                alt="image" title="product" width="50" height="50" /></a>
                    </div>
                    <div class="ms-3 details text-left">
                        <div class="product-name"><a class="item-title" href="">{{ $product->product_name }}</a>
                        </div>
                        {{-- <div class="product-price"><span class="price">Tk
                                    {{ $product->short_desc }}</span>
                            </div> --}}
                    </div>
                </div>
            @endforeach


        </ul>
    </div>

@endif
