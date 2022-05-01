@extends('layouts.admin')
@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Название</th>
          <th scope="col">Дата добавления</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
@endsection
