<div>
   @livewire('frontend.components.categories')
   @livewire('frontend.components.featured-products')
    <div class="banner">
        <div class="banner">
        <div class="container">
            <div class="row">
                @if(showAd(3))
                <div class="col-lg-6 col-md-6 col-sm-6 set-bg hero__item" data-setbg="{{asset(showAd(3)->image)}}" style="background-color:#0a0a0ab9;background-blend-mode:multiply;">
                    <div class="hero__text text-center mx-auto text-white">
                        @if(showAd(3))
                        <h3 class="text-white">{{showAd(3)->bold_text}}</h3>
                        <p>{{showAd(3)->light_text}}</p>
                        <a href="{{showAd(3)->link}}" class="primary-btn">SHOP NOW</a>
                        @endif
                    </div>
                </div>
                @endif
                @if(showAd(4))
                <div class="col-lg-6 col-md-6 col-sm-6 set-bg hero__item" data-setbg="{{asset(showAd(4)->image)}}" style="background-color:hsla(0, 0%, 4%, 0.787);background-blend-mode:multiply;">
                    <div class="hero__text text-center mx-auto text-white">
                        @if(showAd(4))
                        <h3>{{showAd(4)->bold_text}}</h3>
                        <p>{{showAd(4)->light_text}}</p>
                        <a href="{{showAd(4)->link}}" class="primary-btn">SHOP NOW</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    @livewire('frontend.components.latest-products')
                </div>
                @livewire('frontend.components.toprated-products')
                @livewire('frontend.components.review-products')
            </div>
        </div>
    </section>

</div>


