<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active mixitup-control-active" data-filter="*">All</li>
                            @foreach($categories as $category)
                            <li data-filter=".{{$category->name}}" class="text-capitalize">{{$category->name}}</li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="MixItUpF412B5" style="">
                @foreach($categories as $category)
                @foreach($category->products as $product)
               
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$category->name}}" style="display:block;">
                    
                    <div class="featured__item" wire:click="gotoSingle({{$product->id}})">
                        
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($product->featured_image)}}" style="background-image: url({{asset($product->featured_image)}});">
                            @livewire('frontend.components.product-buttons', ['product' => $product], key($product->id))
                        </div>
                        <div class="featured__item__text">
                            <h6><a href='{{url("/product/$product->slug")}}'>{{$product->name}}</a></h6>
                            <h5>{{product_settings()->currency}}&nbsp;{{$product->unit_price}}</h5>
                        </div>
                        
                    </div>
                    
                </div>
                
                @endforeach
                @endforeach
                


            </div>
        </div>
    </section>