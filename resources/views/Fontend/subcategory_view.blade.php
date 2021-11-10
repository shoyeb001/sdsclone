@extends('Fontend.main')
@section('content')
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
                    <div><a href="tel:+91%209892080847">
                        <i class="fas fa-phone-square-alt"></i><span>Call</span>
                        </a></div>
                </div>
            </div>
           
        @endforeach
    </div>
</section>
@endsection
