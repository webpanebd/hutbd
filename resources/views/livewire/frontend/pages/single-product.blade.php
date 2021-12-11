<div>
    @livewire('frontend.components.single-product.bread-crumb', ['product' => $product], key($product->id))
    @livewire('frontend.components.single-product.product-details', ['product' => $product], key($product->id))
</div>
