<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<title>Панель администратора</title>
@include('admin.layouts.header')
<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Список пользователей</h1>
        <table>
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Аккаунт создан в:</th>
                <th>Администратор</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->last_name . ' ' . $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                    <td><a href="{{ route('admin.delete', $user->id) }}" class="delete">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

