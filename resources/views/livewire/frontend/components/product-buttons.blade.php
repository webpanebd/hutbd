<ul class="product__item__pic__hover featured__item__pic__hover">
    <li>@livewire('frontend.components.wish-button',["product"=>$product],key($product->id))</li>
    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
    <li>
        @if(!hasCart($product->id))
           
            <a href="#"  wire:click.prevent="addToCart()">
                <i class="fa fa-shopping-cart"></i>
            </a>  
           
        @else
            <a href="{{url("product/$product->slug")}}">
                <i class="fa fa-shopping-cart"></i>
            </a> 
        @endif
    </li>
</ul>