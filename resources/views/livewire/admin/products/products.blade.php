<div class="container">
<div class="row mb-4">
    <div class="col-md-4">
        <div>
            @can("create-product")
            <a class="btn btn-default" href="{{url('/add-new-product')}}">
                Add New Product&nbsp;<i class="fas fa-plus"></i>
            </a>
            @endcan

            @if(auth()->user()->hasAnyPermission(["create-product","edit-product","delete-product"]))
            <a href="{{url('/products/trash')}}" class="btn btn-default">
                View Trash&nbsp;<span class="badge badge-danger">{{$trashed_items}}</span>
            </a>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fixed Header Table</h3>

        <div class="card-tools">
            <div class="input-group mb-3">
                  <select class="form-control" wire:model="search_by">
                      <option value="id">Product ID</option>
                       <option value="name">Product Name</option>
                       <option value="category">Category Name</option>
                       <option value="subcategory">Sub-category Name</option>
                       <option value="brand">Brand Name</option>
                  </select>
                  <input type="text" class="form-control" wire:model="search_term">
                </div>
        </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
            @if(count($products)>0)
            <table class="table table-head-fixed text-nowrap text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Unit Price</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->subcategory->name}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td>
                            <div class="btn-group">
                                @can("view-product")
                                <button type="button" class="btn btn-success" title="Show Details" wire:click="show({{$product->id}})">
                                <i class="fas fa-eye"></i>
                                </button>
                                @endcan
                                @can("edit-product")
                                <button type="button" class="btn btn-warning" title="Edit Details" wire:click="edit({{$product->id}})">
                                <i class="fas fa-edit"></i>
                                </button>
                                @endcan
                                @can("create-product")
                                <button type="button" class="btn btn-primary" title="Add Properties" wire:click="addProperties({{$product->id}})">
                                <i class="fas fa-plus"></i>
                                </button>
                                @endcan
                                @can("delete-product")
                                <button type="button" class="btn btn-danger" title="Delete Product" wire:click="delete({{$product->id}})">
                                <i class="fas fa-trash"></i>
                                </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else 
            <p class="text-center my-3">No products found</p>
            @endif
        </div>
        <div class="card-footer">
            {{$products->links()}}
        </div>
    </div>
    <!-- /.card -->
    </div>
</div>
</div>