<section class="breadcrumb-section set-bg" data-setbg="{{asset($product->category->image)}}">
    <style>
        .breadcrumb-section{
            background-image: url('{{asset($product->category->image)}}');
            background-color:rgba(10, 10, 10, 0.842);
            background-blend-mode:multiply;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h3 style="color:#fff;">{{$product->name}}</h3>
                    <h5 style="color:#fff;padding:20px;">Category:&nbsp;{{$product->category->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</section>