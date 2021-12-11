<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Edit Product</h1>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update()">
                        <div class="row form-group">
                            <label for="" class="col-md-4">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                                @error("name") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Category</label>
                            <div class="col-md-8">
                                <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">=== Select category ===</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error("category_id") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Subcategory</label>
                            <div class="col-md-8">
                                <select wire:model="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                    <option value="">=== Select subcategory ===</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                                @error("subcategory_id") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                         <div class="row form-group">
                            <label for="" class="col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <select wire:model="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                    <option value="">=== Select brand===</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error("brand_id") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Unit Price</label>
                            <div class="col-md-8">
                                <input type="number" wire:model="unit_price" class="form-control @error('unit_price') is-invalid @enderror">
                                @error("unit_price") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Tax(%)</label>
                            <div class="col-md-8">
                                <input type="number" wire:model="tax" class="form-control @error('tax') is-invalid @enderror">
                                @error("tax") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Discount(%)</label>
                            <div class="col-md-8">
                                <input type="number" wire:model="discount" class="form-control @error('discount') is-invalid @enderror">
                                @error("discount") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Shipping Cost</label>
                            <div class="col-md-8">
                                <input type="number" wire:model="shipping_cost" class="form-control @error('shipping_cost') is-invalid @enderror">
                                @error("shipping_cost") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Review Status</label>
                                <div class="col-md-8">
                                    <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="" wire:model="hasReview">
                                    <label for="customCheckbox2" class="custom-control-label">@if($hasReview) ON @else OFF @endif</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-4">Active Status</label>
                                <div class="col-md-8">
                                    <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" checked="" wire:model="isActive">
                                    <label for="customCheckbox1" class="custom-control-label">@if($isActive) Active @else Inactive @endif</label>
                                </div>
                            </div>
                        </div>
                         <div class="row form-group justify-content-start">
                            <label for="" class="col-md-4">Featured Image</label>
                            <div class="col-md-8">
                                <div class="card text-center">
                                    <div class="card-body">
                                        
                                        <img src="@if($image) {{$image->temporaryUrl()}} @else {{asset($featured_image)}} @endif" alt="featured image"  style="width:200px;">
                                       
                                    </div>
                                    <div class="card-footer">
                                        <input type="file" accept="image/png,image/jpeg,image/jpg,image/gif" id="featured_image" class="d-none" wire:model="image">
                                        <label class="btn btn-primary" for="featured_image"><i class="fas fa-upload">&nbsp;Upload</i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group justify-content-end">
                            <div class="col-md-8">
                                <button class="btn btn-success">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>