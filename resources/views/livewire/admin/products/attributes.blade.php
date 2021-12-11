<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card card-info">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-md-4">Select Attribute:</label>
                        <div class="col-md-8">
                            <select wire:model="attribute" class="form-control @error('attribute') is-invalid @enderror">
                                <option value="">=== Select Attribute ===</option>
                                @foreach($attributes as $attribute)
                                <option value="{{$attribute->name}}">{{$attribute->name}}</option>
                                @endforeach
                            </select>
                            @error("attribute") <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4">Enter Value:</label>
                        <div class="col-md-8">
                            <input type="text" wire:model="value" class="form-control @error('value') is-invalid @enderror">
                            @error("value") <span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-md-8">
                            <button class="btn btn-primary btn-block" wire:click="add()">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="form-group row">
                       <select wire:model="search_attribute" class="form-control">
                           <option value="">=== Search by attribute name ===</option>
                           @foreach($attributes as $attribute)
                           <option value="{{$attribute->name}}">{{$attribute->name}}</option>
                           @endforeach
                       </select>
                   </div>
                </div>
                <div class="card-body"><table class="table text-center">
                <thead>
                    <tr>
                        <td>Key</td>
                        <td>Value</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>{{$property->key}}</td>
                            <td>{{$property->value}}</td>
                            <td><button class="btn btn-danger" wire:click="delete({{$property->id}})">Delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table></div>
            </div>
        </div>
    </div>
</div>