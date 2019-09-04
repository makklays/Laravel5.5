
@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>All News (<?=$news->total()?>)</h1>
            </div>

            <div class="col-md-12">
                <form action="{{ route('create_news') }}" method="GET">
                    <input type="submit" value="Добавить новость" class="btn btn-primary" />
                </form>
            </div>

            <div class="col-md-12">
                <?php foreach($news as $n): ?>
                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                    <h2 style="margin-top:0;"><?=$n->title?></h2>

                    <form action="{{ route('delete_news', $n->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="submit" class="class-delete-news btn btn-danger btn-sm" value="Удалить" />
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <div style="font-size: 12px; color: grey; margin: 10px 0 10px 0;">
                                Опубликовано: <?=date('d/m/Y H:i', strtotime($n->publicated_at))?>
                                <!--a href="{{ route('delete_news', $n->id) }}" style="margin: 0 0 0 20px;" onclick="javascript: return confirm('Вы действительно хотите удалить новость?');">удалить</a-->
                            </div>
                            <div>
                                <?=nl2br($n->short_description)?>
                                <br/>
                                <a href="{{ route('show_news', $n->slug) }}" style="font-size: 15px;" >Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-12" id="paginate">
                <?=$news->links()?>
            </div>
        </div>
    </div>

    <script>
        $('.class-delete-news').on('click', function(){
            if( confirm('Вы действительно хотите удалить новость?') )
            {
                return true;
            }
            return false;
        });
    </script>

@endsection