
<div class="container">
    <div class="row">
        <div wire:loading wire:target="update" style="position:fixed;top:0px;left:0;z-index:10000;width:100%;height:100vh;background:#fff;">
            <div style="width:200px;height:200px;overflow:hidden;position:relative;top:50%;left:50%;transform:translate(-50%,-50%);">
                <img src="{{asset('img/saving.gif')}}" alt="saving" style="width:100%;height:100%;">
            </div>
        </div>   
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Site Information</h1>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('siteinfo.name') is-invalid @enderror" wire:model="siteinfo.name">
                            @error('siteinfo.name') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Title</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('siteinfo.title') is-invalid @enderror" wire:model="siteinfo.title">
                            @error('siteinfo.title') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control @error('siteinfo.description') is-invalid @enderror" wire:model="siteinfo.description" placeholder="Site description"></textarea>
                            @error('siteinfo.description') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Keywords</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control @error('siteinfo.keywords') is-invalid @enderror" wire:model="siteinfo.keywords" placeholder="Site Keywords"></textarea>
                            @error('siteinfo.keywords') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Office Address</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control @error('siteinfo.address') is-invalid @enderror" wire:model="siteinfo.address" placeholder="Address"></textarea>
                            @error('siteinfo.address') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('siteinfo.email') is-invalid @enderror" wire:model="siteinfo.email">
                            @error('siteinfo.email') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Phone Number</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('siteinfo.phone') is-invalid @enderror" wire:model="siteinfo.phone">
                            @error('siteinfo.phone') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Site Default Role</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control @error('siteinfo.default_role') is-invalid @enderror" wire:model="siteinfo.default_role">
                                <option value="">=== Select Default Role ===</option>
                                @foreach($roles as $role)
                                <option value="{{$role->name}}">{{ucfirst($role->name)}}</option>
                                @endforeach
                            </select>
                            @error('siteinfo.default_role') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>

                     <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">Can user register in this website?</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row justify-content-start">
                                <div class="custom-control custom-radio col-md-2">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="register"  wire:model="siteinfo.can_register" value="1">
                                    <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                                <div class="custom-control custom-radio col-md-2">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="register"  wire:model="siteinfo.can_register" value="0">
                                    <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                            </div>
                            @error('siteinfo.can_register') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                     <div class="row form-group justify-content-end">
                         <div class="col-md-4">
                            <label for="">Upload website logo</label>
                        </div>
                         <div class="col-md-8">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="@if($logo){{asset($logo->temporaryUrl())}} @else {{asset($siteinfo->logo)}} @endif" alt="Logo" class="img img-fluid" style="width:200px;">
                                </div>
                                <div class="card-footer">
                                    <input type="file" wire:model="logo" id="site-logo" class="d-none">
                                    <label for="site-logo" class="btn btn-primary btn-block"><i class="fa fa-upload"></i>&nbsp;Upload</label>
                                </div>
                            </div>
                            @error('logo') <span class="invalid-feedback">{{$message}}</span>@enderror
                         </div>
                    </div>
                    <div class="row form-group justify-content-end">
                         <div class="col-md-4">
                            <label for="">Upload website favicon</label>
                        </div>
                         <div class="col-md-8">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="@if($favicon){{asset($favicon->temporaryUrl())}} @else {{asset($siteinfo->favicon)}} @endif" alt="Favicon" class="img img-fluid" style="width:200px;">
                                </div>
                                <div class="card-footer">
                                    <input type="file" wire:model="favicon" id="site-favicon" class="d-none">
                                    <label for="site-favicon" class="btn btn-primary btn-block"><i class="fa fa-upload"></i>&nbsp;Upload</label>
                                </div>
                            </div>
                            @error('favicon') <span class="invalid-feedback">{{$message}}</span>@enderror
                         </div>
                    </div>
                    <div class="row form-group justify-content-end">
                         <div class="col-md-8">
                            <button class="btn btn-success btn-block" wire:click="update()">Save Changes</button>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

