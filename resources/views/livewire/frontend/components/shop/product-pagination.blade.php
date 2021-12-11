@if($paginator->hasPages())
<div class="product__pagination">
    @if(!$paginator->onFirstPage())
     <a href="#" wire:click.prevent="previousPage"><i class="fa fa-long-arrow-left"></i></a>
    @endif 


    @if($paginator->hasMorePages())
    <a href="#" wire:click.prevent="nextPage"><i class="fa fa-long-arrow-right"></i></a>
    @endif
</div>
@endif