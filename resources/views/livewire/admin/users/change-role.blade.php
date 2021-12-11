<div class="d-inline">
    <select class="btn btn-default" wire:model="change_role">
        <option value="">Change Role</option>
        @foreach($roles as $role)
            <option value="{{$role->name}}" class="text-capitalize">{{$role->name}}</option>
        @endforeach
    </select>
    @error('change_role') <span class="invalid-feedback">{{$message}}</span> @enderror
</div>