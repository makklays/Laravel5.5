
@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <div>
                    <a href="/ttable-vue?lang=es" style="margin:0 10px 0 0;"><img src="/img/icons/spain.png" width="18px" title="ES" alt="es" /></a>
                    <a href="/ttable-vue?lang=ru" style="margin:0 10px 0 0;"><img src="/img/icons/russia.png" width="18px" title="RU" alt="ru" /></a>
                    <a href="/ttable-vue?lang=en" style="margin:0 10px 0 0;"><img src="/img/icons/uk.png" width="18px" title="EN" alt="en" /></a>
                    <a href="/ttable-vue?lang=ua" style="margin:0 10px 0 0;"><img src="/img/icons/ukraine.png" width="18px" title="UA" alt="ua" /></a>
                    <a href="/ttable-vue?lang=ch" style="margin:0 10px 0 0;"><img src="/img/icons/china.png" width="18px" title="CH" alt="ch" /></a>
                </div>
            </div>
            <div class="col-md-12">
                <h1>{{ trans('ttable.search_build') }} (<?=$ttables->count()?>)</h1>
            </div>

            <div class="col-md-12">

                <div id="id-vue-page" class="row">
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

                        <form id="id-form-search" @submit.prevent="sendForm">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="id-name">{{ trans('ttable.name') }}</label>
                                <input id="id-name" name="name" v-model="name" type="text" value="{{ old('name') }}" class="form-control" />

                                <?php if ($errors->has('name')): ?>
                                <div class="invalid-name" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('name')?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-price_min">{{ trans('ttable.price_min') }}</label>
                                        <input id="id-price_min" name="price_min" v-model="price_min" type="number" value="{{ old('price_min') }}" class="form-control" />

                                        <?php if ($errors->has('price_min')): ?>
                                        <div class="invalid-price_min" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('price_min')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-price_max">{{ trans('ttable.price_max') }}</label>
                                        <input id="id-price_max" name="price_max" v-model="price_max" type="number" value="{{ old('price_max') }}" class="form-control" />

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
                                        <input id="id-bedrooms" name="bedrooms" v-model="bedrooms" type="number" value="{{ old('bedrooms') }}" class="form-control" />

                                        <?php if ($errors->has('bedrooms')): ?>
                                        <div class="invalid-bedrooms" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('bedrooms')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-storeys">{{ trans('ttable.storeys') }}</label>
                                        <input id="id-storeys" name="storeys" v-model="storeys" type="number" value="{{ old('storeys') }}" class="form-control" />

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
                                        <input id="id-bathrooms" name="bathrooms" v-model="bathrooms" type="number" value="{{ old('bathrooms') }}" class="form-control" />

                                        <?php if ($errors->has('bathrooms')): ?>
                                        <div class="invalid-bathrooms" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('bathrooms')?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id-garages">{{ trans('ttable.garages') }}</label>
                                        <input id="id-garages" name="garages" v-model="garages" type="number" value="{{ old('garages') }}" class="form-control" />

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
                            <button class="btn btn-primary" >{{ trans('ttable.show_result') }}</button>

                        </form>
                    </div>

                    <div class="col-md-6">
                        <div v-if="loading" class="text-center" style="margin-top:20px;">
                            <img src="/img/preloader.gif" style="width:80px;" title="Preloader..." alt="preloader..." >
                        </div>
                        <div v-if="!loading && sh_result" >
                            <label>{{ trans('ttable.results') }} (@{{ response.length }}):</label>
                            <table id="id-table-result" class="table table-bordered table-striped" style="background-color: #fff; box-shadow: 0 0 8px;">
                                <tr id="id-table-result-tr">
                                    <th>{{ trans('ttable.name') }}</th>
                                    <th class="text-center">{{ trans('ttable.price') }}</th>
                                    <th class="text-center">{{ trans('ttable.bedrooms') }}</th>
                                    <th class="text-center">{{ trans('ttable.bathrooms') }}</th>
                                    <th class="text-center">{{ trans('ttable.storeys') }}</th>
                                    <th class="text-center">{{ trans('ttable.garages') }}</th>
                                </tr>
                                <tr v-if="exist_result" v-for="(itm,i) in response" :key="i">
                                    <td>@{{ itm.name }}</td>
                                    <td class="text-center">@{{ itm.price }}</td>
                                    <td class="text-center">@{{ itm.bedrooms }}</td>
                                    <td class="text-center">@{{ itm.bathrooms }}</td>
                                    <td class="text-center">@{{ itm.storeys }}</td>
                                    <td class="text-center">@{{ itm.garages }}</td>
                                </tr>
                                <tr v-if="!exist_result">
                                    <td colspan="6">{{ trans('ttable.not_results') }}</td>
                                </tr>
                            </table>
                        </div>

                        <style>
                            .hide_json { display: none; }
                        </style>
                        <div v-if="!loading && sh_result">
                            <a href="#" @click="sh_json = !sh_json" :aria-pressed="sh_json ? 'true' : 'false'">{{ trans('ttable.response_server') }}</a>
                            <pre v-if="sh_json">@{{ response }}</pre>
                        </div>

                    </div>
                </div>

                <br/>
            </div>
        </div>
    </div>
@endsection