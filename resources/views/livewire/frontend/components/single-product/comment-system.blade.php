<div class="product__details__tab__desc">
    <div class="row form-group">
        @auth
        @if($product->hasReview)
        <div class="col-md-12 mb-2">
            <textarea wire:model.lazy="text" class="form-control @error('text') is-invalid @enderror" id="" cols="30" rows="2" placeholder="Write about this product"></textarea>
            @error('text')<span class="invalid-feedback">{{$message}}/span>@enderror
        </div>
       
        <div class="col-md-4">
            <button class="btn btn-primary" wire:click="post()">Post</button>
        </div>
        
        @else 
        <span>Comments are turend off.</span>
        @endif
        @else 
        <div class="alert alert-warning ml-3" role="alert">To make a comment, you need to be loggedin.</div>
        @endauth
    </div>
    @if(count($comments)>0)
    <h6>Products Reviews</h6>
    <div class="container">
        @foreach ($comments as $comment)
            <div class="row">
                @livewire('frontend.components.single-product.single-comment', ['comment' => $comment], key($comment->id))
            </div>
        @endforeach
    </div>
    @else 
    <h6>No reviews found</h6>
    @endif
</div>