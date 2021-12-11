<div>
    <section class="breadcrumb-section"  style="background:#9b0339;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Your Wishlist Products</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Wishlist</span>
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
                                    <th>Add to cart</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishes as $wish)
                                   @livewire('frontend.components.wishes.single-wish', ['wish' => $wish], key($wish->id))
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else 
                    <a href="{{route('login')}}"  class="btn btn-primary m-3">Login to see your products in wishlist.</a>
                            <div>--- OR ---</div>            
                    <a href="{{route('register')}}"  class="btn btn-primary m-3">Create an account</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-8 mb-2">
                    <a href="{{url('/shop')}}" class="btn btn-primary">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
    </section>
</div>
