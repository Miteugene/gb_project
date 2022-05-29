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
    @include('inc.messages')
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Название</th>
          <th scope="col">Количесво новостей</th>
          <th scope="col">Дата добавления</th>
          <th scope="col">Ред.</th>
        </tr>
      </thead>
      <tbody>
        @php
            /**
             * @var Illuminate\Pagination\LengthAwarePaginator $categoryList
             * @var \App\Models\Category $category
             */
        @endphp
        @forelse($categoryList as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->news_count }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Ред.</a>
                <a href="javascript:;" class="delete" rel="{{ $category->id }}" style="color:red; font-size: 12px;">Уд.</a>
            </td>
          </tr>
        @empty
        <tr>
          <td colspan="4">Записей нет</td>
        </tr>
      @endforelse
      </tbody>
    </table>
      {{ $categoryList->links() }}
  </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            const delButtons = document.querySelectorAll(".delete");
            delButtons.forEach((item) => {
                item.addEventListener('click', function() {
                    console.log(123);
                    const id = this.getAttribute('rel');
                    if (confirm('Вы уверены?')) {
                        send('/admin/categories/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.success;
        }
    </script>
@endpush
