@php
    $offer_cats = App\Models\Admin\OfferCategory::with('offer')
        ->whereHas('offer')
        ->where('status', '1')
        ->limit(4)
        ->latest()
        ->get();
@endphp

@if (count($offer_cats) > 0)
    <div class="offer-deals">
        <div class="offer--deals__main offer-deals--bg pt-75 pb-45"
            data-background="{{ asset('frontend/template_one/assets/img/bg/offer__deals__bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offer--deals__tabs">

                            <div class="tab-content" id="myTabContent">


                                @foreach ($offer_cats as $key => $offer_cat)
                                    @if (!empty($offer_cat->offer))
                                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                            id="cat-tab-{{ $offer_cat->id }}" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row align-items-center">
                                                <div class="col-xl-4 col-lg-4">
                                                    <div class="offer--deals__title mb-30">
                                                        <h2>
                                                            Offer
                                                            <span
                                                                class="f-800 pure__black-color d-block">{{ $offer_cat->offer_category_name }}</span>
                                                        </h2>
                                                        <p>Hurry Up Before Offer Will End</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    {{-- <img class="img-fluid"
                                                    src="{{ asset('storage/offer_image/' . $offer_cat->offer->offer_image) }}"
                                                    alt=""> --}}
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <div class="offer--deals__products mb-30">

                                                        <div class="products--deals__content mb-35">
                                                            <h6 class="f-700 mb-20">
                                                                <a href="javascript:;"
                                                                    id="opname">{{ $offer_cat->offer->name }}</a>
                                                            </h6>

                                                            <span>Tk </span><span
                                                                class="price-old">{{ $offer_cat->offer->price }}</span>

                                                            <span class="f-600 grenadier-color">Tk<span
                                                                    class="price-new f-600 grenadier-color"
                                                                    id="">{{ $offer_cat->offer->discount_price }}</span></span>

                                                            <input type="hidden" class="mb-0  border-1" name=""
                                                                value="{{ $offer_cat->offer->discount_price }}"
                                                                min="1" id="opprice" style="width: 50px" />

                                                            <input type="hidden" class="mb-0  border-1" name=""
                                                                value="1" min="1" id="oqty"
                                                                style="width: 50px" />

                                                        </div>
                                                        <div class="product-countdown mb-15">
                                                            <div class="time-count-deal">
                                                                <div class="countdown-list"
                                                                    data-countdown="{{ $offer_cat->offer->end_date }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="offerproduct_id"
                                                            value="{{ $offer_cat->offer->id }}">

                                                        <div class="product--footer__deals">
                                                            <a type="submit" style="cursor:pointer;"
                                                                onclick="offerToCartOne()" class="add-link f-700">+ Add
                                                                To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer--deals__menu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="deals--nav__menu">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">


                                @foreach ($offer_cats as $key => $offer_cat)
                                    @if (!empty($offer_cat->offer))
                                        <li class="nav-item">
                                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="cat-tab-one-tab"
                                                data-toggle="tab" href="#cat-tab-{{ $offer_cat->id }}" role="tab"
                                                aria-controls="cat-tab-one"
                                                aria-selected="true">{{ $offer_cat->offer_category_name }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@endif
