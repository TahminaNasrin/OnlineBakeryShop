
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">Online Bakery shop</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="{{route('frontend.home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('about.us')}}" class="nav-item nav-link active">About</a>
                @auth
                <a href="{{route('wishlist.view',auth()->user()->id)}}" class="nav-item nav-link active">Wishlist</a>
                @endauth

                <a href="{{route('product.all')}}" class="nav-item nav-link active">Products</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu m-0">
                        @foreach ($headerCategories as $category)
                        <a href="{{route('products.under.category',$category->name)}}" class="dropdown-item">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link active">Contact</a>
            </div>
            <div class=" d-none d-lg-flex">
                <!-- <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle">
                    <i class="fa fa-phone text-primary"></i>
                </div>
                <div class="ps-3">
                    <small class="text-primary mb-0">Call Us</small>
                    <p class="text-light fs-5 mb-0">+012 345 6789</p>
                </div> -->


                <div>
                    <a class="btn-lg-square text-primary pe-0" href="{{route('cart.view')}}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">

                            @if(session()->has('vcart'))
                            {{ count(session()->get('vcart')) }}
                            @else
                            0
                            @endif

                        </span>
                        <span style="padding: 35px;">    </span>
                    </a>
                    
                </div>



                @guest
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-lg-square text-primary border-end rounded-0" href="{{route('customer.login')}}">Login </a>
                    <span style="padding: 5px;"> | </span>
                    <a class="btn-lg-square text-primary pe-0" href="{{route('customer.registration')}}" style="margin-left:5px ;"> Registration </a>
                </div>
                @endguest


                @auth
                <div class="ps-3">
                    <a class="btn-lg-square text-primary pe-0" href="{{route('customer.logout')}}" style="margin-left:5px ;"> Logout </a>
                    <a class="btn-lg-square text-primary pe-0" href="{{route('profile.view')}}" style="margin-left:5px ;"> ({{auth()->user()->name}}) </a>
                </div>
                @endauth
                
            </div>

        </div>

    </nav>
</nav>
@yield('content')