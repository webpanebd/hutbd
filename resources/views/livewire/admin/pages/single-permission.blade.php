<tr>
    <td>{{$permission->name}}</td>
    <td class="text-right py-0 align-middle">
        <div class="btn-group btn-group-sm">
            <div class="icheck-success d-inline">
                @php $id_suffix=uniqid();@endphp
                <input type="checkbox"  id="checkboxSuccess-{{$id_suffix}}" wire:model="status" value="{{$permission->name}}">
                <label for="checkboxSuccess-{{$id_suffix}}"></label>
            </div>
        </div>
    </td>
</tr>