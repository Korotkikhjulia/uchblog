<p>Задание 6: Создание простого блога</p>
<p>Коротких Юлия и Юрьевцев Игорь</p>
<p>Это веб-блог, который позволит пользователям добавлять, редактировать и удалять посты.</p> 
<div>
<p>Функционал:</p>
    <p>1.	Просмотр постов:
•	На главной странице блога отображаются все посты, созданные пользователями. Каждый пост должен содержит заголовок, дату создания и краткое содержание. 
•	Посты отсортированы по дате создания, начиная с самых новых.</p>
<img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Просмотр%20постов.png">
    <p>•	Реализована возможность отображения полной версии поста при клике на его заголовок, открывая содержимое на новой странице.</p>
<img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Полная%20версия%20поста.png">
2.	Добавление постов:
•	Пользователи могут создавать новые посты с заголовком и содержанием. 
•	Реализована форма для добавления поста, которая включает текстовые поля для заголовка и содержания.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Добавление%20поста.png">
•	Обеспечена валидация введенных данных: заголовок обязателен, а содержание — не менее 10 символов. При некорректных данных выводятся сообщения об ошибках.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Валидация%20добавления%20поста.png">
3.	Редактирование постов:
•	Пользователи могут изменять уже существующие посты. 
•	При редактировании поста предлагается пользователю заполнить форму с текущими данными поста, чтобы он мог внести изменения. 
•	Обеспечена та же валидация, что и при добавлении поста.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Редактирование%20поста.png">
4.	Удаление постов:
•	Пользователи могут удалять посты по своему усмотрению. 
•	Реализована кнопка "Удалить" рядом с каждым постом. При нажатии на эту кнопку появляется окно подтверждения с вопросом "Вы уверены, что хотите удалить этот пост?". Удаление происходит только после подтверждения.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Удаление%20поста.png">
5.	Валидация данных:
•	При добавлении нового поста реализована система валидации, которая проверяет корректность введенных данных перед их отправкой на сервер. 
•	Если данные некорректны, отображаются сообщения об ошибках рядом с полями ввода.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Валидация%20данных.png">
6.	Обновление списка постов:
•	После добавления, редактирования или удаления постов обновляется список постов на странице без перезагрузки (с помощью AJAX). 
•	Реализован плавный переход между состояниями, чтобы пользователь мог видеть изменения в реальном времени. 
7.	Сортировка постов:
•	Реализована возможность сортировки постов по заголовку или дате. Добавлены соответствующие элементы управления (выпадающее меню) для выбора критерия сортировки.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Сортировка%20постов.png">
8.	Поиск по заголовкам постов:
•	Добавлена возможность поиска по заголовкам постов. Реализована строка поиска, которая будет фильтровать посты в реальном времени по мере ввода текста.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Поиск%20по%20заголовкам%20постов.png">
9.	Реализация авторизации:
•	Добавлен функционал авторизации пользователей, чтобы только зарегистрированные пользователи могли добавлять, редактировать или удалять посты. Реализована система регистрации и входа с использованием сессий или токенов.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Регистрация.png">
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Авторизация.png">
10.	Обратная связь от пользователей:
•	Добавлена возможность комментирования постов, чтобы пользователи могли оставлять свои мнения или задавать вопросы. Реализован интерфейс для добавления и отображения комментариев, включая возможность удаления или редактирования собственных комментариев.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Комментирование%20постов.png">
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Редактирование%20комментариев.png">
11.	Адаптивный дизайн:
•	Блог корректно отображается на различных устройствах, таких как смартфоны и планшеты.
    <img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Адаптивный%20дизайн.png">
<img src="https://github.com/Korotkikhjulia/uchblog/blob/main/public/img/Адаптивный%20дизайн%202.png">

</div>











<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
