
@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <div>
                    <a href="/ttable?lang=ru" style="margin:0 10px 0 0;"><img src="/img/icons/russia.png" width="18px" title="RU" alt="ru" /></a>
                    <a href="/ttable?lang=en"><img src="/img/icons/uk.png" width="18px" title="EN" alt="en" /></a>
                </div>
            </div>
            <div class="col-md-12">
                <h1>{{ trans('ttable.search_build') }} (<?=$ttables->count()?>)</h1>
            </div>

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Форма написания статьи -->

                        <form id="id-form-search" action="{{ route('search_ttable') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="id-name">{{ trans('ttable.name') }}</label>
                                <input id="id-name" name="name" type="text" value="{{ old('name') }}" class="form-control" />

                                <?php if ($errors->has('name')): ?>
                                <div class="invalid-name" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('name')?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-price_min">{{ trans('ttable.price_min') }}</label>
                                        <input id="id-price_min" name="price_min" type="text" value="{{ old('price_min') }}" class="form-control" />

                                        <?php if ($errors->has('price_min')): ?>
                                        <div class="invalid-price_min" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('price_min')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-price_max">{{ trans('ttable.price_max') }}</label>
                                        <input id="id-price_max" name="price_max" type="text" value="{{ old('price_max') }}" class="form-control" />

                                        <?php if ($errors->has('price_max')): ?>
                                        <div class="invalid-price_max" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('price_max')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-bedrooms">{{ trans('ttable.bedrooms') }}</label>
                                        <input id="id-bedrooms" name="bedrooms" type="text" value="{{ old('bedrooms') }}" class="form-control" />

                                        <?php if ($errors->has('bedrooms')): ?>
                                        <div class="invalid-bedrooms" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('bedrooms')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-storeys">{{ trans('ttable.storeys') }}</label>
                                        <input id="id-storeys" name="storeys" type="text" value="{{ old('storeys') }}" class="form-control" />

                                        <?php if ($errors->has('storeys')): ?>
                                        <div class="invalid-storeys" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('storeys')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-bathrooms">{{ trans('ttable.bathrooms') }}</label>
                                        <input id="id-bathrooms" name="bathrooms" type="text" value="{{ old('bathrooms') }}" class="form-control" />

                                        <?php if ($errors->has('bathrooms')): ?>
                                        <div class="invalid-bathrooms" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('bathrooms')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-garages">{{ trans('ttable.garages') }}</label>
                                        <input id="id-garages" name="garages" type="text" value="{{ old('garages') }}" class="form-control" />

                                        <?php if ($errors->has('garages')): ?>
                                        <div class="invalid-garages" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('garages')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>
                                </div>
                            </div>

                            <a href="/menu" style="margin-right: 20px;" >{{ trans('ttable.cancel') }}</a>
                            <input type="submit" value="{{ trans('ttable.show_result') }}" class="btn btn-primary" />

                        </form>
                    </div>

                    <div class="col-md-6">
                        <div id="id-preloader-test" class="text-center" style="margin-top:20px; display:none;">
                            <img src="/img/preloader.gif" style="width:80px;" title="Preloader..." alt="preloader..." >
                        </div>
                        <div id="id-dev-result" style="display:none;">
                            <label>{{ trans('ttable.results') }}:</label>
                            <table id="id-table-result" class="table table-bordered table-striped" style="background-color: #fff; box-shadow: 0 0 8px;">

                                <tr id="id-table-result-tr">
                                    <th>{{ trans('ttable.name') }}</th>
                                    <th class="text-center">{{ trans('ttable.price') }}</th>
                                    <th class="text-center">{{ trans('ttable.bedrooms') }}</th>
                                    <th class="text-center">{{ trans('ttable.bathrooms') }}</th>
                                    <th class="text-center">{{ trans('ttable.storeys') }}</th>
                                    <th class="text-center">{{ trans('ttable.garages') }}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <br/>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            // используя jQuery - отправляем ajax по submit-у формы на API
            $('#id-form-search').on('submit', function() {

                // добавляем token - проверяется ли он в API ?
                // он уже добавлен в форму переменной: @{{ csrf_field() }} - поэтому, он отправляется !
                // и ajaxSetup - не нужен. Оставил в коде для примера (если в форме нет переменной).
                /*$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });*/

                // отправляем ajax - jQuery
                $.ajax({
                    type: 'POST',
                    url: '{{ env('APP_URL') }}/api/search-ttable', // указывать полный путь с http://domain.com/api..
                    data: $('#id-form-search').serialize(),
                    beforeSend: function () {
                        // preloader
                        $('#id-preloader-test tbody').css('display', 'block');
                        // удаляем предыдущий результат из таблицы результатов
                        $('#id-table-result .del').each(function(){
                            $(this).remove();
                        })
                    },
                    success: function (data) {
                        // отображаем таблицу с результатами
                        $('#id-preloader-test').css('display', 'none');
                        $('#id-dev-result').css('display', 'block');

                        // если результат - ничего не найдено
                        if (data.data.length == 0) {
                            var tr = $('<tr class="del">').append('<td colspan="6">{{ trans('ttable.not_results') }}</td>');
                            $('#id-table-result').append(tr);
                        }

                        // если есть результат - добавляем в таблицу
                        data.data.forEach(function(item, i) {
                            var tr = $('<tr class="del">')
                                .append('<td>'+item.name+'</td>')
                                .append('<td class="text-center">'+item.price+'</td>')
                                .append('<td class="text-center">'+item.bedrooms+'</td>')
                                .append('<td class="text-center">'+item.bathrooms+'</td>')
                                .append('<td class="text-center">'+item.storeys+'</td>')
                                .append('<td class="text-center">'+item.garages+'</td>')
                            $('#id-table-result').append(tr);
                            //alert( i + ": " + item.name);
                        });
                        return false;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Error
                        alert('Error!');
                        return false;
                    }
                });
                return false;
            });
        });
    </script>
@endsection