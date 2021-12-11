<div class="container">
    <div class="row">
        <div class="col-md-6 text-center mb-4">
            <img src="{{asset($user->avatar)}}" alt="user avatar" class="img img-fluid rounded" style="width:300px;min-width:200px;">
        </div>
        <div class="col-md-6">
            <div class="card p-3">
               <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-bold">Name:</div>
                        <div class="col-md-8">{{$user->name}}</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 text-bold">Email:</div>
                        <div class="col-md-8">{{$user->email}}</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 text-bold">Phone:</div>
                        <div class="col-md-8">{{$user->phone}}</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 text-bold">Address:</div>
                        <div class="col-md-8">{{$user->address}}</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 text-bold">Role:</div>
                        <div class="col-md-8 text-capitalize">{{$user->roleName()}}</div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
