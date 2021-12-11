<div>
@livewire('frontend.components.shop.breadcrumb')
<section class="product spad">
    <div class="container">
        <div class="row">
            @livewire('frontend.components.shop.departments')
            <div class="col-lg-9 col-md-7">
                @livewire('frontend.components.shop.discounted-product')
                {{-- @livewire('frontend.components.shop.filter') --}}
                @livewire('frontend.components.shop.product-list')

            </div>
        </div>
    </div>
</section>
</div>



    