<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Add Property to product</h1>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addAttribute()">
                        <div class="row form-group">
                            <label for="" class="col-md-4">Property Name:</label>
                            <div class="col-md-8">
                                <select wire:model="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror">
                                    <option value="">=== Select property ===</option>
                                    @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                    @endforeach
                                </select>
                                @error("attribute_id") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        @if($type == "select")
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-capitalize">{{$key}}:</label>
                            <div class="col-md-8">
                                <select wire:model="value" class="form-control @error('value') is-invalid @enderror">
                                    <option value="">=== Select {{$key}}===</option>
                                    @foreach($properties as $property)
                                    <option value="{{$property->value}}">{{$property->value}}</option>
                                    @endforeach
                                </select>
                                @error("value") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        @else 
                        <div class="row form-group">
                            <label for="" class="col-md-4 text-capitalize">{{$key}}</label>
                            <div class="col-md-8">
                                <input type="{{$type}}" wire:model="value" class="form-control @error('value') is-invalid @enderror">
                                @error("value") <span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        @endif
                        <div class="row form-group justify-content-end">
                            <div class="col-md-8">
                                <button class="btn btn-success">Add to this product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Value</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->attributeProducts as $prop)
                            <tr>
                                <td>{{$prop->key}}</td>
                                <td>{{$prop->value}}</td>
                                <td>
                                    <button class="btn btn-danger" wire:click="remove({{$prop->id}})">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset($product->featured_image)}}" alt="" style="width:200px;">
                </div>
                <div class="card-footer text-center">
                    <h4>{{$product->name}}</h4>
                </div>
            </div>
        </div>
    </div>


</div>