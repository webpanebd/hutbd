<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset($product->featured_image)}}" alt="product image" class="img img-fluid">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Product Properties</h1>
                </div>
                <div class="card-body">
                    @foreach($product->attributeProducts as $prop)
                    <div class="row">
                        <label for="" class="col-4 text-capitalize">{{$prop->key}}:</label>
                        <div class="col-8">{{$prop->value}}</div>
                    </div>
                    @endforeach
                    <div class="row mt-3">
                        <div class="col-12">
                            <a href='{{url("/product/add-properties/$product->id")}}' class="btn btn-success">Add Product Property</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Product Details</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label for="" class="col-4">Product Name:</label>
                        <div class="col-8">{{$product->name}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Category:</label>
                        <div class="col-8">{{$product->category->name}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Sub-Category:</label>
                        <div class="col-8">{{$product->subcategory->name}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Brand:</label>
                        <div class="col-8">{{$product->brand->name}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Unit Price:</label>
                        <div class="col-8">{{$product->unit_price}} TK.</div>
                    </div>
                     <div class="row">
                        <label for="" class="col-4">Discount:</label>
                        <div class="col-8">{{$product->discount}}%</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Tax:</label>
                        <div class="col-8">{{$product->tax}}%</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Shipping Cost:</label>
                        <div class="col-8">{{$product->shipping_cost}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Review Status:</label>
                        <div class="col-8">@if($product->hasReview) ON @else OFF @endif</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Active status:</label>
                        <div class="col-8">@if($product->hasReview) Active @else Inactive @endif</div>
                    </div>
                     <div class="row">
                        <label for="" class="col-4">Created By:</label>
                        <div class="col-8">{{$product->seller->name}}&nbsp;({{$product->seller->getRoleNames()[0]}})</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Created At:</label>
                        <div class="col-8">{{date('d M, Y | H:iA',strtotime($product->created_at))}}</div>
                    </div>
                    <div class="row">
                        <label for="" class="col-4">Updated At:</label>
                        <div class="col-8">{{date('d M, Y | H:iA',strtotime($product->updated_at))}}</div>
                    </div>
                    <div class="row mt-3">
                       <div class="col-12">
                            <a href='{{url("/product/edit/$product->id")}}' class="btn btn-success">Edit Product</a>
                       </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
