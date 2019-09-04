
@extends('layout.withmenu')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>Список книг (<?=$books->total()?>)</h1>
            </div>

            <div class="col-md-12">
                <form action="{{ route('create_book') }}" method="GET">
                    <input type="submit" value="Добавить книгу" class="btn btn-primary" />
                </form>
            </div>

            <div class="col-md-12">

                <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>

                <?php foreach($books as $n): ?>


                    <!--a href="{{ route('show_book', $n->id) }}" -->
                        <h2 style="margin-top:0;"><?=$n->title?></h2>
                    <!--/a -->

                    <div >
                        <form action="{{ route('edit_book', $n->id) }}" method="post" style="float:left; margin-right:10px;">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary btn-sm" value="Редактировать" />
                        </form>

                        <form action="{{ route('delete_book', $n->id) }}" method="post" style="float:left; margin-right:20px;">
                            {{ csrf_field() }}
                            <input type="submit" class="class-delete-books btn btn-danger btn-sm" value="Удалить" />
                        </form>

                        <div style="flot:left;">
                            <a href="{{ route('show_book', $n->id) }}" style="font-size: 15px;" >Подробнее</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <!--
                            <div style="font-size: 12px; color: grey; margin: 10px 0 10px 0;">
                                Автор:
                            </div>
                            -->

                            <!--
                            <div>
                                <a href="{{ route('show_book', $n->id) }}" style="font-size: 15px;" >Подробнее</a>
                            </div>
                            -->

                        </div>
                    </div>

                    <div style="margin:30px 0; height:1px; border-bottom:1px dashed #ced4da;"></div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-12" id="paginate">
                <?=$books->links()?>
            </div>
        </div>
    </div>

    <script>
        $('.class-delete-books').on('click', function(){
            if( confirm('Вы действительно хотите удалить книгу?') )
            {
                return true;
            }
            return false;
        });
    </script>

@endsection