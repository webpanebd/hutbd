<div class="col-md-12 mb-4 py-5" style="font-size:12px !important;">
    <div class="row justify-content-start">
        <div class="col-md-4 mb-2">
            <div class="row">
                <div class="col-4">
                    <img src="{{asset($comment->user->avatar)}}" alt="" style="width:50px;height:50px;border-radius:25px;">
                </div>
                <div class="col-6 pt-1">
                    <p><b>{{$comment->user->name}}</b></p>
                    <p>{{humanDate($comment->created_at)}}</p>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-2">
            <p>{{$comment->text}}</p>
            <div>
            @auth
            <a class="btn btn-primary btn-sm" href="#reply-modal-{{$comment->id}}" data-toggle="modal">Reply</a>
            @if(Auth::user()->id==$comment->user_id)
            <a class="btn btn-warning btn-sm" title="Edit" href="#edit-modal-{{$comment->id}}" data-toggle="modal" wire:click.debounce.400ms="edit({{$comment->id}})" ><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-sm" title="Delete" wire:click.debounce.400ms="delete({{$comment->id}})"><i class="fa fa-trash"></i></button>
            @endif
            @endauth
            </div>
        </div>
    </div>
    
    {{-- edit modal starts here --}}
    <div wire:ignore class="modal" tabindex="-1" role="dialog" id="edit-modal-{{$comment->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control @error('editable_comment.text') is-invalid @enderror" wire:model.lazy="editable_comment.text"></textarea>
                @error('editable_comment.text') <span class="invalid-feedback">{{$message}}</span>@enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"  wire:click.debounce.400ms="update()">Update Comment</button>
            </div>
            </div>
        </div>
    </div>
    {{-- edit modal ends here --}}

    {{-- reply modal starts here --}}
    <div wire:ignore class="modal" tabindex="-1" role="dialog" id="reply-modal-{{$comment->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control @error('reply_text') is-invalid @enderror" wire:model.lazy="reply_text"></textarea>
                @error('reply_text') <span class="invalid-feedback">{{$message}}</span>@enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"  wire:click.debounce.400ms="reply({{$comment->id}})">Reply</button>
            </div>
            </div>
        </div>
    </div>
    {{-- reply ends here --}}
</div>
