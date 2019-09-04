
@extends('layout.withmenu')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>Список авторов (<?=$authors->total()?>)</h1>
            </div>

            <div class="col-md-12">

                <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                <?php foreach($authors as $n): ?>

                    <h2 style="margin-top:0;"><?=$n->firstname?> <?=$n->lastname?></h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="font-size: 12px; color: grey; margin: 10px 0 10px 0;">

                            </div>
                            <div>
                                <a href="{{ route('show_author', $n->id) }}" style="font-size: 15px;" >Написанные им книги (<?=$n->books->count()?> шт)</a>
                            </div>
                        </div>
                    </div>

                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                <?php endforeach; ?>
            </div>

            <div class="col-md-12" id="paginate">
                <?=$authors->links()?>
            </div>
        </div>
    </div>

@endsection