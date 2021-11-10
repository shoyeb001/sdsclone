<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesone cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Steel</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- JQuery for slider finger scroller -->
    <script src="{{ url('assets/fontend/scripts/sliderTouch.js') }}"></script>

    <!-- Slider cdn -->
    <link rel="dns-prefetch" href="https://tdw.imimg.com/">
    <link rel="dns-prefetch" href="https://3.imimg.com/">
    <link rel="dns-prefetch" href="https://4.imimg.com/">
    <link rel="dns-prefetch" href="https://5.imimg.com/">
    <link rel="dns-prefetch" href="https://img.youtube.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com/">
    <link href="https://tdw.imimg.com/template-tdw/d0060/d60style_14_min.css" rel="stylesheet">
    <script async="" src="https://tdw.imimg.com/template-tdw/d0060/common_13_min.js"></script>
    <script async="" src="https://tdw.imimg.com/template-tdw/d0060/popup_7_min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/gelarry.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/products.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/singleProducts.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/about.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontend/styles/contact.css') }}">

</head>

<body>
    <!-- Mobile navigation Bar -->
    <div class="main-wrapper-class">
        <div class="nav-background-class">
            <div class="mobile-logo">
                @php
                   $logo = App\Models\GeneralSetting::find(1)->get();
                @endphp
                <img src="{{asset("/uploads/generalSetting/".$logo[0]->company_logo)}}" alt="logo" />
                {{--  <img src="{{ generalSettings->company_logo }}" alt="logo" />  --}}
            </div>
            <div class="mobile-nav">
                <ul>
                    <li>
                        <a class="" href="{{ route('homePage') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('galleryPage') }}">Gallery</a>
                    </li>
                    <li>
                        <a href="{{ route('productsPage') }}">Products</a>
                    </li>
                    <li>
                        <a href="{{ route('aboutPage') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('contactPage') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="site-content-wrapper">
            <div class="nav-trigger-class">
                <div id="trigger_class" class="fas fa-bars"></div>
                <div class="img">
                    @php
                   $logo = App\Models\GeneralSetting::find(1)->get();
                @endphp
                <img src="{{asset("/uploads/generalSetting/".$logo[0]->company_logo)}}" alt="logo" />
                </div>
            </div>
            <div class="site-content-class">
                <!-- desktop navigation bar  -->

                @include('../Fontend/desktop_nav')

                <!-- Content Wrapper. Contains page content -->
                @yield('content')
                <!-- /.content-wrapper -->

                <!-- Footer -->
                @include('../Fontend/footer')
            </div>
        </div>
    </div>
    <!-- Modal -->
    @php 
     $product = App\Models\Products::all();
    @endphp
    @foreach ($product as $item)
        
    <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Inquiry Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-flex">
                    <a href="https://api.whatsapp.com/send?phone=919892080847&text=With Steel http://localhost:8000/product-details/{{$item->id}}" type="button" class="btn btn-success">With steel</a>
                    <a  href="https://api.whatsapp.com/send?phone=919892080847&text=Without Steel only labour work http://localhost:8000/product-details/{{$item->id}}" type="button"  class="btn btn-success">only labour work</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Nav Links   -->
    <script src="{{ url('assets/fontend/scripts/products.js') }}"></script>
    <script src="{{ url('assets/fontend/scripts/navBar.js') }}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</body>

</html>
