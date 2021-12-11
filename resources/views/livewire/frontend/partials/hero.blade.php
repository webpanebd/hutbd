<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul style="display:{{request()->is('/')? 'block':'none'}}">
                            @foreach($categories as $category)
                            @if($category->slug!="uncategorized")
                            <li><a href='{{url("/category/$category->slug")}}'>{{$category->name}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{site()->phone}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    @if(request()->is("/"))
                    <div class="hero__item set-bg my-2" @if(showAd(2))data-setbg="{{asset(showAd(2)->image)}}"@endif style="background-color:#0a0a0ab9;background-blend-mode:multiply;">
                        <div class="hero__text">
                            @if(showAd(2))
                            <h2 class="text-white">{{showAd(2)->bold_text}}</h2>
                            <p>{{showAd(2)->light_text}}</p>
                            <a href="{{showAd(2)->link}}" class="primary-btn">SHOP NOW</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>