<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@include('admin.layouts.header')

<div class="container">
    @include('admin.layouts.aside')
    <div class="info">
        <h1>Снятие прав администратора</h1>
        <form action="{{ route('admin.take', $user->id) }}" method="post">
            @csrf
            <button type="submit">Снять права администратора</button>
        </form>
    </div>
</div>
