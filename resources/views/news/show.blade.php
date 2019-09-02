@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <a href="{{ route('all_news') }}" ><< Все новости</a>
                <h1><?=$news->title?></h1>
                <div style="font-size: 12px; color: grey; margin: 0 0 10px 0;">
                    Опубликовано: <?=date('d/m/Y H:i', strtotime($news->publicated_at))?>
                </div>
                <div>
                    <?=nl2br($news->full_description)?>
                </div>
            </div>
        </div>
    </div>

@endsection