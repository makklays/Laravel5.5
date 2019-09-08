@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <a href="{{ route('all_books') }}" ><< Все книги</a>
                <h1><?=$book->title?></h1>
                (<?=$book->count_page?> страниц)

                @if (isset($book->picture) && !empty($book->picture) && file_exists(public_path('/storage/books/'.$book->picture)))
                    <div>
                        <img src="/storage/books/<?=$book->picture?>" title="<?=$book->title?>" alt="" style="width:200px;" />
                    </div>
                @endif
            </div>

            <div class="col-md-12" style="margin: 30px 0 0 0;">
                <!--div>
                    <?=$book->picture?>
                </div-->
                <div>
                    <?=$book->annotation?>
                </div>
            </div>

            <div class="col-md-12" style="margin: 30px 0 0 0;">
                <h4>Авторы книги:</h4>
            </div>
            <div class="col-md-12">
                <?php if(isset($book->author) && !empty($book->author)): ?>
                    <div><?=$book->author->firstname?> <?=$book->author->lastname?></div>
                <?php endif; ?>
            </div>

        </div>
    </div>

@endsection