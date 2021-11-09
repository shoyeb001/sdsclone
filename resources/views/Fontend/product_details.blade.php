@extends('Fontend.main')
@section('content')

    <!-- Single Product Details Section -->
    <section class="product_details">
        <div class="card-wrapper padding-wrapper">
            <div class="slider_cards">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <?php
                            $content = '';
                            $img = json_decode($singleProductData->gallery);
                            {{--  dd(count($img));  --}}
                            foreach ($img as $photo) {
                                $pic = asset('/uploads/' . $photo);
                                $content .= '<img src="' . $pic . '" alt="image">';
                            }
                            ?>
                            {!!$content!!};
                            {{-- {!! $content !!} --}}
                          
                        </div>
                    </div>
                    <div class="img-select">
                        {{--  <?php
                            $content = '';
                            $img = json_decode($singleProductData->gallery);
                            foreach ($img as $key=>$photo) {
                                $index = $key + 1;
                                $pic = asset('/uploads/' . $photo);
                                $content .= '<div class="img-item"><a href="#" data-id="'.$index.'"><img src="' . $pic . '" alt="image"></a></div>';
                            }
                            ?>
                        
                        {!! $content !!}  --}}
                        {!!$content!!}
                        
                    </div>
                </div>
                <!-- card right -->
                <div class="product_content">
                    <h1>{{ $singleProductData->product_name }}</h1>
               <div class="product-price">
                        <p class="new-price">Price: <span>RS {{$singleProductData->price}}</span></p>
                    </div> 
                    <div class="product-detail">
                        <h2>About this item: </h2>
                        {{$singleProductData->description}}
                        <ul>
                            @php 
                            $shape = App\Models\Shape::where("id",$singleProductData->type)->get();
                            @endphp 
                            <li><i class="fas fa-thumbtack"></i>Shape: <span>{{$shape[0]->name}}</span></li>
                            {{--  <li><i class="fas fa-thumbtack"></i>Shipping Fee: <span>Free</span></li>  --}}
                        </ul>
                    </div>
                    <div class="price">
                        <div>
                            <i class="fab fa-whatsapp"></i> <span></span>Inquiry</span>
                        </div>
                        <div>
                            <i class="fas fa-phone-alt"></i> <span></span>Call</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Products -->
    <!-- peoduct section -->
    <section class="product">
        <div class="product-container">
            @foreach ($relatedProduct as $RProduct)
                <div class="single-product">
                    <a href="{{ route('productsDetails', ['id' => $RProduct->id]) }}">
                        <h2>{{ $RProduct->product_name }}</h2>
                        <p>Brands Stainless steel PVD Ti color corted profiles</p>
                        <?php
                        $img = json_decode($RProduct->gallery);
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
                        <div><i class="fas fa-phone-square-alt"></i><span>Call</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
