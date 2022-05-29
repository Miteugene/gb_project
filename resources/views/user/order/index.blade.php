@extends('layouts.main')

@section('title')
@parent - Отзыв
@endsection

@section('content')
    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('user.order.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя пользователя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="phone">Телефон</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="source">Источник</label>
                <input type="text" id="source" name="source" class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}">
                @error('source') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit mb-3" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
