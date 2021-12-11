<div class="tab-pane active" id="settings" wire:ignore.self>
            <div class="form-horizontal">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('user.name') is-invalid @enderror" id="inputName" placeholder="Name" wire:model="user.name">
                        @error('user.name') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('user.email') is-invalid @enderror"  placeholder="Email" wire:model="user.email">
                        @error('user.email') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('user.phone') is-invalid @enderror"  placeholder="Phone" wire:model="user.phone">
                        @error('user.phone') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('user.address') is-invalid @enderror"  placeholder="Address" wire:model="user.address"></textarea>
                        @error('user.address') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="@if($image) {{$image->temporaryUrl()}} @else {{asset($user->avatar)}} @endif" alt="avatar" style="width:100px;height:100px;">
                            </div>
                            <div class="card-footer">
                                <label for="avatar-image" type="button" class="btn btn-primary btn-block"><i class="fa fa-upload"></i>&nbsp;Upload Avatar</label>
                            </div>
                        </div>
                        <input type="file" class="d-none" wire:model="image" id="avatar-image">
                        @error('image') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                </div>
               
                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success" wire:click="update()">Update Profile</button>
                </div>
                </div>
            </div>
            </div>