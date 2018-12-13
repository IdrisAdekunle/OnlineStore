<div class="row same-height-row">
    <div class="col-md-3 col-sm-6">
        <div class="box same-height">
            <h3>You may also like these products</h3>
        </div>
    </div>

    @foreach($interests as $interest)
        <div class="col-md-3 col-sm-6">
            <div class="product same-height">
                <div class="flip-container">
                    <div class="flipper">
                        <div class="front">
                            <a href="">
                                <img src="{{$interest->picture}}" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="back">
                            <a href="">
                                <img src="{{$interest->picture1}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <a href="" class="invisible">
                    <img src="{{$interest->picture}}" alt="" class="img-responsive">
                </a>
                <div class="text">
                    <a href="{{route('show',$interest->name)}}" class="">
                        <h3>{{$interest->name}}</h3>
                    </a>
                    <p class="price">{{ '₦'.number_format($interest->price,2)}}</p>
                </div>
            </div>
            <!-- /.product -->
        </div>

@endforeach
</div>
