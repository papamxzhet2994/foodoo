<style>
    * {
        font-family: Roboto, sans-serif;
    }

    .header {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #fff;
    }

    .logo {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .logo img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        margin-right: 10px;
        margin-left: 50px;
    }

    .auth-buttons {
        display: flex;
        align-items: center;
    }

    .auth-buttons a {
        margin-right: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        font-size: 15px;
        color: #000;
    }

    .auth-buttons a.registration {
        background-color: #000;
        border: 2px solid #000;
        padding: 10px;
        border-radius: 15px;
        transition: all 0.3s ease;
        color: #fff;
        margin-left: 20px;
    }

    .auth-buttons a.registration:hover {
        background-color: #424242;
        color: #fff;
    }

    .auth-buttons a.auth:hover {
        color: #424242;
    }

    .right-section {
        display: flex;
        align-items: center;
        margin-left: auto;
        margin-right: 50px;
    }

    .profile {
        margin-right: 50px;
        cursor: pointer;
        margin-left: 50px;
    }

    .search-wrapper {
        position: relative;
    }

    .search-place {
        display: flex;
        align-items: center;
    }

    .search-place input {
        font-size: 15px;
        border-radius: 10px 0 0 10px;
        border: none;
        padding: 10px;
        outline: none;
        width: 250px;
        background-color: #d9d9d9;
    }

    .search-place button {
        font-size: 15px;
        border-radius: 0 10px 10px 0;
        padding: 10px;
        background-color: #000;
        color: #fff;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .search-suggestions {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        width: 250px; /* Ширина списка */
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
    }

    .search-suggestions.visible {
        display: block;
    }

    #suggestions-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        max-height: 200px;
        overflow-y: auto;
    }

    #suggestions-list li {
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #suggestions-list li:hover {
        background-color: #f0f0f0;
    }

    .search-icon {
        display: none;
    }

    .close-search {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .right-section {
            margin-left: auto;
            margin-right: 0;
        }

        .logo img {
            margin-left: auto;
            margin-right: auto;
            width: 100px;
            height: 70px;
        }

        .profile {
            margin-right: 0;
            margin-left: 0;
        }

        .auth-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 0;
        }

        .auth-buttons a.registration {
            margin-left: 0;
            font-size: 13px;
            padding: 8px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .search-place input,
        .search-place button {
            display: none;
            margin-top: 20px;
        }

        .search-icon {
            display: block;
            cursor: pointer;
            font-size: 25px;
            color: #000;
            margin-right: 15px;
            margin-left: 100px;
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0;
            margin-left: 0;
        }

        .close-search {
            cursor: pointer;
            display: none;
            font-size: 25px;
            color: #000;
            background-color: transparent;
            border: none;
            margin-left: 10px;
            margin-top: 20px;
        }

        .search-place input {
            display: block;
            width: 0;
            padding: 0;
            border: none;
            transition: all 0.3s ease;
        }

        .search-place input.expand {
            width: 250px;
            padding: 10px;
            border: none;
        }
    }
</style>
<body>
<header class="header">
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/logo 1.png') }}" alt="Logo" /></a>
    </div>

    <div class="right-section">
        @if (auth()->check())
            <div class="search-wrapper">
                <div class="search-place">
                    <a class="search-icon" onclick="toggleSearch()"><i class="fas fa-search"></i></a>
                    <input type="search" id="search-input" placeholder="Найти магазин или ресторан">
                    <button type="button" onclick="search()">Найти</button>
                    <a class="close-search" onclick="closeSearchDialog()"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-suggestions">
                    <ul id="suggestions-list"></ul>
                </div>
            </div>

            <div class="profile">
                <a href="{{ route('profile') }}"><img src="{{asset('assets/userProfile.png')}}" alt="Profile"></a>
            </div>
        @else
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="auth">Войти</a>
                <a href="{{ route('registration') }}" class="registration">Зарегистрироваться</a>
            </div>
        @endif
    </div>

</header>
<script>
    function search() {
        let query = document.getElementById('search-input').value.trim();

        if (query === "") {
            alert("Введите текст для поиска");
            return;
        }

        // Отправка запроса на сервер
        fetch('/search?q=' + encodeURIComponent(query))
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Обработка полученных результатов поиска
                displaySuggestions(data);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });

        closeSearchDialog();
    }

    // Функция для выполнения поиска и отображения подсказок
    function searchSuggestions(query) {
        fetch('/search-suggestions?q=' + encodeURIComponent(query))
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                displaySuggestions(data);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    function displaySuggestions(suggestions) {
        let suggestionsList = document.getElementById('suggestions-list');
        suggestionsList.innerHTML = '';

        if (suggestions.length > 0) {
            suggestions.forEach(suggestion => {
                let listItem = document.createElement('li');
                listItem.textContent = suggestion.name;
                if (suggestion.type === 'shop') {
                    listItem.addEventListener('click', function() {
                        // Перенаправляем на страницу магазина с выбранным товаром
                        window.location.href = '/shops/' + encodeURIComponent(suggestion.id);
                    });
                } else if (suggestion.type === 'restaurant') {
                    listItem.addEventListener('click', function() {
                        // Перенаправляем на страницу ресторана с выбранным рестораном
                        window.location.href = '/restaurants/' + encodeURIComponent(suggestion.id);
                    });
                }
                suggestionsList.appendChild(listItem);
            });
            document.querySelector('.search-suggestions').classList.add('visible');
        } else {
            document.querySelector('.search-suggestions').classList.remove('visible');
        }
    }

    // Обработчик события ввода текста в поле поиска
    document.getElementById('search-input').addEventListener('input', function() {
        let query = this.value.trim();
        if (query !== '') {
            searchSuggestions(query);
        }
    });

    function toggleSearch() {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.querySelector('.search-place button');
        const closeButton = document.querySelector('.search-place .close-search');
        const profile = document.querySelector('.profile');
        const searchIcon = document.querySelector('.search-icon');
        const logo = document.querySelector('.logo');

        if (!searchInput.classList.contains('expand')) {
            searchInput.classList.add('expand');
            searchInput.style.display = 'block';
            searchButton.style.display = 'block';
            closeButton.style.display = 'block';
            profile.style.display = 'none';
            searchIcon.style.display = 'none';
            logo.style.display = 'none';
        } else {
            searchInput.classList.remove('expand');
            setTimeout(() => {
                searchInput.style.display = 'none';
                searchButton.style.display = 'none';
                closeButton.style.display = 'none';
                profile.style.display = 'block';
                searchIcon.style.display = 'flex';
                logo.style.display = 'block';
            }, 800);
        }
    }

    function closeSearchDialog() {
        const searchInput = document.querySelector('.search-place input');
        searchInput.classList.remove('expand');
        setTimeout(() => {
            searchInput.style.display = 'none';
            document.querySelector('.search-place button').style.display = 'none';
            document.querySelector('.search-place .close-search').style.display = 'none';
            document.querySelector('.profile').style.display = 'block';
            document.querySelector('.search-icon').style.display = 'flex';
            document.querySelector('.logo').style.display = 'block';
        }, 300);
    }




</script>

