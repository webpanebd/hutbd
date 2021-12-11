<?php

namespace App\Http\Livewire\Frontend\Components\SingleProduct;

use App\Models\Comment;
use App\Models\Reply;
use Livewire\Component;

class SingleComment extends Component
{

    public $comment;
    public $editable_comment;
    public $reply_text;
    protected $rules = [
        "editable_comment.text" => "required|max:400"
    ];

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {
        return view('livewire.frontend.components.single-product.single-comment');
    }

    public function mount($comment)
    {
        $this->comment = $comment;
    }

    public function delete($id = -1)

    {
        $this->emitUp("commentDeleted", $id);
    }

    public function edit($id)
    {

        $this->editable_comment = Comment::find($id);
    }

    public function update()
    {
        $this->editable_comment->save();
    }
    public function reply($comment_id)
    {
        $this->validate([
            "reply_text" => "required|max:400"
        ]);
        Reply::create([
            "text" => $this->reply_text,
            "user_id" => auth()->user()->id,
            "comment_id" => $comment_id
        ]);
    }
}
