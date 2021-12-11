

<div class="col-lg-4 col-md-6">
    <div class="latest-product__text">
        <h4>Top Rated Products</h4>
        <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-810px, 0px, 0px); transition: all 1.2s ease 0s; width: 2432px;">
            @for ($i = 0, $k=0; $i < count($toprated_products)/3; $i++)
                <div class="owl-item" style="width: 405.31px;">
                <div class="latest-prdouct__slider__item">
                    @for ($j = 0; $j <3; $j++,$k++)
                        @if(count($toprated_products)<=$k)
                            @break
                        @endif
                        <a href='{{url("product/".$toprated_products[$k]->slug)}}' class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img src="{{asset($toprated_products[$k]->featured_image)}}" alt="" >
                            </div>
                            <div class="latest-product__item__text">
                                <h6>{{$toprated_products[$k]->name}}</h6>
                                <span>{{product_settings()->currency}}&nbsp;{{$toprated_products[$k]->unit_price}}</span>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
            @endfor
            </div>
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div><div class="owl-dots disabled">
                </div>
            </div>
        </div>
    </div>
</div>
