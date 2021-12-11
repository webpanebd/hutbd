<div class="container-fluid">

    <div class="row mb-4">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title text-capitalize">
                {{Str::plural($role)}}
            </h3>

            <div class="card-tools">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <select class="btn btn-default" wire:model="search_by">
                      <option  value="id">ID</option>
                      <option  value="name">Name</option>
                      <option  value="email">Email</option>
                      <option  value="phone">Phone</option>
                      <option  value="address">Address</option>
                    </select>
                  </div>
                  <input type="text" class="form-control" wire:model="search_term" placeholder="Search">
                </div>
                </div>
            </div>
            </div>

            
             <div class="card-body table-responsive p-0">
                 @if(count($users)<1)
                     <h1 class="text-center">Empty Trash</h1>
                 @else
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            Name
                        </th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>



                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                 <img src="{{asset($user->avatar)}}" alt="user avatar" style="max-width:100px;width:50px;height:50px;max-height:100px; border-radius:50%;margin-right:4px;">
                                {{$user->name}}
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <button class="btn btn-success" wire:click="restore({{$user->id}})">Restore</button>
                                <button class="btn btn-danger" wire:click="permanentDelete({{$user->id}})">Delete Permanently</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
            <div class="card-footer">{{$users->links()}}</div>
             @endif
        </div>
        <!-- /.card -->
       
        </div>
    </div>
   
</div>