@extends('layouts.main')

@section('title')
@parent - Отзыв
@endsection

@section('content')
    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('user.feedback.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя пользователя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <x-alert type="danger" :message="$message"></x-alert> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="text">Комментарий</label>
                <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
                @error('text') <x-alert type="danger" :message="$message"></x-alert> @enderror
            </div>
            <button type="submit mb-3" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
