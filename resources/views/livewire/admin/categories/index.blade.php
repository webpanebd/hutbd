<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title"> @if($edit) Update @else Create @endif Category</h1>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="" class="col-md-4">Category Name</label>
                         <div class="input-group col-md-8">
                             <input type="text" class="form-control @error('category_name') is-invalid @enderror" wire:model="category_name">
                             @error('category_name') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-md-4">Category Image</label>
                         <div class="input-group col-md-8">
                             <input type="file" accept="image/jpg,image/jpeg,image/png,image/gif" class="form-control @error('image') is-invalid @enderror" wire:model="image">
                             @error('image') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group justify-content-end">
                         <div class="input-group col-md-8">
                             @if($edit)
                              <button class="btn btn-primary btn-block" wire:click="update()">Update</button>
                             @else
                             <button class="btn btn-primary btn-block" wire:click="create()">Create</button>
                             @endif
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Category List</h1>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            @if($category->slug!="uncategorized")
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{asset($category->image)}}" alt="category-image" style="max-width:100px;"></td>
                                    <td>
                                        <button class="btn btn-success" wire:click="edit({{$category->id}})"><i class="fas fa-pen"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" wire:click="delete({{$category->id}})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>