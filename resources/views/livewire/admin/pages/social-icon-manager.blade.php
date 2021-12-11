<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Manage Social Icons</h1>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="create()">
                        <div class="form-group row">
                            <label for="" class="col-4">Icon Name:</label>
                            <div class="col-8">
                                <input type="text" wire:model="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="eg. facebook">
                                @error('icon')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4">Link:</label>
                            <div class="col-8">
                                <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror">
                                @error('link')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Social Icons</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>
                                    Icon
                                </td>
                                <td>Link</td>
                                <td>Delete</td>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($icons as $icon)
                            <tr>
                                <td>
                                    <i class="fab fa-{{$icon->icon}}"></i>
                                </td>
                                <td><a href="{{$icon->link}}" class="text-capitalize">{{$icon->icon}}</a></td>
                                <td>
                                    <button class="btn btn-danger" wire:click="delete({{$icon->id}})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>