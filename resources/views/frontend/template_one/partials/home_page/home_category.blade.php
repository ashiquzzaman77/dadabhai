@php
    $categorys = App\Models\Admin\Category::where('status', '1')->latest()->limit(5)->get();
@endphp

<div class="top__featured--area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-2">
                <div class="top__featured--title">
                    <span class="dusty__gray-color text-uppercase">Top Featured</span>
                    <h3 class="pure__black-color mb-120">
                        <span class="f-300">Discover Top</span>
                        <span class="f-800">Categories</span>
                    </h3>
                    {{-- <a class="grenadier-color" href="{{ route('home.all.category.page') }}">View All Category</a> --}}
                </div>
            </div>
            <div class="col-xl-10">
                <div class="categories-active row position-relative">

                    @if (count($categorys) > 0)
                        @foreach ($categorys as $category)
                            <div class="single-categories col-sm-12">
                                <div class="categories-box position-relative">
                                    <div class="categories-thumb">
                                        <a
                                            href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}"><img
                                                class="img" src="{{ asset('storage/category/' . $category->icon) }}"
                                                style="width: 255px; height: 255px;" alt="" /></a>
                                        <h6 class="f-800 pure__black-color cate-title">
                                            <a href="#">{{ $category->category_name }}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-danger">No Category Avaiable</p>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
