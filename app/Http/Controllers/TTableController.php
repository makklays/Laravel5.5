<?php

namespace App\Http\Controllers;

use App\Http\Requests\searchTableRequest;
use App\TTable;
use Illuminate\Http\Request;
use App\Http\Requests\addNewsRequest;
use App\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

/**
 * Класс - TTableController
 * с методами для предоставления JSON результатов в API
 * и методом для отображения формы, которая исползует API для получения результатов.
 *
 * Class TTableController
 * @package App\Http\Controllers
 */
class TTableController extends Controller
{
    /**
     * For API - get data for parameters
     * все параметры $request не обязательны - валидации нет (но могу добавить используя searchTableRequest).
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request) // searchTableRequest
    {
        // $user_id = auth()->id();
        /*if (!isset($user_id) || empty($user_id)) {
            return response()->json([
                'info' => 'API по предоставлению названий - поиск по параметрам.',
                'error' => 'ОШИБКА! Только для авторизованных пользователей',
            ], 404);
        }*/
        return response()->json([
            'info' => 'API по предоставлению данных недвижимости - поиск по параметрам.',
            'sql' => TTable::search($request)->toSql(),
            'binding' => TTable::search($request)->getBindings(),
            'data' => TTable::search($request)->get(),
        ],200);
    }

    /**
     * For web - Form with jQuery
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(Request $request)
    {
        // переключения языков: ru | en
        if (isset($request->lang) && !empty($request->lang)) {
            $locale = $request->lang;
            App::setLocale($locale);
        }
        // подгрузка данных
        $ttables = TTable::all();
        return View('ttable.form', ['ttables' => $ttables]); // с jquery
    }

    /**
     * Fow web - Form with Vue.js
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function formVue(Request $request)
    {
        // переключения языков: ru | en
        if (isset($request->lang) && !empty($request->lang)) {
            $locale = $request->lang;
            App::setLocale($locale);
        }
        // подгрузка данных
        $ttables = TTable::all();
        return View('ttable.vue', ['ttables' => $ttables]); // c vuejs
    }

    /**
     * For API - get all buildings
     * отдает все данные недвижимости.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTTable()
    {
        return response()->json([
            'info' => 'API по предоставлению всех данных недвижимости.',
            'sql' => TTable::toSql(),
            'binding' => TTable::getBindings(),
            'data' => TTable::get(),
        ],200);
    }


}



