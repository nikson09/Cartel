<div class="baner">
    <div class="container">
        <div class="row justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($baners as $key => $baner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class="{{ $baner['order_line'] == 1 ? 'active' : ''}}" ></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($baners as $key => $baner)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <a href="{{ $baner['href'] }}"><img  class="d-block w-100 lazy"  src="{{ Baner::getImage($baner['id'] }})"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
