<tr>
    <td>
        <img src="{{$cart->product->featured_image}}" alt="" style="width:120px;">
        <h5>{{$cart->product->name}}</h5>
    </td>
    <td>
        {{product_settings()->currency}}&nbsp; {{netPrice($cart->product)}}
    </td>
    <td> 
        <div class="btn-group">
            <button type="button"  class="btn btn-success" wire:click="productDecrement()">
            <i class="fa fa-minus"></i>
            </button>
            <span class="btn btn-success">
                {{$count}}
            </span>
            <button type="button"  class="btn btn-success" wire:click="productIncrement()">
            <i class="fa fa-plus"></i>
            </button>
        </div>
    </td>
    <td>
       {{product_settings()->currency}}&nbsp;{{netPrice($cart->product)*$count}}
    </td>
    <td class="shoping__cart__item__close">
        <span class="icon_close" wire:click.debounce.200ms="removeCart()" ></span>
    </td>
</tr>