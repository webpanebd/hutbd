<tr>
    <td>
        <img src="{{asset($ad->image)}}" alt="" style="width:140px;">
    </td>
    <td>
        {{$ad->bold_text}}
    </td>
    <td>
        {{$ad->light_text}}
    </td>
    <td>
        {{$ad->link}}
    </td>
    <td>
        {{$ad->location}}
    </td>
    <td><button class="btn btn-success" wire:click.debounce.240ms="edit()">Edit</button></td>
    <td><button class="btn btn-danger" wire:click.debounce.240ms="delete()">Delete</button></td>
</tr>