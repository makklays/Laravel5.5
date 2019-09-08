@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <a href="{{ route('all_authors') }}" ><< Все авторы</a>
                <h1><?=$author->firstname?> <?=$author->lastname?></h1>
            </div>

            <div class="col-md-12">
                <h4>Написанные им книги (<?=$books->count()?>):</h4>
            </div>

            <div class="col-md-12">
                @if (isset($books) && !empty($books->count()))
                    <?php foreach($books as $book): ?>
                        <div><?=$book->title?> (<?=$book->count_page?> страниц)</div>
                    <?php endforeach; ?>
                @else
                    Нет
                @endif
            </div>
        </div>
    </div>

@endsection