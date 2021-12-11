<div>
<div class="row">
    @foreach ($products as $product)
  
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item" wire:click="gotoSingle({{$product->id}})">
            <div class="product__item__pic set-bg" data-setbg="{{asset($product->featured_image)}}" style="background-image: url({{asset($product->featured_image)}});">
                @if($product->discount>0)
                <span style="color:#f1f1f7;background-color:#9b0339;padding:10px 10px;border-radius:100px;margin:20px;display:inline-block;">-{{$product->discount}}%</span>
                @endif
                @livewire('frontend.components.product-buttons', ['product' => $product], key($product->id))
            </div>
            <div class="product__item__text">
                <h6><a href="{{url("product/$product->slug")}}">{{$product->name}}</a></h6>
                <h5>{{product_settings()->currency}}&nbsp;{{$product->unit_price}}</h5>
            </div>
        </div>
    </div>

    @endforeach
</div>

@if($limit < $total_products)
<button class="btn btn-success" wire:click="more()">Load More</button>
@endif
@if($limit>12)
<button class="btn btn-success" wire:click="less()">Load Less</button>
@endif
</div>

