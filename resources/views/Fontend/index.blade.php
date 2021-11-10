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
    <header>
        <div class="slider">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $count = count($sliderData);
                    ?>
                    @for ($i = 0; $i <= $count; $i++)
                        @if ($i == 0)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                                aria-label=""></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $i }}" aria-label=""></button>
                        @endif
                    @endfor
                </div>
                <div class="carousel-inner">
                    @foreach ($sliderData as $slider)
                        <?php
                        $img = json_decode($slider->gallery);
                        $pic = asset('/uploads/' . $img[0]);
                        ?>
                        @if ($sliderData[0] == $slider)
                            <div class="carousel-item active">
                                <img src="{{ $pic }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>{{ $slider->name }}</h4>
                                    {{-- <p>QUALITY is never an accident for us. It is result of INTELLIGENT EFFORT we
                                        put in.</p> --}}
                                </div>
                            </div>
                        @endif
                        <div class="carousel-item">
                            <img src="{{ $pic }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h4>{{ $slider->name }}</h4>
                                {{-- <p>QUALITY is never an accident for us. It is result of INTELLIGENT EFFORT we
                                    put in.</p> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </header>
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
            @foreach ($productData as $product)
                <div class="single-product {{strtolower(str_replace(' ', '-',$product->product_category))}}">
                    <a href="{{ route('productsDetails', ['id' => $product->id]) }}">
                        <h2>{{ $product->product_name }}</h2>
                        @php 
                        $shape = App\Models\Shape::where("id",$product->type)->get();
                        @endphp 
                        <p><b>Shape:</b> {{$shape[0]->name}}</p>
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
                        <div>
                            <a href="tel:+91%209892080847">
                            <i class="fas fa-phone-square-alt"></i><span>Call</span>
                            </a>
                        </div>
                    </div>
                </div>
               
            @endforeach
        </div>
    </section>
@endsection



