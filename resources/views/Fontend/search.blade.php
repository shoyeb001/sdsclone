@extends('Fontend.main')
@section('content')

<script>
    function filterproduct(a) {
        $(".single-product").hide();
        $("."+a).show();
        $(".filter-color").css("background","none");
       document.getElementById(a).style.backgroundColor = "#04AA6D";
    }
</script>

    <!-- header section - slider -->

    <!-- filter-section -->
    <section class="filter-section">
        <div class="filter">
            @php
                $cats = App\Models\Categories::latest()->take(3)->get();
            @endphp
            @foreach($cats as $category)
            <div>
                <h2 class="filter-color" id="{{strtolower(str_replace(' ', '-',$category->id))}}"  onclick="filterproduct('{{strtolower(str_replace(' ', '-',$category->id))}}')">{{$category->name}}</h2>
            </div>
            @endforeach
           
        </div>
    </section>
    <!-- peoduct section -->
    <section class="product">
        <div class="product-container">
            @foreach ($searchData as $product)
                <div class="single-product {{strtolower(str_replace(' ', '-',$product->product_category))}}">
                    <a href="{{ route('productsDetails', ['id' => $product->id]) }}">
                        <h2>{{ $product->product_name }}</h2>
                        @php 
                        $shape = App\Models\Shape::where("id",$product->type)->get();
                        @endphp 
                        <p><b>Shape:</b> {{$shape[0]->name}}</p>
                        <p>Brands Stainless steel PVD Ti color corted profiles</p>
                        <?php
                        $img = json_decode($product->gallery);
                        $pic = asset('/uploads/' . $img[0]);
                        ?>
                        <img src="{{ $pic }}" alt="" style="width: 150px;height: 100px">
                    </a>
                    <div class="social">
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$product->id}}">
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



