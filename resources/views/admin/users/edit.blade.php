@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                @error('name') <x-alert type="danger" :message="$message"></x-alert> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                @error('email') <x-alert type="danger" :message="$message"></x-alert> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="is_admin">Админ</label>
                <input type="checkbox" name="is_admin" id="is_admin"
                    @if($user->is_admin) value="1" checked="1" @endif
                >
            </div>
            <button type="submit mb-3" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
