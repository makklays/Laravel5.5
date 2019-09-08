
@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <h1>Страницы - тестовых заданий Laravel</h1>
            </div>

            <div class="col-md-4">

                <a href="/books" >web - Список книг</a> <br/>
                <a href="/create-book" >web - Добавить книгу</a> <br/><br/>

                <a href="/api/all-books" >API - список всех книг</a> <br/>
                <a href="/api/my-books" >API - список книг (загруженных мной)</a> <br/>
                <a href="/api/author/3/books" >API - cписок книг конкретного автора</a> <br/><br/>
                <a href="/api/all-authors" >API - список всех авторов</a> <br/><br/>

                <a href="/api/book/1" >API - выбранная книга</a> <br/>
                <a href="/api/author/1" >API - выбранный автор</a> <br/><br/>

                <a href="/authors" >web - Список авторов</a> <br/><br/>

                <a href="/news" >web - Новости</a> <br/><br/>

                <a href="/api/all-persons" >API - пользователи</a> <br/>
                <a href="/api/persons" >API - пользователи (100 чел.)</a> <br/><br/>

                <a href="/upload-persons?offset=<?=date('Y-m-d')?>" >web - Загрузка пользователей</a> <br/><br/>

                <a href="/api/all-ttable" >API - Вся недвижимость</a> <br/>
                <a href="/ttable?lang=ru" >web - Форма поиска (c jQuery)</a> <br/>
                <a href="/ttable-vue?lang=en" >web - Форма поиска (c Vue.js)</a> <br/><br/>
            </div>
            <div class="col-md-4">
                <!--
                <a href="/api/all-books" >API - список книг</a> <br/>
                <a href="/api/book/1" >API - выбранная книга</a> <br/><br/>

                <a href="/api/all-authors" >API - список авторов</a> <br/>
                <a href="/api/author/1" >API - выбранный автор</a> <br/><br/>
                -->
            </div>
            <div class="col-md-4">
                <!--
                <a href="/api/all-books" >API - список книг</a> <br/>
                <a href="/api/all-authors" >API - список авторов</a> <br/><br/>
                -->
            </div>
        </div>
    </div>

@endsection