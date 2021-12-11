<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title"> @if($edit) Update @else Create @endif Category</h1>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="" class="col-md-4">Sub-category Name</label>
                         <div class="input-group col-md-8">
                             <input type="text" class="form-control @error('category_name') is-invalid @enderror" wire:model="category_name">
                             @error('category_name') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-md-4">Description</label>
                         <div class="input-group col-md-8">
                             <textarea cols="30" rows="3" class="form-control @error('category_description') is-invalid @enderror" wire:model="category_description"></textarea>
                             @error('category_description') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-md-4">Parent category</label>
                         <div class="input-group col-md-8">
                             <select wire:model="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                <option value="">== Select category ==</option>
                                @foreach($cats as $cat)
                                 <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                             @error('cat_id') <span class="invalid-feedback">{{$message}}</span> @enderror
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
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Sub Category List</h1>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->category->name}}</td>
                                    <td>
                                        <button class="btn btn-success" wire:click="edit({{$category->id}})"><i class="fas fa-pen"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" wire:click="delete({{$category->id}})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>