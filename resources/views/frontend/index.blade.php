@extends('frontend.layouts.app')

@section('content')
    <!--======================================================= SLIDER START ====-->
    <section id="slider" class="body_bg">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-12 d-md-block d-none">
                    <div class="category_title_top d-flex justify-content-between theme_bg">
                        <div class="category_title">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <div class="category_btn">
                            <a href="{{ route('categories.all') }}">View All</a>
                        </div>
                    </div>
                    <ul class="bg-white border_one d-lg-block d-none">
                        @foreach (\App\Category::all()->take(11) as $key => $category)
                            @php
                                $brands = [];
                            @endphp
                            <li class="px-3 product_icon position-relative d-block category-nav-element"
                                data-id="{{ $category->id }}">
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        <a href="{{ route('products.category', $category->slug) }}"
                                            class="sub_icon">
                                            <span class="pr-2 category_icon_img">
                                                <img src="{{ asset($category->icon) }}"
                                                    data-src="{{ asset($category->icon) }}" class="img-fluid"
                                                    alt="{{ $category->name }}">
                                            </span>
                                            {{ $category->name }}</a>
                                    </div>
                                    <div class="icon_show_category">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </div>
                                </div>

                                @if (count($category->subcategories) > 0)
                                    <ul class="sub_menu_list">
                                        @foreach ($category->subcategories as $subcategory)
                                            @if (count($subcategory->subsubcategories) > 0)
                                                <li>
                                                    {{-- <a href="{{ route('products.subcategory', $subcategory->slug) }}">
                                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                        {{ $subcategory->name }}
                                                    </a> --}}
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <div>
                                                            <a href="{{ route('products.subcategory', $subcategory->slug) }}"
                                                                class="sub_icon"><span class="pr-2 category_icon_img">
                                                                    {{-- <img src="{{ asset($subcategory->icon) }}"
                                                                        data-src="{{ asset($subcategory->icon) }}"
                                                                        class="img-fluid"
                                                                        alt="{{ $subcategory->name }}"> --}}
                                                                </span>
                                                                {{ $subcategory->name }}
                                                            </a>
                                                        </div>
                                                        <div class="icon_show_category">
                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    @foreach ($subcategory->subsubcategories as $subsubcategory)
                                                <li><a
                                                        href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ __($subsubcategory->name) }}</a>
                                                </li>
                                            @endforeach
                            </li>
                        @else
                            <li>
                                <a href="{{ route('products.subcategory', $subcategory->slug) }}">
                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    {{ $subcategory->name }}</a>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    </li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-lg-9 col-12">
                    @php
                        $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1))->get());
                    @endphp

                    <div class="slider_banner">
                        @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                            <div class="slider_item position-relative">
                                <a href="{{ $slider->link }}">
                                    <img src="{{ asset($slider->photo) }}" class="d-block w-100 img-fluid"
                                        alt="{{ env('APP_NAME') }} promo" /></a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--============================================================ SLIDER END ====-->
    <!--============================================================ CATEGORY START=-->
    <section id="category_section" class="">
        <div class="container">
            <div class="grid-container slick_category">
                @foreach (\App\Category::where('featured', 1)->get()->take(7)
        as $key => $category)
                    <div class="category_men_block">
                        <a href="{{ route('products.category', $category->slug) }}">
                            <div class="grid-item">
                                <img src="{{ asset($category->banner) }}" alt="{{ $category->name }}"
                                    class="img-fluid img-fit lazyloaded">
                            </div>
                            <div class="text_cate">
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--============================================================ CATEGORY END ====-->
    <!--=========================================== BEST SELLING START ======-->

    <section id="product-listing-wrapper" class=" product_listing padding_defauld">
        <div class="container">
            <div class="product-lists">
                <div class="row">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-3 col-md-4 ">
                                <div class="flash_men my-4 my-md-0">
                                    <div class="special_offer_men p-4 text-center">
                                        <div class="special_header d-flex justify-content-between align-items-center">
                                            <div class="special_title">
                                                <h4>Special Offer</h4>
                                            </div>
                                            <div class="savings">
                                                <span class="savings-text">
                                                    <span class="font-weight-normal"> Save</span> <span
                                                        class="woocommerce-Price-amount amount font-weight-bold"><bdi><span
                                                                class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="special_left">
                                            <a href="">
                                                <img src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/consal-300x300.png"
                                                    class="img-fluid" alt="">
                                                <h6>Game Console Controller + USB 3.0 Cable</h6>
                                            </a>
                                        </div>
                                        <div class="special_price_le py-2">
                                            <h4> <span class="red_text">Rs79.00</span>
                                                <small><strike>Rs999</strike></small>
                                            </h4>
                                        </div>
                                        <div class="special_countdown">
                                            <div class="content_left">
                                                <h5 id="headline">Hurry Up! Offer ends in:</h5>
                                                <div id="countdown">
                                                    <ul class="d-flex align-items-center justify-content-center">
                                                        <!-- <li class="d-flex flex-column"><span id="days"></span>days</li> -->
                                                        <li class="d-flex flex-column"><span id="hours"></span>Hours</li>
                                                        <li class="d-flex flex-column"><span id="minutes"></span>Minutes
                                                        </li>
                                                        <li class="d-flex flex-column"><span id="seconds"></span>Seconds
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="special_offer_men p-4 text-center">
                                        <div class="special_header d-flex justify-content-between align-items-center">
                                            <div class="special_title">
                                                <h4>Special Offer</h4>
                                            </div>
                                            <div class="savings">
                                                <span class="savings-text">
                                                    <span class="font-weight-normal"> Save</span> <span
                                                        class="woocommerce-Price-amount amount font-weight-bold"><bdi><span
                                                                class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="special_left">
                                            <a href="">
                                                <img src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/GoldPhone-1-300x300.png"
                                                    class="img-fluid" alt="">
                                                <h6>Game Console Controller + USB 3.0 Cable</h6>
                                            </a>
                                        </div>
                                        <div class="special_price_le py-2">
                                            <h4> <span class="red_text">Rs79.00</span>
                                                <small><strike>Rs999</strike></small>
                                            </h4>
                                        </div>
                                        <div class="special_countdown">
                                            <div class="content_left">
                                                <h5 id="headline">Hurry Up! Offer ends in:</h5>
                                                <div id="countdown">
                                                    <ul class="d-flex align-items-center justify-content-center">
                                                        <!-- <li class="d-flex flex-column"><span id="days"></span>days</li> -->
                                                        <li class="d-flex flex-column"><span id="hours_a"></span>Hours</li>
                                                        <li class="d-flex flex-column"><span id="minutes_a"></span>Minutes
                                                        </li>
                                                        <li class="d-flex flex-column"><span id="seconds_a"></span>Seconds
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-9 col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="section_title_block d-flex justify-content-between align-item-center h-100">
                                            <h2 class="position-relative mb-0">Today Flash Sale</h2>
                                            <a class="btn_view" href=""> View All Best Selling <span
                                                    class="pl-2 "><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i></span></a>
                                            </header>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="grid-container  best_selling">
                                            @php
                                                $flash_deal = \App\FlashDeal::where('status', 1)
                                                    ->where('featured', 1)
                                                    ->first();
                                                // dd($flash_deal);
                                            @endphp
                                            
                                            @if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date)
                                            @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                                                @php
                                                    $product = \App\Product::find($flash_deal_product->product_id);
                                                @endphp
                                                @if ($product != null && $product->published != 0)
                                                    <div class="grid-item mb-4 ">
                                                        <div class="product-grid-item ">
                                                            <div class="category-title">
                                                                <div class="category">
                                                                    <a class="m-0">Watch</a>
                                                                </div>
                                                                <h6 class="title">
                                                                    <a href="{{ route('product', $product->slug) }}"
                                                                        class="">{{ $product->name }}</a>
                                                                </h6>
                                                            </div>
                                                            <div class="product-grid-image">
                                                                <a href="{{ route('product', $product->slug) }}">
                                                                    @if (!empty($product->featured_img))
                                                                        <img class="pic-1"
                                                                            src="{{ asset($product->featured_img) }}"
                                                                            data-src="{{ asset($product->featured_img) }}"
                                                                            alt="{{ $product->name . '-' . $product->unit_price }}">
                                                                    @else
                                                                        <img class="pic-1"
                                                                            src="{{ asset(json_decode($product->photos)[0]) }}"
                                                                            data-src="{{ asset(json_decode($product->photos)[0]) }}"
                                                                            alt="{{ $product->name . '-' . $product->unit_price }}">

                                                                    @endif

                                                                </a>
                                                                <span class="product-discount-label">-20%</span>
                                                            </div>
                                                            <div class="price-cart text-center pt-2">
                                                                <div class="price d-flex align-items-center">
                                                                    <h6 class="m-0 gray">
                                                                        {{ home_discounted_base_price($product->id) }}
                                                                    </h6>
                                                                    @if (home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                    <span>{{ home_base_price($product->id) }}</span>    
                                                                    @endif
                                                                    
                                                                </div>
                                                                <a class="all-deals ico effect" href=""
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Add to Cart"><i
                                                                        class="fa fa-shopping-cart icon"></i> </a>
                                                            </div>
                                                            <div class="cart-compare">
                                                                <a class="all-deals effect gray" href="wishlist.html"><i
                                                                        class="fa fa-heart icon mr-2"></i>Wishlist </a>
                                                                <a class="all-deals effect gray" href="compare.html"> <i
                                                                        class="fa fa-exchange icon mr-2"></i>Compare </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================================= BEST SELLING END ======-->
    <!--============================================= THREE BANNER SECTION START =-->

    <section id="product-listing-wrapper" class=" product_listing">
        <div class="container">
            <div class="product-lists">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                            <h2 class="position-relative mb-0">Recommendation For You</h2>
                            <a class="btn_view" href=""> View All Recommendations <span class="pl-2 "><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </header>
                        </div>
                    </div>

                    <div class="col-xl-12">

                        <div class="grid-container  slider_feature">
                            <div class="grid-item mb-4 ">
                                <div class="product-grid-item ">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Watch</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/WirelessSound-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Phones</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/Ultrabooks-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Accesories</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/heade1-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Laptop</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/redmi-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Headphone</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/watch-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Iphone</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/GoldPhone-1-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Laptop</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/gamecabin-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Computer</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/macpro-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================================= FEATURED PRODUCT END ======-->
    <!--=========================================== FEATURED PRODUCT START ======-->
    <!--============================================= BANNER START ======-->
    <section id="banner_two" class="padding_defauld">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="">
                        <div class="two_banner_img">
                            <img src="https://naulobazar.com/public/shop/logo/1.jpeg" class="img-fluid" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="">
                        <div class="two_banner_img">
                            <img src="https://naulobazar.com/public/shop/logo/1.jpeg" class="img-fluid" alt="">
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!--=========================================== BANNER END ======-->

    <section id="product-listing-wrapper" class=" product_listing">
        <div class="container">
            <div class="product-lists">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                            <h2 class="position-relative mb-0">Just For You</h2>
                            <a class="btn_view" href=""> View All <span class="pl-2 "><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </header>
                        </div>
                    </div>

                    <div class="col-xl-12">

                        <div class="grid-container  slider_feature">
                            <div class="grid-item mb-4 ">
                                <div class="product-grid-item ">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Watch</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/WirelessSound-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Phones</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/Ultrabooks-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Accesories</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/heade1-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Laptop</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/redmi-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Headphone</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/watch-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Iphone</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/GoldPhone-1-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Laptop</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/gamecabin-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item mb-4">
                                <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0">Computer</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="product-listing.html" class="">Grana Padano </a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="product-listing.html">
                                            <img class="pic-1"
                                                src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/macpro-300x300.png">
                                        </a>
                                        <span class="product-discount-label">-20%</span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">Rs 1000</h6>
                                            <span>£ 10.00</span>
                                        </div>
                                        <a class="all-deals ico effect" href="dashboard-cart.html" data-toggle="tooltip"
                                            data-placement="right" title="Add to Cart"><i
                                                class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="wishlist.html"><i
                                                class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href=""> <i
                                                class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================================= FEATURED PRODUCT END ======-->
    <!--============================================= VENDER START ======-->
    <section id="vendor-listing-wrapper" class="padding_defauld vender_home">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                        <h2 class="position-relative mb-0">Our Top Vendors</h2>
                        <a class="btn_view" href=""> View All Best Vendors <span class="pl-2 "><i
                                    class="fa fa-angle-right" aria-hidden="true"></i></span></a>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Corprate Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Herbs &amp; Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Corprate Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Herbs &amp; Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Corprate Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4">
                    <a class="vender_item" href="dashboard-vendor-profile.html">
                        <div class="vendor-wrap d-flex align-items-center">
                            <div class="image">
                                <img src="frontend/assets/images/banner/1.jpg" alt="vendor-profile-image">
                            </div>
                            <div class="vendor-content ml-3">
                                <label for="name" class="m-0 font-weight-bold">Herbs &amp; Meds Co.</label>
                                <div class="category">
                                    Category: Medical Supply
                                </div>
                                <ul class="d-flex">
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </a>
                </div>
                <!-- <div class="col-12 text-center mt-4">
                                                                   <button type="button" class="btn-custom mx-auto">View More</button>
                                                               </div> -->
            </div>

        </div>
    </section>
    <!--============================================= VENDER END ======-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                // console.log(data);
                $('#section_featured').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.best_selling') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_best_selling').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_home_categories').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.best_sellers') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_best_sellers').html(data);
                slickInit();
            });
        });
    </script>
@endsection
