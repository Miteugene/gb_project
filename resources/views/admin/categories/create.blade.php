@extends('layouts.admin')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="row">
      <form method="post" action="{{ route('admin.categories.store') }}">
          @csrf
          <div class="form-group mb-3">
              <label for="title">Название категории</label>
              <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
              @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
          </div>
          <button type="submit mb-3" class="btn btn-success">Сохранить</button>
      </form>
  </div>
@endsection
