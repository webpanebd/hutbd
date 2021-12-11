<div class="product__discount">
    <div class="section-title product__discount__title">
        <h2>Sale Off</h2>
    </div>
    <div class="row">
        <div class="product__discount__slider owl-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(-1741px, 0px, 0px); transition: all 1.2s ease 0s; width: 5224px;">
                    @for ($i = 0, $k=0; $i < count($discounted_products); $i++,$k++)
                    <div class="owl-item" style="width: 435.294px;">
                        <div class="col-lg-4">
                            <div class="product__discount__item" wire:click="gotoSingle({{$discounted_products[$k]->id}})">
                                <div class="product__discount__item__pic set-bg" data-setbg="{{asset($discounted_products[$k]->featured_image)}}" style="background-image: url(&quot;img/product/discount/pd-4.jpg&quot;);">
                                    <div class="product__discount__percent">-{{$discounted_products[$k]->discount}}%</div>
                                    @livewire('frontend.components.product-buttons', ['product' => $discounted_products[$k]], key($discounted_products[$k]->id))
                                </div>
                                <div class="product__discount__item__text">
                                    <span>{{$discounted_products[$k]->category->name}}</span>
                                    <h5><a href="#">{{$discounted_products[$k]->name}}</a></h5>
                                    {{-- Discount Price Calculation from percent --}}
                                    @php
                                        $discounted_price=$discounted_products[$k]->unit_price-($discounted_products[$k]->unit_price*$discounted_products[$k]->discount)/100;
                                    @endphp
                                    <div class="product__item__price">{{product_settings()->currency}}&nbsp;{{$discounted_price}}<span>{{product_settings()->currency}}&nbsp;{{$discounted_products[$k]->unit_price}}</span>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>