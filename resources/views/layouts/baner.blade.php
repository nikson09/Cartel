@section('content_for_banners')
    @if(isset($banners) && count($banners) > 0)
    <div class="baner">
        <div class="container">
            <div class="row justify-content-center">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                            class="{{ $banner['order_line'] == 1 ? 'active' : ''}}" ></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($banners as $key => $banner)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a href="{{ $banner['href'] }}"><img  class="d-block w-100 lazy"  src="{{ Storage::url('public/banners/'. $banner->image) }}"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
