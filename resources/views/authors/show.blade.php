@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <a href="{{ route('all_authors') }}" ><< Все авторы</a>
                <h1><?=$author->firstname?> <?=$author->lastname?></h1>
            </div>
            <div class="col-md-12">
                <h4>Написанные им книги:</h4>
            </div>
            <div class="col-md-12">
                <?php if(isset($books) && !empty($books)): ?>
                    <?php foreach($books as $book): ?>
                        <div><?=$book->title?> (<?=$book->count_page?> страниц)</div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

@endsection