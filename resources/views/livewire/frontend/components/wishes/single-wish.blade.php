<tr>
    <td>
        <img src="{{$wish->product->featured_image}}" alt="" style="width:120px;">
    </td>
    <td><h5>{{$wish->product->name}}</h5></td>
    <td>
        TK. &nbsp; {{netPrice($wish->product)}}
    </td>
    <td> 
        <a href="{{url('/product/'.$wish->product->slug)}}" class="btn btn-primary btn-sm">ADD TO CART</a>
    </td>
    <td class="shoping__cart__item__close text-left">
        <span class="icon_close" wire:click.debounce.200ms="removeWish()" ></span>
    </td>
</tr>