<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{asset($product->featured_image)}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-637px, 0px, 0px); transition: all 1.2s ease 0s; width: 1276px;">
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
                                <div class="owl-item" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
                                <div class="owl-item" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
                                <div class="owl-item active" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
                                <div class="owl-item active" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
                                <div class="owl-item cloned active" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt=""></div>
                                <div class="owl-item cloned active" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt=""></div>
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt=""></div>
                                <div class="owl-item cloned" style="width: 86.328px; margin-right: 20px;"><img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price p-0">TK.&nbsp;{{$product->unit_price}}</div>
                    @auth
                    <div class="btn-group">
                        <button type="button"  @if(hasCart($product->id)) disabled @endif class="btn btn-success" wire:click="productDecrement()">
                          <i class="fa fa-minus"></i>
                        </button>
                        <span class="btn btn-success">
                            {{$count}}
                        </span>
                        <button type="button" @if(hasCart($product->id)) disabled @endif class="btn btn-success" wire:click="productIncrement()">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                        @if(hasCart($product->id))
                        <button wire:click.debounce.250ms="removeCart()" class=" btn btn-primary mx-2">{{_("REMOVE FROM CART")}}</button>
                        @else
                        <button wire:click.debounce.250ms="addToCart()" class=" btn btn-primary mx-2">{{_("ADD TO CART")}}</button>
                        @endif
                    @else
                    <a href="{{route("login")}}"><span class="badge badge-success p-3">Login to add to cart this product</span></a>
                    @endauth
                    <ul>
                        <li><b>Availability</b> <span>{{$product->available}}</span></li>
                        <li><b>Shipping cost</b> <span>  @if($product->shipping_cost>0){{$product->shipping_cost}} TK.@else Free @endif</span></li>
                        <li><b>Brand</b> <span>{{$product->brand->name}}</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="true">Reviews <span>({{$total_comments}})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Description</h6>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6 class="text-center">Products Infomation</h6>
                                    <div class="row text-center">
                                        <div class="col-md-4 mb-3">
                                            <ul class="product-info-list">
                                                <li><b>Name:</b><span>{{$product->name}}</span></li>
                                                <li><b>Category:</b><span>{{$product->category->name}}</span></li>
                                                <li><b>Brand:</b><span>{{$product->brand->name}}</span></li>
                                                <li><b>Seller:</b><span>{{$product->seller->name}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <ul class="product-info-list">
                                                <li><b>Unit Price:</b><span>{{product_settings()->currency}}&nbsp;{{$product->unit_price}}</span></li>
                                                <li><b>Discount:</b><span>{{$product->discount}}%</span></li>
                                                <li><b>Tax:</b><span>{{$product->tax}}%</span></li>
                                                <li><b>Shipping Cost:</b><span>{{product_settings()->currency}}&nbsp;{{$product->shipping_cost}}</span></li>
                                                <hr>
                                                <li style="color:#9b0339;"><b>Net Price:</b><span>{{netPrice($product)}}TK.</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <ul class="product-info-list">
                                                @foreach($product->attributeProducts as $property)
                                                    <li class="text-capitalize"><b>{{$property->key}}:</b><span>{{$property->value}}</span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                @livewire('frontend.components.single-product.comment-system', ['product' => $product], key($product->id))
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>