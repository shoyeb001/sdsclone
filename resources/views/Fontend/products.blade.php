@extends('Fontend.main')
@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="bread-container">
            <a href="/">Home</a> <i class="fas fa-chevron-right"></i> <a href="{{ route('productsPage') }}">Products</a>
        </div>
        <h1>All Products</h1>
        <span id="ShowMe"><i class="fas fa-sliders-h"></i> Filter</span>
    </section>


    <!-- filter -->
    <section class="filter show_filter" id="filterid">
        <div id="mNavSec" class="mNavSec tac" style="display: block; overflow-y: scroll;">
            <div class="pa menu1" onclick="_gaq.push(['b._trackEvent','Top','Menubutton','mobile']);menutoggle();">
                <svg class=" dib menu ">
                    <use xlink:href="#menu" fill="#fff"></use>
                </svg>
            </div>
            <div class="pu-cls"><span class="pu-cls1 mClsPop db" onclick="menutoggle();">X</span></div>
            <div class="mNavCname"><a class="tdn clr1 dib" href=""><img alt="Company Name"
                        src="./assects/logo/SDS-Logo.png"
                        data-img="https://5.imimg.com/data5/SELLER/Logo/2021/4/QW/LK/JA/9798292/msi-for-dp-120x120.png"
                        onclick="_gaq.push(['b._trackEvent','Body','Companylogo-menu','mobile']);"></a>
                <p class="db"></p><a href="" class=" tdn clr1 db"><span
                        onclick="_gaq.push(['b._trackEvent','Body','Companyname-menu','mobile']);">VK
                        STEEL</span></a>
            </div>
            <ul class="mNav">
                <i id="closebutton" class="fas fa-times cross-sign"></i>

                <li><a href="">Our Products</a><span class="mOnSub mPlusIcon" id="p_arw"
                        onclick="hidemenu('prd_menu','p_arw');"></span>
                    <div id="prd_menu" class="mScrollBox" style="display: block; max-height: 314px;">
                        <ul class="mSubNav mAct">
                            @foreach ($allCategory as $Category)
                                <?php
                                $menu_name = 'menu' . $loop->index ;
                                ?>
                                {{-- @dd($menu_name) --}}
                                <li><a href="">{{ $Category->name }}</a><span class="mPlusIcon "
                                        onclick="toggleVisibility('<?php echo $menu_name; ?>')"></span>
                                    <ul id="{{ 'menu' . $loop->index }}" class="nmenu"
                                        onclick="menutoggle();">
                                        @foreach ($productData as $product)
                                            @if ($product->product_category == $Category->name)
                                                <li>
                                                    <a href="{{ route('productsDetails', ['id' => $product->id]) }}">{{ $product->product_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                {{--  <li><a href="https://paywith.indiamart.com/"
                        onclick="_gaq.push(['b._trackEvent','Top','paywithim','mobile']);">Pay
                        with
                        Indiamart</a></li>  --}}
            </ul>
        </div>
    </section>

    <!-- peoduct section -->
    <section class="product">
        <div class="product-container">
            @foreach ($productData as $product)
                <div class="single-product">
                    <a href="{{ route('productsDetails', ['id' => $product->id]) }}">
                        <h2>{{ $product->product_name }}</h2>
                        <p>Brands Stainless steel PVD Ti color corted profiles</p>
                        <?php
                        $img = json_decode($product->gallery);
                        $pic = asset('/uploads/' . $img[0]);
                        ?>
                        <img src="{{ $pic }}" alt="" style="width: 150px;height: 100px">
                    </a>
                    <div class="social">
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fab fa-whatsapp-square"></i><span>Inquiry</span>
                            </a>
                        </div>
                        <div><a href="tel:+91%209892080847">
                            <i class="fas fa-phone-square-alt"></i><span>Call</span>
                            </a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
<script>
    let showme = document.getElementById("ShowMe");
    let addClassNow = document.querySelector("#mNavSec");
    const fil = document.querySelector("#closebutton");

    let count = true;
    showme.addEventListener('click', () => {
        addClassNow.classList.toggle("classHide");
        val = addClassNow.classList.contains('classHide');
        // if (val) {
        //     $(document).ready(function () {
        //         console.log("This is added now");
        //         $(document).on('click', function (divclose) {
        //             if ($(divclose.target).closest("#filterid").length == 0) {
        //                 $("#filterid").hide();
        //             }
        //         })
        //     })
        // }
    })
    fil.addEventListener('click', () => {
        addClassNow.classList.remove("classHide");
    })



        // $(document).ready(function () {
        //     console.log("This is added now");
        //     $(document).on('click', function (divclose) {
        //         if ($(divclose.target).closest("#filterid").length == 0) {
        //             $("#filterid").hide();
        //         }
        //     })
        // })
</script>
