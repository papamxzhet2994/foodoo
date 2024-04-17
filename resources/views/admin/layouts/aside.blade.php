<script src="https://kit.fontawesome.com/5f3f547070.js" crossorigin="anonymous"></script>
<div class="container">
    <aside class="actions">
        <h2>Действия</h2>
        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Пользователи <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin') }}">Список пользователей</a>
                <a href="{{ route('admin.create') }}">Создать пользователя</a>
            </div>
        </div>

        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Магазины <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin.shops.index') }}">Список магазинов</a>
                <a href="{{ route('admin.shops.create') }}">Добавить магазин</a>
            </div>
        </div>

        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Категории <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin.categories.index') }}">Список категорий</a>
                <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
            </div>
        </div>

        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Товары <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin.products.index') }}">Список товаров</a>
                <a href="{{ route('admin.products.create') }}">Добавить товар</a>
            </div>
        </div>

        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Рестораны <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin.restaurants.index') }}">Список ресторанов</a>
                <a href="{{ route('admin.restaurants.create') }}">Добавить ресторан</a>
            </div>
        </div>

        <div class="accordion">
            <h3 onclick="toggleAccordion(this)">Блюда <i class="fas fa-chevron-down"></i></h3>
            <div class="panel">
                <a href="{{ route('admin.dishes.index') }}">Список блюд</a>
                <a href="{{ route('admin.dishes.create') }}">Добавить блюдо</a>
            </div>
        </div>


    </aside>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = document.querySelectorAll('.accordion');

        accordions.forEach(accordion => {
            accordion.querySelector('h3').addEventListener('click', function() {
                const panel = this.nextElementSibling;
                if (panel.style.display === 'block') {
                    panel.style.display = 'none';
                    this.querySelector('i').classList.remove('fa-chevron-up');
                    this.querySelector('i').classList.add('fa-chevron-down');
                } else {
                    panel.style.display = 'block';
                    this.querySelector('i').classList.remove('fa-chevron-down');
                    this.querySelector('i').classList.add('fa-chevron-up');
                }
            });
        });
    });
</script>
