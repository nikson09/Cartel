@extends('admin.layouts.app', ['activePage' => 'banners', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Редактировать баннер "{{ $banner->id }}"</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_banner_edit_post', ['id' => $banner->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <p>Изображение баннера</p>
                                <div class="text-left">
                                    <img id="preview" src="{{ !empty($banner->image) ? Storage::url('public/banners/'. $banner->image)  : 'https://www.kenyons.com/wp-content/uploads/2017/04/default-image-620x600.jpg' }}" style="max-width: 200px" class="rounded" alt="...">
                                </div>
                                <input class="form-control" type="file" id="files" style="display: none;cursor: pointer;" name="image" class="hidden"/>
                                <label for="files" style="cursor: pointer;">{{ !empty($banner->image) ? $banner->image : 'выберете изображение'  }}</label>

                                <p>Ссылка баннера</p>
                                <input required class="form-control" type="text" name="href" placeholder="Ссылка баннера" value="{{ $banner->href }}">

                                <p>Тип баннера</p>
                                <select id="relation_id" required class="custom-select" name="relation_id" onchange="fetchRelations()">
                                    <option value="">Выбрать из списка</option>
                                    @foreach($bannerTypes as $key => $bannerType)
                                        <option value="{{ $key }}" {{ !empty($banner->bannerRelation) ? $banner->bannerRelation->baner_type ==  $key ? 'selected' : '' : ''}}>{{$bannerType}}</option>
                                    @endforeach
                                </select>

                                <div id="related_div" style="{{ count($relations) > 0 ? '' : 'display: none' }}">
                                    <p id="relation_title">Выбрать одну категорию из типа баннера</p>
                                    <select id="related_id" required class="custom-select" name="related_id">
                                        @if(count($relations) > 0)
                                            @foreach($relations as $relation)
                                                <option value="{{ $relation['key'] }}" {{  !empty($banner->bannerRelation) ?  $banner->bannerRelation->related_id ==  $relation['key'] ? 'selected' : '' : ''}}>{{ $relation['value'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="0" selected></option>
                                        @endif
                                    </select>
                                </div>
                                <div  style="justify-content: center;display: flex;">
                                    <button type="submit" class="btn btn-round btn-default">Редактировать баннера</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('load', function() {
            document.querySelector('input[name="image"]').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    let img = document.querySelector('#preview');
                    img.src = URL.createObjectURL(this.files[0]);
                }
            });
        });

        function fetchRelations() {
            let relationType = $('#relation_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/admin/banner/fetchBannerRelations',
                data:{ banner_type: relationType},
                success:function(data)
                {
                    let relations = data.relations;

                    let html = '';

                    relations.forEach((value, index) => {
                        html += '<option value="'+ value.key +'">'+ value.value +'</option>'
                    });

                    if(relations.length > 0){
                        $('#related_div').show();
                    } else {
                        html = '<option value="0" selected></option>';
                    }
                    $('#relation_title').html('Выбрать одну категорию из типа баннера');
                    $('#related_id').html(html);

                },
                error:function(data)
                {

                }
            });
        }
    </script>
@endsection
