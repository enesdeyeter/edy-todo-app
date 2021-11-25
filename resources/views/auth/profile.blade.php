@extends('layout.default')

@section('content')
    <h1 class="text-center">Profil</h1><hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="{{asset('img/profile.jpeg')}}" width="100" class="rounded-circle">
                    <h3 class="mt-2">{{ $user->name }}</h3> <span class="mt-1 clearfix">{{ $user->email }}</span>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-4 ">
                            <div class="b-border">
                                <h5>Toplam</h5>
                                <span class="num">{{ $totalTodo }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="b-border">
                                <h5 class="text-success">Tamamlanmış</h5>
                                <span class="num">{{ $completedTodo }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="b-border">
                                <h5 class="text-warning">Tamamlanmamış</h5>
                                <span class="num">{{ $uncompletedTodo }}</span>
                            </div>
                        </div>
                    </div>
                    <hr class="line">
                    <small class="mt-4 ">
                        @if($user->role == 0)
                            <span class="bg-secondary p-1 px-4 rounded text-white">Yönetici</span>
                        @else
                            <span class="bg-secondary p-1 px-4 rounded text-white">Kullanıcı</span>
                        @endif
                        <br>
                        <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->created_at->format('d/m/Y H:i')}}">kayıt tarihi: {{ $user->created_at->diffForHumans(\Carbon\Carbon::now()) }} <i class="fa fa-info-circle"></i> </span>
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
