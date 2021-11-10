<!-- desktop navigation bar  -->
<nav>
    <section class="top">
        <!-- <div class="img">
                            <img src="./assects/logo/SDS-Logo.png" alt="logo">
                        </div> -->
        <div class="searchbar">
            <!-- <i id="ham-burger" class="fas fa-bars"></i> -->
            <form action="{{route("product.search")}}" type="GET">
            <input type="text" name="search" placeholder="Search for Products...">
            <input type="submit" value="Search">
            </form>
        </div>
        <div class="button">
            <a class="btn" href="tel:+91 9892080847"><i class="fas fa-phone-square-alt"></i>+91
                9892080847</a>
            <a href="tel:+91 9987177207"><i class="fas fa-phone-square-alt"></i>+91 9987177207</a>
        </div>
    </section>
    <section class="bottom">
        <div class="nav-links-two">
            <ul>
                <li><a class="nav-hover" href="{{ route('homePage') }}">Home</a></li>
                <li><a href="{{ route('productsPage') }}">Products</a>
                    <div class="sub-menu-l">
                        <ul>
                            @php 
                            $cat = App\Models\Categories::get();
                            @endphp
                            @foreach ($cat as $category)
                            <li class="hover-me"><a href="#">{{$category->name}} <i class="fas fa-chevron-right"></i></a>
                                <div class="sub-menu-2">
                                    <ul>
                                        @php 
                                        $shape = App\Models\Shape::get();
                                        @endphp
                                        @foreach ($shape as $item)
                                        <li><a href="{{url("category/sub/$category->id/$item->id")}}">{{$item->name}}</a></li>
                                        @endforeach
                                     </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li><a href="{{ route('galleryPage') }}">Gallery</a></li>
                <li><a href="{{ route('aboutPage') }}">About Us</a></li>
                <li><a href="{{ route('contactPage') }}">Contact Us</a></li>
            </ul>
        </div>
    </section>
</nav>
