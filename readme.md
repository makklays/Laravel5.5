# EN: Example code for Laravel and completed task <br/>ES: Código de ejemplo para Laravel y tarea completada

![Laravel_Logo](https://github.com/makklays/Laravel5.5/blob/master/public/img/screenshots/Screenshot_1.png)

Site: [makklays.com.ua](http://makklays.com.ua?from=github_laravel)

[EN](https://github.com/makklays/Laravel5.5#ua) - 
[ES](https://github.com/makklays/Laravel5.5#es) - 
[UA](https://github.com/makklays/Laravel5.5#ua) - 
[CH](https://github.com/makklays/Laravel5.5#ch) 

#### UA: 
**Виконане завдання для перевiрки знань Laravel 5.5** <br/><br/>
Створити API що дозволяє шукати данi. <br/>
Створити просту форму пошуку (Front-end), яка буде запрашувати API використовуючи AJAX i вiдображати отриманi результати з Back-end. <br/><br/>

**Використати знання технологiй:** <br/>
-PHP (Laravel) <br/>
-Vue.js/Javascript <br/>
-HTML <br/>
-GIT: Закомiтити вашу роботу в Git репозиторiй з вашою робочою директорiєю як логiчне завершення робочого завдання. <br/> 
-Bootstrap: Використати bootstrap для стилiзацiї Front-end частини. <br/>

Вимоги:<br/>
**API:**  <br/>
- Використовуючи таблицю з данними (нижче) створити API route, що дозволяють шукати даннi; <br/>
  name | price | bedrooms | bathrooms | storeys | garages <br/>
  -------------------------------------------------------------------- <br/>
  Victoria | 374662 | 4 | 2 | 2 | 2 <br/>
  Xavier | 513268 | 4 | 2 | 1 | 2 <br/>
  Como | 454990 | 4 | 3 | 2 | 3 <br/>
  Aspen | 384356 | 4 | 2 | 2 | 2 <br/>
  Lucretia | 572002 | 4 | 3 | 2 | 2 <br/>
  Toorak | 521951 | 5 | 2 | 1 | 2 <br/>
  Skyscape | 263604 | 3 | 2 | 2 | 2 <br/>
  Clifton | 386103 | 3 | 2 | 1 | 1 <br/>
  Geneva | 390600 | 4 | 3 | 2 | 2 <br/>
- Данi мають бути добавленi в базу даних. Використати Laravel мiграцiї та ciди; 
- API повинно шукати по:
    name: також повинні відповідати часткові назви
    bedrooms: точна відповідність
    bathrooms: точна відповідність
    storeys: точна відповідність
    garages: точна відповідність
    price: значення (мiж $X та $Y)
- Всi пошуковi параметри повиннi бути не обов'язковi. Ми повиннi мати можливiсть шукати 2 bedrooms, чи 4 bedrooms та 2 bathrooms у квартирi.
- API повинно повертати JSON з чисто числовими даними (не HTML код);
Front-end (форма пошуку):
- Створити просту форму пошуку, яка буде запрашувати API використовуючи AJAX i вiдображати отриманi результати з Back-end;
- Результат пошуку повинен бути рендерингом в динамiчну HTML таблицю на Front-end, використовуючи реактивний Vue.js/Javascript;
- Повинен бути якийсь пошуковий iндикатор (прелоадер), обертаюча іконка або щось подібне;  
- Якщо результати не знайдено, повинно відображатися повідомлення;
- Додати можливість переключатися між декількома мовами (наприклад: українською, росiйською та англiйською). 

Завдання має мати декiлька commit-iв, і весь проект повинен бути завантажений у Github. <br/><br/>
Дякую! <br/><br/>

#### EN: 
**Completed the task to test knowledge Laravel 5.5** <br/><br/>
Create an API that allows you to search for data. <br/>
Create a simple search form (Front-end) that will invite APIs using AJAX and display back-end results. <br/><br/>

**Use technology knowledge:** <br/>
-PHP (Laravel) <br/>
-Vue.js/Javascript <br/>
-HTML <br/>
-GIT <br/> 
-Bootstrap <br/>

Requirements: <br/><br/>
**API:** <br/>
- Using the data table (below) to create a route API to search for data; <br/>
  name        price      bedrooms    bathrooms    storeys    garages <br/>
  -------------------------------------------------------------------- <br/>
  Victoria    374662     4           2            2          2 <br/>
  Xavier      513268     4           2            1          2 <br/>
  Como        454990     4           3            2          3 <br/>
  Aspen       384356     4           2            2          2 <br/>
  Lucretia    572002     4           3            2          2 <br/>
  Toorak      521951     5           2            1          2 <br/>
  Skyscape    263604     3           2            2          2 <br/>
  Clifton     386103     3           2            1          1 <br/>
  Geneva      390600     4           3            2          2 <br/>
- The data should be added to the database. Use Laravel migrations and Seedes; 
- API should search on:
    name: should also match on partial names
    bedrooms: exact match
    bathrooms: exact match
    storeys: exact match
    garages: exact match
    price: value (between $X and $Y)
- All search parameters should be optional. We should be able to search for 2 bedrooms, or 4 bedrooms and 2 bathrooms in an apartment.
- API must return JSON with purely numeric data (not HTML code); <br/><br/>
**Front-end (search form):**
- Create a simple search form that will invite APIs using AJAX and display back-end results;
- The search result should be rendered to a dynamic HTML table on Front-end using reactive Vue.js / Javascript;
- There should be some search indicator (preloader), rotating icon, or something like that;  
- If no results are found, a message should be displayed;
- Add the ability to switch between multiple languages (for example: Ukrainian, Russian and English).

The task should have several commit and the entire project must be downloaded to Github.

Thanks! <br/><br/>

#### ES: 
**Completada la tarea para probar conocimiento Laravel 5.5** <br/><br/>
Cree una API que le permita buscar datos. <br/>
Cree un formulario de búsqueda simple (Front-end) que invitará a las API que usan AJAX y mostrará resultados de back-end. <br/><br/>

**Usa el conocimiento tecnológico:** <br/>
-PHP (Laravel) <br/>
-Vue.js/Javascript <br/>
-HTML <br/>
-GIT <br/> 
-Bootstrap <br/>

Requisitos: <br/><br/>
**API:** <br/>
- Usar la tabla de datos (a continuación) para crear una API de ruta para buscar datos; <br/>
  name        price      bedrooms    bathrooms    storeys    garages <br/>
  -------------------------------------------------------------------- <br/>
  Victoria    374662     4           2            2          2 <br/>
  Xavier      513268     4           2            1          2 <br/>
  Como        454990     4           3            2          3 <br/>
  Aspen       384356     4           2            2          2 <br/>
  Lucretia    572002     4           3            2          2 <br/>
  Toorak      521951     5           2            1          2 <br/>
  Skyscape    263604     3           2            2          2 <br/>
  Clifton     386103     3           2            1          1 <br/> 
  Geneva      390600     4           3            2          2 <br/>
- Los datos deben agregarse a la base de datos. Use migraciones y sembradoras Laravel;
- API debe buscar en:
    name: también debe coincidir con nombres parciales
    bedrooms: coincidencia exacta
    bathrooms: coincidencia exacta
    storeys: coincidencia exacta
    garages: coincidencia exacta
    price: valor (entre $ X y $ Y)
- Todos los parámetros de búsqueda deben ser opcionales. Deberíamos poder buscar 2 dormitorios, o 4 dormitorios y 2 baños en un apartamento.
- La API debe devolver JSON con datos puramente numéricos (no con código HTML); <br/><br/>
**Front-end (formulario de búsqueda):**
- Cree un formulario de búsqueda simple que invitará a las API que usen AJAX y muestre los resultados del back-end;
- El resultado de la búsqueda debe representarse en una tabla HTML dinámica en el front-end usando Vue.js / Javascript reactivo;
- Debería haber algún indicador de búsqueda (precargador), ícono giratorio o algo así; 
- Si no se encuentran resultados, se debe mostrar un mensaje;
- Agregue la capacidad de cambiar entre varios idiomas (por ejemplo: ucraniano, espanol y inglés).


La tarea debe tener varios confirmaciones y todo el proyecto debe descargarse a Github.

Gracias <br/><br/>

#### CH: 
**完成了測試知識的任務 Laravel 5.5** <br/><br/>
創建一個允許您搜索數據的API。 <br/>
創建一個簡單的搜索表單（前端），它將使用AJAX邀請API並顯示後端結果。 <br/><br/>

**使用技術知識：** <br/>
-PHP (Laravel) <br/>
-Vue.js/Javascript <br/>
-HTML <br/>
-GIT <br/> 
-Bootstrap <br/>

要求： <br/><br/>
**API:** <br/>
- 使用數據表（如下）創建路徑API以搜索數據; <br/>
  name        price      bedrooms    bathrooms    storeys    garages <br/>
  -------------------------------------------------------------------- <br/>
  Victoria    374662     4           2            2          2 <br/>
  Xavier      513268     4           2            1          2 <br/>
  Como        454990     4           3            2          3 <br/>
  Aspen       384356     4           2            2          2 <br/>
  Lucretia    572002     4           3            2          2 <br/>
  Toorak      521951     5           2            1          2 <br/>
  Skyscape    263604     3           2            2          2 <br/>
  Clifton     386103     3           2            1          1 <br/>
  Geneva      390600     4           3            2          2 <br/>
- 應將數據添加到數據庫中。 使用Laravel遷移和播種機; 
- API應搜索：
    name: 也應匹配部分名稱
    bedrooms: 完全符合
    bathrooms: 完全符合
    storeys: 完全符合
    garages: 完全符合
    price: 值 (在$ X和$ Y之間)
- 所有搜索參數都應該是可選的。 我們應該能夠在公寓中搜索2間臥室，或4間臥室和2間浴室。
- API必須返回帶有純數字數據的JSON（不是HTML代碼）; <br/><br/>
**前端（搜索表單）：**
- 創建一個簡單的搜索表單，使用AJAX邀請API並顯示後端結果;
- 應使用反應性Vue.js / Javascript將搜索結果呈現給前端的動態HTML表;
- 應該有一些搜索指示器（預加載器），旋轉圖標或類似的東西;  
- 如果未找到結果，則應顯示一條消息;
- 添加在多種語言之間切換的功能（例如：烏克蘭語，俄語和英語）。

該任務應該有幾個提交，整個項目必須下載到Github。<br/><br/>

謝謝！

Site: [makklays.com.ua](http://makklays.com.ua?from=github)