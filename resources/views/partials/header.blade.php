<header class="default-header">
            <div class="menutop-wrap">
                <div class="menu-top container">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="list">
                            <li><a href="tel:+2348165519459">+234 816 651 9459</a></li>
                            <li><a href="mailto:support@brytahub.com">support@btytahub.com</a></li>                             
                        </ul>
                        <ul class="list">
                            @auth
                            <li><a href="{{url('account')}}">{{auth()->user()->name}}</a></li>
                            <li><a href="{{url('logout')}}">Logout</a></li>
                            @if(auth()->user()->isAdmin())
                            <li><a href="{{url('categories/create')}}">New Category</a></li>
                            <li><a href="{{url('products/create')}}">New Product</a></li>
                            @endif
 
                            @else
                            <li><a href="{{url('login')}}">login</a></li>
                            <li><a href="{{url('register')}}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>                   
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                      <a class="navbar-brand" href="{{url('')}}">
                        <img src="{{url('img/logo.png')}}" alt="">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a href="{{url('')}}">Home</a></li>
                            @foreach($categories as $category)
                            <li><a href="{{url('category/'.$category->url)}}">{{$category->name}}</a></li>
                            @endforeach
                            <li><a href="{{url('about')}}">About us</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
                            <li>
                                <a href="{{url('cart')}}">
                                    Cart
                                <span id="cart_count"></span>
                            </a>
                          </li>
                            <li><a href="{{url('checkout')}}">Checkout</a></li>
                                <!-- Dropdown -->
                                                                   
                        </ul>
                      </div>                        
                </div>
            </nav>
        </header>