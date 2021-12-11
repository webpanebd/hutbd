<?php

namespace App\Http\Livewire\Frontend\Components\SingleProduct;

use App\Models\Comment;
use Livewire\Component;

class CommentSystem extends Component
{

    public $product;
    public $text;
    public $total_comments;

    protected $rules = [
        "text" => "required|max:500"
    ];
    protected $listeners = ["commentDeleted", "commentUpdated"];
    public function commentDeleted($id)
    {
        Comment::destroy($id);
        $this->total_comments--;
    }

    public function commentUpdated()
    {
    }
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }
    public function render()
    {
        $this->comments = Comment::where("product_id", $this->product->id)->limit(10)->get();
        return view('livewire.frontend.components.single-product.comment-system');
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function post()
    {
        $this->validate($this->rules);
        Comment::create([
            "user_id" => auth()->user()->id,
            "product_id" => $this->product->id,
            "text" => $this->text
        ]);
        $this->emitUp('newCommentAdded');
        $this->reset(['text']);
    }
}
