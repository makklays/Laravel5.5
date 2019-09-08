
@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>Добавить книгу</h1>
            </div>

            <div class="col-md-12">

                @include('parts.flash')

                <form action="{{ route('store_book') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group required">
                        <label for="id-title">Название книги</label>
                        <input id="id-title" name="title" type="text" value="{{ old('title') }}" class="form-control" />

                        <?php if ($errors->has('title')): ?>
                        <div class="invalid-salary" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('title')?></div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="id-count_page">Количество страниц</label>
                                <input id="id-count_page" name="count_page" type="text" value="{{ old('count_page') }}" class="form-control" />

                                <?php if ($errors->has('count_page')): ?>
                                <div class="invalid-count_page" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('count_page')?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="id-author_id">Автор:</label>
                                <div style="clear:both;"></div>
                                <select name="author_id" class="form-control" id="id-author_id" style="float:left; margin-right:20px;">
                                    <option value="">-- Выбрать автора --</option>
                                    <?php foreach($authors as $author): ?>
                                    <option value="<?=$author->id?>" {{ old('author_id') == $author->id ? 'selected="selected"' : '' }} ><?=$author->firstname?> <?=$author->lastname?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div style="clear:both;"></div>

                                <?php if ($errors->has('author_id')): ?>
                                <div class="invalid-author_id" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('author_id')?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id-annotation">Аннотация:</label>
                        <textarea name="annotation" rows="5" type="text" class="form-control" id="id-annotation" placeholder="">{{ old('annotation') }}</textarea>

                        <?php if ($errors->has('annotation')): ?>
                        <div class="invalid-annotation" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('annotation')?></div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group required">
                        <label for="id-picture">Картинка:</label>
                        <input type="file" name="picture" rows="7" class="form-control-file" id="id-picture" value="{{ old('picture') }}" placeholder="" />
                        <small id="fileHelp" class="form-text text-muted">Пожалуйста, загрузите действительный файл изображения. Размер изображения не должен превышать 2 МБ.</small>

                        <?php if ($errors->has('picture')): ?>
                        <div class="invalid-picture" role="alert" style="font-size:12px; color:#d64028;"><?=$errors->first('picture')?></div>
                        <?php endif; ?>
                    </div>




                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                    <a href="{{ route('all_books') }}" style="margin-right: 20px;" >Отменить</a>
                    <input type="submit" value="Сохранить книгу" class="btn btn-primary" />
                </form>

                <br/>
            </div>
        </div>
    </div>

@endsection