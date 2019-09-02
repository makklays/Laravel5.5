<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addNewsRequest;
use App\News;

/**
 * ТЕСТОВОЕ ЗАДАНИЕ.
 *
 * Требуется создать: Титульную страницу содержащую список новостей с возможностью просмотра детальной страницы.
 * Общие требования к результату задачи:
 *
 * На титульную страницу новости должны выгружаться из базы. Каждая новость должна иметь:
 * Заголовок (выводиться на титульную и детальную страницы)
 * Дата публикации (выводиться на титульную и детальную страницы)
 * Краткое описание (выводиться на титульную и детальную страницы)
 * Полное описание (выводиться на детальную страницу)
 *
 * Дополнительные требования:
 * CMS использовать нельзя. Framework можно.
 * Url титульной страницы /news/
 * Url детальной страницы /news/*название новости*
 *
 * Дополнительным плюсом будет являться:
 * наличие функциональности  транслитерации заголовка новости в URL и запись его в базу данных;
 * наличие функциональности добавления/удаления новости;
 * наличие пагинации на странице.
 *
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::where('publicated_at', '<', date('Y-m-d H:i:s', time()))
            ->orderBy('publicated_at', 'DESC')
            ->paginate(5);

        //$news = News::orderBy('publicated_at', 'DESC')->paginate(5);

        return View('news.index', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // просто отображаем форму для заполнения
        return View('news.create');
    }

    /**
     * @param addNewsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(addNewsRequest $request) // использую свой Request
    {
        // закоментированный код - как тестовый пример выполнения
        /*$validator = $this->validate($request, [
            'title' => 'required|unique:news|max:255',
            'short_description' => 'required',
            'full_description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('create-news')
                ->withErrors($validator)
                ->withInput();
        }*/

        $date = $request->year.'-'.$request->month.'-'.$request->day; // :-)

        $news = new News();
        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->full_description = $request->full_description;
        $news->slug = $news->text2translit($request->title);
        $news->publicated_at = date('Y-m-d H:i:s', strtotime($date));
        $news->save();

        // обновляем slug (добавляем id - делаем уникальным ))
        $news->slug = $news->id.'-'.$news->slug;
        $news->save();

        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        return View('news.show', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // не используем
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // не используем
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();

        return redirect('news');
    }
}
