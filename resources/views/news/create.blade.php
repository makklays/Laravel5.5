
@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>Добавить новость</h1>
            </div>

            <div class="col-md-12">

                <!--
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                -->

                <!-- Форма написания статьи -->

                <form action="{{ route('store_news') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group required">
                        <label for="id-title">Название новости</label>
                        <input id="id-title" name="title" type="text" value="{{ old('title') }}" class="form-control" />

                        <?php if ($errors->has('title')): ?>
                        <div class="invalid-salary" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('title')?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group required">
                        <label for="id-short">Короткое описание:</label>
                        <textarea name="short_description" rows="5" type="text" class="form-control" id="id-short" placeholder="">{{ old('short_description') }}</textarea>

                        <?php if ($errors->has('short_description')): ?>
                        <div class="invalid-salary" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('short_description')?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group required">
                        <label for="id-full">GПолное описание:</label>
                        <textarea name="full_description" rows="7" type="text" class="form-control" id="id-full" placeholder="">{{ old('full_description') }}</textarea>

                        <?php if ($errors->has('full_description')): ?>
                        <div class="invalid-salary" role="alert" style="font-size:12px; color:#88251d;"><?=$errors->first('full_description')?></div>
                        <?php endif; ?>
                    </div>


                    <div class="form-group required">
                        <label for="id-day">Дата публикации:</label>
                        <div style="clear:both;"></div>
                        <select name="day" class="form-control" id="id-day" style="width:100px; float:left; margin-right:20px;">
                            <?php for($i = 31; $i >= 1; $i--): ?>
                            <option value="<?=$i?>" {{ old('day') == $i ? 'selected="selected"' : '' }} ><?=$i?></option>
                            <?php endfor; ?>
                        </select>

                        <select name="month" class="form-control" id="id-month" style="width:100px; float:left; margin-right:20px;">
                            <?php for($i = 12; $i >= 1; $i--): ?>
                            <?php if ($i < 10 ): ?>
                            <option value="<?=$i?>" {{ old('month') == $i ? 'selected="selected"' : '' }} >0<?=$i?></option>
                            <?php else: ?>
                            <option value="<?=$i?>" {{ old('month') == $i ? 'selected="selected"' : '' }} ><?=$i?></option>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </select>

                        <select name="year" class="form-control" id="id-year" style="width:100px; float:left; ">
                            <?php for($i = date('Y'); $i >= (date('Y')-100); $i--): ?>
                            <option value="<?=$i?>" {{ old('year') == $i ? 'selected="selected"' : '' }} ><?=$i?></option>
                            <?php endfor; ?>
                        </select>
                        <div style="clear:both;"></div>
                    </div>

                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                    <a href="{{ route('all_news') }}" style="margin-right: 20px;" >Отменить</a>
                    <input type="submit" value="Сохранить новость" class="btn btn-primary" />
                </form>

                <br/>
            </div>
        </div>
    </div>

@endsection