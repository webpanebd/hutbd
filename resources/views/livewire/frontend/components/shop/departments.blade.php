<div class="col-lg-3 col-md-5">
    <div class="sidebar">
        <div class="sidebar__item">
            <h4>Brands</h4>
            <ul>
                @foreach ($brands as $brand)
                    <li><a href="#">{{$brand->name}}t</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar__item">
            <h4>Price</h4>
            <div class="price-range-wrap">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="{{$min}}" data-max="{{$max}}">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div></div>
                <div class="range-slider">
                    <div class="price-input">
                        <input type="text" id="minamount">
                        <input type="text" id="maxamount" class="d-inline-block" style="max-width:62px;">
                        <span style="color:#dd2222;">{{product_settings()->currency}}</span>
                    </div>
                   
                    
                </div>
            </div>
        </div>
        @livewire('frontend.components.shop.color-filter')
        <div class="sidebar__item">
           @livewire('frontend.components.latest-products')
        </div>
    </div>
</div>