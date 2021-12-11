<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Update Ad.</h1>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update()">
                        <div class="form-group row">
                            <label for="" class="col-4">Bold Text:</label>
                            <div class="col-8">
                                <input type="text" wire:model="bold_text" class="form-control @error('bold_text') is-invalid @enderror">
                                @error('bold_text')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="" class="col-4">Light Text:</label>
                            <div class="col-8">
                                <input type="text" wire:model="light_text" class="form-control @error('light_text') is-invalid @enderror">
                                @error('light_text')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Background Image:</label>
                            <div class="col-8">
                                <input type="file" accept="image/png,image/jpg,image/jpeg,image/webp,image/gif,image/svg" wire:model="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-4">Ad show location:</label>
                            <div class="col-8">
                                <select wire:model="location" class="form-control @error('location') is-invalid @enderror">
                                    <option value="1">Location-1</option>
                                    <option value="2">Location-2</option>
                                    <option value="3">Location-3</option>
                                    <option value="4">Location-4</option>
                                </select>
                                @error('location')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Shop button link:</label>
                            <div class="col-8">
                                <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror">
                                @error('link')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>