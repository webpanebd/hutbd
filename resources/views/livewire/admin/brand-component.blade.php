<div class="container-fluid">
    @if(auth()->user()->hasAnyPermission(["create-brand","edit-brand"]))
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title"> @if($edit) Update @else Create  @endif Brand</h1>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="" class="col-md-4">Brand Name</label>
                         <div class="input-group col-md-8">
                             <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                             @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group">
                        <label for="" class="col-md-4">Description</label>
                         <div class="input-group col-md-8">
                             <textarea cols="30" rows="3" class="form-control @error('description') is-invalid @enderror" wire:model="description"></textarea>
                             @error('description') <span class="invalid-feedback">{{$message}}</span> @enderror
                         </div>
                    </div>
                    <div class="row form-group justify-content-end">
                         <div class="input-group col-md-8">
                            
                             @if($edit)
                              @can('edit-brand')
                              <button class="btn btn-primary btn-block" wire:click="update()">Update</button>
                               @endcan
                             @else
                                @can("create-brand")
                                <button class="btn btn-primary btn-block" wire:click="create()">Create</button>
                                @endcan
                             @endif
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title text-capitalize">
                All brands
            </h3>
            <div class="card-tools">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <select class="btn btn-default" wire:model="search_by">
                      <option  value="id">ID</option>
                      <option  value="name">Name</option>
                      <option  value="description">Description</option>
                    </select>
                  </div>
                  <input type="text" class="form-control" wire:model="search_term" placeholder="Search">
                </div>
                </div>
            </div>
            </div>

            
             <div class="card-body table-responsive p-0">
                 @if(count($brands)<1)
                     <h1 class="text-center">Not Found</h1>
                 @else
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            Name
                        </th>
                        <th>Description</th>
                        @if(auth()->user()->hasAnyPermission(["edit-brand","delete-brand"]))
                        <th>Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>
                                {{$brand->name}}
                            </td>
                            <td>{{$brand->description}}</td>
                           
                            <td>
                                @if(Auth::user()->id===$brand->user_id || Auth::user()->hasRole('admin'))
                                @can("edit-brand")
                                    <button class="btn btn-success" wire:click="edit({{$brand->id}})">Edit</button>
                                @endcan 
                                @can('delete-brand')
                                    <button class="btn btn-danger" wire:click="delete({{$brand->id}})">Remove</button>
                                @endcan
                                @else 
                                <span class="text-primary">___</span>
                                @endif 
                            </td>

                        @endforeach
                    </tbody>
                </table>
               
            </div>
            <div class="card-footer">{{$brands->links()}}</div>
              @endif
        </div>
        <!-- /.card -->
       
        </div>
    </div>
   
</div>