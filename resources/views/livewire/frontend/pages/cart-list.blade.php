<div>
    <section class="breadcrumb-section" style="background:#9b0339;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Your Shopping Carts</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @auth
                    <div class="shoping__cart__table table-responsive">
                        <table class="table table-hover text-left">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                @livewire('frontend.components.carts.single-cart', ['cart' => $cart], key($cart->id))
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <a href="{{route('login')}}" class="btn btn-primary m-3">Login to see your products in cart.</a>
                    <div>--- OR ---</div>
                    <a href="{{route('register')}}" class="btn btn-primary m-3">Create an account</a>
                    @endif
                </div>
            </div>
            @auth
            <div class="row">
                <div class="col-8 mb-2">
                    <a href="{{url('/shop')}}" class="btn btn-primary">CONTINUE SHOPPING</a>
                </div>
                <div class="col-md-4">
                    @if($msg)
                    <div class="alert @if($coupon) alert-success @else alert-warning @endif alert-dismissible fade show" role="alert">
                        {{$msg}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Coupon code" wire:model.lazy="code">
                            @error("code") <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success" wire:click.debounce.250ms="applyCoupon()">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{product_settings()->currency}}&nbsp;@if($coupon){{cartTotal($carts,$coupon->discount)}}@else {{cartTotal($carts)}} @endif </span></li>

                            <li>Shipping Cost <span>{{product_settings()->currency}}&nbsp;{{product_settings()->default_shipping_cost}}</span></li>
                            @if($coupon)
                            <li>Total <span>{{product_settings()->currency}}&nbsp;{{cartTotal($carts,$coupon->discount)+product_settings()->default_shipping_cost}}</span></li>
                            @else
                            <li>Total <span>{{product_settings()->currency}}&nbsp;{{cartTotal($carts)+product_settings()->default_shipping_cost}}</span></li>
                            @endif

                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </section>
</div>
