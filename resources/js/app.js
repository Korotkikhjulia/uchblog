/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

document.addEventListener("DOMContentLoaded", function () {
    var exampleModal = document.getElementById("exampleModal");
    exampleModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget; // Кнопка, вызвавшая модалку
        var postId = button.getAttribute("data-id"); // Получаем ID поста

        // Обновляем action формы
        var form = document.getElementById("deleteForm");
        form.action = "/auth/destroy/" + postId; // Меняем URL для удаления
    });
});


let debounceTimeout;

document.getElementById('search').addEventListener('input', function () {
    let query = this.value.trim(); // Получаем строку поиска без пробелов
    let postsContainer = document.getElementById('posts-container'); // Контейнер для постов

    // Очистка контейнера сразу, если строка поиска пустая
    if (query === "") {
        postsContainer.innerHTML = ""; // Очищаем контейнер
        clearTimeout(debounceTimeout); // Отменяем таймер, если очищен поиск
        return; // Не отправляем запрос, если строка пустая
    }

    // Очистим таймер (если был запущен предыдущий запрос) перед новым запросом
    clearTimeout(debounceTimeout);

    // Устанавливаем новый таймер, чтобы отправить запрос только после задержки
    debounceTimeout = setTimeout(() => {
        // Теперь отправляем запрос на сервер только, если строка не пуста
        if (query !== "") {
            fetch(`/search?query=${query}`)
                .then(response => response.json()) // Преобразуем ответ в JSON
                .then(data => {
                    postsContainer.innerHTML = ''; // Очищаем контейнер перед обновлением

                    // Если посты найдены, добавляем их в контейнер
                    if (data.length > 0) {
                        data.forEach(post => {
                            let postCard = `
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">${post.title}</h5>
                                            <p class="card-text">${post.content}</p>
                                        </div>
                                    </div>`;
                            postsContainer.innerHTML += postCard;
                        });
                    } else {
                        // Если ничего не найдено, оставляем контейнер пустым
                        postsContainer.innerHTML = '<p class="text-muted">Ничего не найдено</p>';
                    }
                })
                .catch(error => console.error('Ошибка:', error)); // Ловим ошибки
        }
    }, 100); // Задержка в 300 миллисекунд
});
