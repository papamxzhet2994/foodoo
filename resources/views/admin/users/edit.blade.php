<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@include('admin.layouts.header')

<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Редактирование пользователя</h1>
        @if (!$user->is_admin)
        <form action="{{ route('admin.update', $user->id) }}" method="post">
            @csrf
            <div>
                <label for="is_admin">Выдать пользователю права администратора</label>
            </div>
            <div>
                <button type="submit">Сделать администратором</button>
            </div>
        </form>
        @else
        <form action="{{ route('admin.take', $user->id) }}" method="post">
            @csrf
            <label for="is_admin">Снять права администратора</label>
            <button type="submit">Снять права администратора</button>
        </form>
        @endif
    </div>
</div>
