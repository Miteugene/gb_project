@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Админ</th>
                <th scope="col">Ред.</th>
            </tr>
            </thead>
            <tbody>
            @php
                /**
                 * @var Illuminate\Pagination\LengthAwarePaginator $users
                 * @var \App\Models\User $user
                 */
            @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}" style="font-size: 12px;">Ред.</a>
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red; font-size: 12px;">Уд.</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
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
                        send('/admin/users/' + id).then(() => {
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
