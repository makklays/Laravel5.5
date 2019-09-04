@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <a href="{{ route('all_books') }}" ><< Все книги</a>
                <h1><?=$book->title?></h1>
                (<?=$book->count_page?> страниц)
            </div>

            <div class="col-md-12">
                <h4>Авторы книги:</h4>
            </div>
            <div class="col-md-12">
                <?php if(isset($book->author) && !empty($book->author)): ?>
                    <div><?=$book->author->firstname?> <?=$book->author->lastname?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-12">
                <div>
                    <?=$book->picture?>
                </div>
                <div>
                    <?=$book->annotation?>
                </div>
            </div>

        </div>
    </div>

@endsection