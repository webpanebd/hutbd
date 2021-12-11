<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-2611px, 0px, 0px); transition: all 0s ease 0s; width: 4789px;">
                        @foreach ($categories as $category)
                            <div class="owl-item" style="width: 435.294px;">
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="{{asset($category->image)}}" style="background:#0a0a0abb;background-blend-mode: multiply;">
                                    <h5><a href="#">{{$category->name}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
        </div>
    </div>
</section>