<div class="container-fluid">
    <div class="row mb-4 justify-content-start">
        <div class="col-md-6">
            <a href="#add-new-user-modal" class="btn btn-default" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add New <span class="text-capitalize">{{$role}}</span></a>
            @livewire('admin.modals.add-new-user',['role'=>$role])
            <a href="{{route('users.trash',['role'=>$role])}}" class="btn btn-default"><i class="fa fa-trash"></i>&nbsp;View Trash <span class="badge badge-danger">{{$no_of_trashed_user}}</span></a>
        </div>
        
    </div>
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
                     <h1 class="text-center">Not Found</h1>
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
                        @if($user->id!=Auth::user()->id)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                 <img src="{{asset($user->avatar)}}" alt="user avatar" style="max-width:100px;width:50px;height:50px;max-height:100px; border-radius:50%;margin-right:4px;">
                                {{$user->name}}
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('user.show',['id'=>$user->id])}}">Show</a>
                                <button class="btn btn-danger" wire:click="delete({{$user->id}})">Remove</button>
                                @livewire('admin.users.change-role', ['user' => $user], key($user->id))
                            </td>
                        </tr>
                        @endif
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