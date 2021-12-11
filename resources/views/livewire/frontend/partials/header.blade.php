 <header class="header" >
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> {{site()->email}}</li>
                                @if(showAd(1))
                                <li>{{showAd(1)->bold_text}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                @foreach(social_icons() as $icon)
                                <a href="{{$icon->link}}"><i class="fa fa-{{$icon->icon}}"></i></a>
                                @endforeach
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{asset('frontend/img')}}/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Bengali</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{asset(site()->logo)}}" alt="" style="max-width:150px;"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-heart"></i> <span>@auth {{count($wishes)}} @else 0 @endif</span></a></li>
                            <li><a href="{{url('/cartlist')}}"><i class="fa fa-shopping-bag"></i> <span>@auth{{count($carts)}}@else 0 @endif</span></a></li>
                        </ul>
                        @auth <div class="header__cart__price">Item: <span>{{product_settings()->currency}}&nbsp;{{cartTotal($carts)}}</span></div> @endauth
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>