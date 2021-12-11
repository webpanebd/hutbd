<div class="container">
    <div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fixed Header Table</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
                </button>
            </div>
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
                                <button type="button" class="btn btn-primary" title="Restore Product" wire:click="restore({{$product->id}})">
                                    Restore
                                </button>
                                @can("delete-product")
                                <button type="button" class="btn btn-danger" title="Delete Product Permanently" wire:click="delete({{$product->id}})">
                                Delete Permanently
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