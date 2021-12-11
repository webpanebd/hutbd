
<div>
<section class="breadcrumb-section set-bg" data-setbg="{{asset($category->image)}}">
    <style>
        .breadcrumb-section{
            background-image: url('{{asset($category->image)}}');
            background-color:rgba(10, 10, 10, 0.842);
            background-blend-mode:multiply;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h3 style="color:#fff;">Category:&nbsp;{{$category->name}}</h3>
                    <h5 style="color:#fff;padding:20px;">{{count($category->products)}}&nbsp;products found</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row m-5">


    @foreach($products  as $product)
        @livewire('frontend.components.product-cart', ['product' => $product], key($product->id))
    @endforeach
    <div class="col-md-12"> 
        {{$products->links()}}
    </div>

</div>
</div>
