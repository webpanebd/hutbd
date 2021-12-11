<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">@if(!$edit)Create @else Update @endif Coupon</div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Coupon Code</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('coupon.code') is-invalid @enderror" wire:model="coupon.code">
                            @error('coupon.code') <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Discount Amount(TK.)</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control @error('coupon.discount') is-invalid @enderror" wire:model="coupon.discount">
                            @error('coupon.discount') <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Coupon Starts At</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('coupon.starts_at') is-invalid @enderror" wire:model="coupon.starts_at">
                            @error('coupon.starts_at') <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Coupon Expires At</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control @error('coupon.expires_at') is-invalid @enderror" wire:model="coupon.expires_at">
                            @error('coupon.expires_at') <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        
                        <div class="col-md-8">
                            @if(!$edit)
                            <button class="btn btn-primary" wire:click="create()">Create</button>
                            @else
                            <button class="btn btn-primary" wire:click="update()">Update</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#ID</td>
                                <td>Code</td>
                                <td>Starts at</td>
                                <td>Expires at</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{date("d M, Y", strtotime($coupon->starts_at))}}</td>
                                    <td>{{date("d M, Y", strtotime($coupon->expires_at))}}</td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success" wire:click="edit({{$coupon->id}})">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger">
                                        <i class="fas fa-trash" wire:click="delete({{$coupon->id}})"></i>
                                        </button>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$coupons->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>