
<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="en">
@else
<html lang="en">
@endif

<head>
    @php
    $seosetting = \App\SeoSetting::first();
@endphp
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="robots" content="index, follow">
   <title>@yield('meta_title', config('app.name', 'Laravel'))</title>
   <meta name="description" content="@yield('meta_description', $seosetting->description)" />
<meta name="keywords" content="@yield('meta_keywords', $seosetting->keyword)">
<meta name="author" content="{{ $seosetting->author }}">
<meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">

@yield('meta')

@if(!isset($detailedProduct))
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ config('app.name', 'Laravel') }}">
    <meta itemprop="description" content="{{ $seosetting->description }}">
    <meta itemprop="image" content="{{ asset(\App\GeneralSetting::first()->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ $seosetting->description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset(\App\GeneralSetting::first()->logo) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:type" content="Ecommerce Site" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ asset(\App\GeneralSetting::first()->logo) }}" />
    <meta property="og:description" content="{{ $seosetting->description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endif
<!-- Favicon -->
<link type="image/x-icon" href="{{ asset(\App\GeneralSetting::first()->favicon) }}" rel="shortcut icon" />
   <!-- Bootstrap link Starts -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap-4.3.1/css/bootstrap.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap-4.3.1/css/bootstrap.min.css.map') }}" />
   <!-- Bootstrap link Ends -->
   <!-- Font Awesome Link Starts -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
   <!-- Font Awesome Link Ends -->
   <!-- Slick Css -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/slick/slick.css') }}" />
   <link rel="stylesheet" href="{{ asset('frontend/assets/slick/slick-theme.css') }}" />
   <!-- Slick Css Ends-->
   <!-- Custom Links -->
   <!-- Font Link -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <!-- google font  -->
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Readex+Pro:wght@200&display=swap"
      rel="stylesheet" />
   <!-- Font Link Ends -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />

   <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/style2.css') }}" />
   <!-- Custom Links Ends -->
   <!-- Countdown start -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/countdown/css/flipclock.css') }}" />
   <!-- Countdown end -->
   @if (\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('TRACKING_ID') }}');
    </script>
@endif

@if (\App\BusinessSetting::where('type', 'facebook_pixel')->first()->value == 1)
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', {{ env('FACEBOOK_PIXEL_ID') }});
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none"
       src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@endif

</head>

<body>
   <!-- <div id="loading"></div> -->
   @include('frontend.inc.header')
   
   @include('frontend.inc.nav')
   <!--======================================================= HEADER END ======-->

   @yield('content')

   @include('frontend.inc.footer')


   @if (\App\BusinessSetting::where('type', 'facebook_chat')->first()->value == 1)
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        </div>
    @endif
   <!--============================================================ LINK START ====-->
   <!-- 1st Jquery Link Starts-->
   <script src="{{ asset('frontend/assets/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
   <!-- Jquery Link Ends-->
   <!-- Popper -->
   <script src="{{ asset('frontend/assets/popper/popper.min.js') }}"></script>
   <!-- Popper Ends-->
   <!-- 3rd Bootstrap Js Link Starts -->
   <script src="{{ asset('frontend/assets/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('frontend/assets/bootstrap-4.3.1/js/bootstrap.min.js.map') }}"></script>
   <!-- Bootstrap Js Link Ends -->
   <!-- Slick Js -->
   <script src="{{ asset('frontend/assets/slick/slick.min.js') }}"></script>
   <!-- Slick Js Ends-->
   <!-- Magnific Popup -->
   <script src="{{ asset('frontend/assets/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
   <!-- Magnific Popup Ends-->
   <!-- Countdown start -->
   <script src="{{ asset('frontend/assets/countdown/js/flipclock.js') }}"></script>
   <!-- <script src="frontend/assets/countdown/js/flipclock.min.js"></script> -->
   <!-- Countdown end -->
   <!-- Custom Js Starts -->
   <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
   <!-- Custom Js Ends -->
   <!--============================================================= LINK START ====-->
   <!-- Popup Search Modal -->
   <!-- Modal -->
   <div class="modal fade" id="searchpopupmodal" tabindex="-1" role="dialog" aria-labelledby="searchpopupmodallabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="searchpopupmodallabel">
                  Search your favourite item here !
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" />
            </div>
            <div class="modal-footer my-auto border-0 w-100">
               <ul class="search-list-wrapper w-100">
                  <li class="mb-2 p-1">
                     <a href="">
                        <div class="row">
                           <div class="col-2">
                              <div class="image">
                                 <img src="frontend/assets/images/product-images/1.jpg" alt="search-list-image"
                                    class="img-fluid" />
                              </div>
                           </div>
                           <div class="col-10 m-auto">
                              <p class="m-0">Ham Cheese Burger</p>
                           </div>
                        </div>
                     </a>
                  </li>
                  <li class="mb-2 p-1">
                     <a href="">
                        <div class="row">
                           <div class="col-2">
                              <div class="image">
                                 <img src="frontend/assets/images/product-images/1.jpg" alt="search-list-image"
                                    class="img-fluid" />
                              </div>
                           </div>
                           <div class="col-10 m-auto">
                              <p class="m-0">Ham Cheese Burger</p>
                           </div>
                        </div>
                     </a>
                  </li>
                  <li class="mb-2 p-1">
                     <a href="">
                        <div class="row">
                           <div class="col-2">
                              <div class="image">
                                 <img src="frontend/assets/images/product-images/1.jpg" alt="search-list-image"
                                    class="img-fluid" />
                              </div>
                           </div>
                           <div class="col-10 m-auto">
                              <p class="m-0">Ham Cheese Burger</p>
                           </div>
                        </div>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- Popup Search Modal Ends-->
   <!-- Nav Cart Pop Up -->
   <div class="modal fade" id="nav-cart" tabindex="-1" role="dialog" aria-labelledby="navcartlabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title m-auto" id="navcartlabel">
                  <span class="mr-2"><i class="fa fa-opencart" aria-hidden="true"></i></span>
                  Items List
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <table class="w-100">
                  <tbody>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/1.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/6.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/5.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/3.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/2.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                     <tr>
                        <td class="pr-4 py-3">
                           <img src="frontend/assets/images/product-images/1.jpg" class="img-fluid" />
                        </td>
                        <td class="px-4 py-3">
                           <a href="">
                              <div class="head font-weight-bold">
                                 Cheese Platter x <span class="cart-quantity">1</span>
                              </div>
                              <div class="price">Rs 1000</div>
                           </a>
                        </td>
                        <td class="px-4 py-3">
                           <a class="btn">
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer flex-column">
               <div class="total-amount pb-3 text-center d-block">
                  Total : <span class="font-weight-bold">Rs 1500</span>
               </div>
               <div class="d-flex justify-content-around align-items-center w-100">
                  <button type="button" class="effect m-auto">View Cart</button>
                  <button type="button" class="effect m-auto">
                     Proceed Checkout
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Nav Cart Pop Up Ends -->
   <!-- Mobile Filter Pop Up -->
   <!-- Modal -->
   <div class="modal fade" id="leftsidebarfilter" tabindex="-1" role="dialog" aria-labelledby="leftsidebarfilterlabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="leftsidebarfilterlabel">
                  Product Filter
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="left-side-wrapper px-4 py-4">
                  <!-- Content -->
                  <div class="card-wrapper mb-2">
                     <div class="card-group-item">
                        <div class="card-head">
                           <div class="heading d-flex align-items-center text-center flex-wrap">
                              <div class="head">
                                 <h5 class="text-uppercase pl-5 m-0">Categories</h5>
                              </div>
                           </div>
                        </div>
                        <div class="filter-content1">
                           <div class="card-body p-3">
                              <ul class="mb-0">
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1 active">Cheese Category 1</a>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1">Cheese Category 1</a>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1">Cheese Category 1</a>
                                    </div>
                                 </li>
                              </ul>
                              <div class="collapse" id="expand1">
                                 <ul>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="expand text-center">
                                 <a data-toggle="collapse" href="#expand1" role="button" aria-expanded="false"
                                    aria-controls="expand1">View more</a>
                              </div>
                           </div>
                           <!-- card-body.// -->
                        </div>
                     </div>
                     <!-- card-group-item.// -->
                  </div>
                  <!-- Content -->
                  <div class="card-wrapper mt-4 mb-2">
                     <div class="card-group-item">
                        <div class="card-head">
                           <div class="heading d-flex align-items-center text-center flex-wrap">
                              <div class="head">
                                 <h5 class="text-uppercase pl-5 m-0">Product</h5>
                              </div>
                           </div>
                        </div>
                        <div class="filter-content2">
                           <div class="card-body">
                              <form>
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 1 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 2 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 3 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 1 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 2 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 3 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <div class="collapse" id="expand2">
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 1 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 2 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                 </div>
                                 <div class="expand text-center">
                                    <a data-toggle="collapse" href="#expand2" role="button" aria-expanded="false"
                                       aria-controls="expand2">View more</a>
                                 </div>
                              </form>
                           </div>
                           <!-- card-body.// -->
                        </div>
                     </div>
                     <!-- card-group-item.// -->
                  </div>
                  <!-- Content -->
                  <div class="card-wrapper mb-2">
                     <div class="card-group-item">
                        <div class="card-head">
                           <div class="heading d-flex align-items-center text-center flex-wrap">
                              <div class="head">
                                 <h5 class="text-uppercase pl-5 m-0">Categories</h5>
                              </div>
                           </div>
                        </div>
                        <div class="filter-content1">
                           <div class="card-body p-3">
                              <ul class="mb-0">
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1 active">Cheese Category 1</a>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1">Cheese Category 1</a>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="item">
                                       <a href="" class="category-item py-1">Cheese Category 1</a>
                                    </div>
                                 </li>
                              </ul>
                              <div class="collapse" id="expand1">
                                 <ul>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Choose Category 1</a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="item">
                                          <a href="" class="category-item py-1">Cheese Category 1</a>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="expand text-center">
                                 <a data-toggle="collapse" href="#expand1" role="button" aria-expanded="false"
                                    aria-controls="expand1">View more</a>
                              </div>
                           </div>
                           <!-- card-body.// -->
                        </div>
                     </div>
                     <!-- card-group-item.// -->
                  </div>
                  <!-- Content -->
                  <div class="card-wrapper mt-4 mb-2">
                     <div class="card-group-item">
                        <div class="card-head">
                           <div class="heading d-flex align-items-center text-center flex-wrap">
                              <div class="head">
                                 <h5 class="text-uppercase pl-5 m-0">Product</h5>
                              </div>
                           </div>
                        </div>
                        <div class="filter-content2">
                           <div class="card-body">
                              <form>
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 1 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 2 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 3 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 1 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 2 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <span class="form-check-label"> Brand 3 </span>
                                 </label>
                                 <!-- form-check.// -->
                                 <div class="collapse" id="expand2">
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 1 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 2 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                    <!-- form-check.// -->
                                    <!-- form-check.// -->
                                    <label class="form-check d-flex align-items-center">
                                       <input class="form-check-input" type="checkbox" value="" />
                                       <span class="form-check-label"> Brand 3 </span>
                                    </label>
                                 </div>
                                 <div class="expand text-center">
                                    <a data-toggle="collapse" href="#expand2" role="button" aria-expanded="false"
                                       aria-controls="expand2">View more</a>
                                 </div>
                              </form>
                           </div>
                           <!-- card-body.// -->
                        </div>
                     </div>
                     <!-- card-group-item.// -->
                  </div>
               </div>
            </div>
            <!-- <div class="modal-footer">
                  </div> -->
         </div>
      </div>
   </div>
   <!-- Mobile Filter Pop Up Ends -->
   <!-- Mobile Nav -->
   <div class="modal fade" id="rightsidebarfilter" tabindex="-1" role="dialog" aria-labelledby="rightsidebarfilterlabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content h-100">
            <div class="modal-header px-3 py-3 align-items-center">
               <div class="cart-Track Your Order">
                  <div class="image">
                     <a class="navbar-brand" href="index.html">
                        <!-- <img src="frontend/assets/images/logo/logo.png" alt="navigation-logo" class="img-fluid"> -->
                        <h2 class="m-0 font-weight-bold">
                           <span>Sewa</span>
                        </h2>
                     </a>
                  </div>
               </div>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body d-flex justify-content-between h-100 px-4">
               <ul class="navbar-nav w-100">
                  <li class="nav-item">
                     <a class="nav-link active" href="index.html">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast" aria-hidden="true"></i></span>
                        Home</a>
                  </li>
                  <li class="nav-item d-flex align-items-center">
                     <a class="nav-link add-on" data-toggle="modal" data-target="#nav-cart">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast" aria-hidden="true"></i></span>My Cart
                        <span class="mx-2"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                        <sup class="cart-items text-white">2</sup>
                     </a>
                  </li>
                  <li class="nav-item d-flex align-items-center">
                     <a class="nav-link add-on" data-toggle="modal" data-target="#nav-cart">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast" aria-hidden="true"></i></span>Track
                        Your Order
                        <span class="mx-2"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        <sup class="cart-items text-white">2</sup>
                     </a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast"
                              aria-hidden="true"></i></span>Products<span class="ml-1">
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <div class="container d-block">
                           <div class="row">
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          29</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          27</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          39</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          2</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          3</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                           </div>
                        </div>
                        <!--  /.container  -->
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast"
                              aria-hidden="true"></i></span>Category<span class="ml-1">
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <div class="container d-block">
                           <div class="row">
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          29</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          27</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          39</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          2</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          3</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                           </div>
                        </div>
                        <!--  /.container  -->
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast" aria-hidden="true"></i></span>
                        Recipes<span class="ml-1">
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <div class="container d-block">
                           <div class="row">
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          29</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          27</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          39</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          2</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          3</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                              <div class="col-md-12">
                                 <ul class="nav flex-column">
                                    <li class="nav-item">
                                       <a class="nav-link head font-weight-bold" href="under-construction.html">Heading
                                          4</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 1</a>
                                    </li>
                                    <li class="nav-item p-0">
                                       <a class="nav-link" href="under-construction.html">Item 2</a>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.col-md-12  -->
                           </div>
                        </div>
                        <!--  /.container  -->
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact-us.html">
                        <span class="nav-indication mr-2"><i class="fa fa-eercast" aria-hidden="true"></i></span>
                        Contact Us</a>
                  </li>
               </ul>
            </div>
            <div class="modal-footer py-3">
               <a class="w-50 text-center" href="under-construction.html">
                  <span class="mr-2"><i class="fa fa-sign-in" aria-hidden="true"></i></span>Login</a>
               <a class="w-50 text-center" href="under-construction.html">
                  <span class="mr-2"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>Register</a>
            </div>
         </div>
      </div>
   </div>
   <!-- Mobile Nav -->
   <!-- Mobile Profile Nav Pop Up -->
   <div class="modal fade" id="profilemobilenav" tabindex="-1" role="dialog" aria-labelledby="profilemobilenavtitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content h-100 border-0">
            <!-- <div class="modal-header">
                  <h5 class="modal-title" id="profilemobilenavtitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div> -->
            <div class="modal-body d-flex align-items-center justify-content-around h-100 w-100 p-0">
               <div class="dashboard-list2 px-2 py-0">
                  <div class="d-user-avater text-center mb-4">
                     <img src="frontend/assets/images/product-images/1.jpg" class="img-fluid avater"
                        alt="profile-image" />
                     <h5>Adam Harshvardhan</h5>
                     <a href="">
                        <span class="mr-1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        Upload Image</a>
                  </div>
                  <ul class="sidebar">
                     <li class="active mb-3 p-2">
                        <a href="dashboard-profile.html"><span class="mr-2"><i class="fa fa-user"
                                 aria-hidden="true"></i></span>Profile</a>
                     </li>
                     <li class="mb-3 p-2">
                        <a href="dashboard-order-status.html"><span class="mr-2"><i class="fa fa-sort"
                                 aria-hidden="true"></i></span>Order Status</a>
                     </li>
                     <li class="mb-3 p-2">
                        <a href="dashboard-cart.html"><span class="mr-2"><i class="fa fa-shopping-bag"
                                 aria-hidden="true"></i></span>My Cart</a>
                     </li>
                     <li class="mb-3 p-2">
                        <a href="dashboard-Track Your Order.html"><span class="mr-2"><i class="fa fa-shopping-bag"
                                 aria-hidden="true"></i></span>Track Your Order</a>
                     </li>
                     <li class="mb-3 p-2">
                        <a href="dashboard-change-password.html"><span class="mr-2"><i class="fa fa-lock"
                                 aria-hidden="true"></i></span>Change Password</a>
                     </li>
                     <li class="mb-3 p-2">
                        <a href="index.html"><span class="mr-2"><i class="fa fa-sign-out"
                                 aria-hidden="true"></i></span>Logout</a>
                     </li>
                  </ul>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- Mobile Profile Nav Pop Up Ends -->
</body>

</html>