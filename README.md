=====

**ЗАДАНИЕ**

Спроектировать и реализовать в БД хранение информации для следующих сущностей: Компания, Пользователь....
- минимальный набор атрибутов для сущности Компания: CompanyID, CompanyName
- минимальный набор атрибутов для сущности Пользователь: UserID, UserName
- связь между сущностями Компания many-to-many Пользователь

**Инструкция по развертыванию и запуску:**
1. Клонируем репозиторий: git clone https://github.com/argab/laravel.git
2. В файле .env имеются следующие данные конфигурации для подключений к БД, при необходимости можно изменить:
`DB_CONNECTION=pgsql`
 `DB_HOST=127.0.0.1`
 `DB_PORT=5432`
 `DB_DATABASE=postgres`
 `DB_USERNAME=postgres`
 `DB_PASSWORD=`
3. Запуск миграций: `php artisan migrate --force`
4. Заполняем данные сущностей: `php artisan db:seed`
5. **Эндпоинт: http ://{локальный домен}/user**

**Примечание:** Для табличного представления данных сущностей в шаблоне, использовался компонент собственной разработки, который находится в папке `./app/lib/grid`

=====

**ЗАДАНИЕ**
1. Реализовать форму поиска, которая будет принимать на вход IATA код аэропорта вылета и IATA код аэропорта прилета, дату вылета, а также класс перелета. Условимся, что пассажир всегда один (взрослый).
2. Полученные данные представить в виде списка авиакомпаний (логотип, название). При нажатии на авиакомпанию, у нее раскрывается список предложений. Указать в предложении аэропорты прилета и вылета, даты прилета и вылета, время в пути, цену билета.
3. Опционально: написать фильтр по времени нахождения в пути.

**Инструкция по развертыванию и запуску:**
1. **Эндпоинт: http ://{локальный домен}/api** (платформа та же, что и в предыдущем задании, ничего разворачивать и устанавливать не надо, если этого не делали в предыдущем задании.)

=====

**ЗАДАНИЕ**
Исходные данные:
У вас есть карта островов, которая задана матрицей N x M, где 0 — это вода, а 1 — суша. Островом считается как отдельно стоящая единица в матрице, так и группа соприкасающихся по вертикали или горизонтали единиц.
[
[0, 0, 1, 0],
[1, 0, 1, 1],
[0, 0, 0, 1],
[1, 0, 0, 0],
[0, 1, 0, 0],
]
Результат: 4
Требуется:
1. Реализовать алгоритм нахождения количества островов и его визуализацию. 
- требования к стэку: чистый js или любой js-framework;
- требования к оформлению (верстке\шаблону) не предъявляются.

**Эндпоинт: http ://{локальный домен}/matrix** (платформа та же, используется синтаксис EcmaScript 6, Компонент Vue.js 2.5.17)

