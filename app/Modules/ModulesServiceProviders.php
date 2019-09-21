<?php namespace App\Modules;

use Illuminate\Support\ServiceProvider;

/**
 * Сервис провайдер для подключения модулей
 * Author: Makklays
 * E-mail:
 * date:
 */
class ModulesServiceProviders extends ServiceProvider
{
    public function boot()
    {
        // получаем список модулей, которые надо подгрузить
        $modules = config("module.modules");
        if ($modules) {
            foreach ($modules as $key => $module) {
                // Подключаем роуты для модуля
                if (file_exists(__DIR__ . '/' . $module . '/routes/api.php')) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/routes/api.php');
                }
                if (file_exists(__DIR__ . '/' . $module . '/routes/routes.php')) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/routes/routes.php');
                }
            }

            // Загружаем View
            // view('Test::admin')
            if (is_dir(__DIR__ . '/' . $module . '/views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/views', $module);
            }
            // Подгружаем миграции
            if (is_dir(__DIR__ . '/' . $module . '/migration')) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/migration');
            }

            // Подгружаем переводы
            // trans('Test::messages.welcome')
            /*if (is_dir(__DIR__ . '/' . $module . '/lang')) {
                $this->loadTranslationsFrom(__DIR__ . '/' . $module . '/lang', $module);
            }*/
        }
    }

    public function register()
    {
    }
}

