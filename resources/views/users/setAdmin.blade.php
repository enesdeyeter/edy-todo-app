@extends('layout.default')
@section('content')
    <h1 class="text-center">Yönetici Yap</h1><hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Adı Soyadı</th>
            <th scope="col">Email</th>
            <th scope="col">Rolü</th>
            <th scope="col">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUsers as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if( $user->role == 0 )
                        <span class="badge bg-primary">Yönetici</span>
                    @else
                        <span class="badge bg-secondary">Kullanıcı</span>
                    @endif
                </td>
                <td width="160">
                    @if($user->role == 0)
                        <a href="setUser/{{ $user->id }}" class="btn btn-sm btn-secondary mr-2" onclick="return confirm('Yöneticiyi kullanıcı yapmayı onaylıyor musunuz?')">Kullanıcı Yap</a>
                    @else
                        <a href="setAdmin/{{ $user->id }}" class="btn btn-sm btn-success mr-2" onclick="return confirm('Kullanıcı yönetici yapmayı onaylıyor musunuz?')">Yönetici Yap</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
