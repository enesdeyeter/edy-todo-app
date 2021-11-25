@extends('layout.default')

@section('content')
    <h1 class="text-center">{{ $todo->title }}</h1><hr>

    <form action="" method="">
        <div class="card text-center">
            <div class="card-header">
                @if($todo->status !=0 )
                    <span class="badge bg-success">Tamamlanma Zamanı: {{ \Carbon\Carbon::create($todo->updated_at)->format('d/m/Y H:i') }} </span>
                @else
                    <span class="badge bg-danger">Tamamlanmadı</span>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $todo->title }}</h5>
                <p class="card-text">{{ $todo->content }}</p>
                @if($todo->status != 1)
                    <a href="{{ route('completeTodo',[$todo->id]) }}" class="btn btn-sm btn-success px-3" onclick="return confirm('Onaylıyor musunuz?')">Todo'yu tamamlamak için tıklayınız</a>
                    <a href="{{ route('todos.edit',[$todo->id]) }}" class="btn btn-sm btn-warning px-3">Todo'yu güncellemek için tıklayınız</a>
                @endif
            </div>
            <div class="card-footer text-muted" >
                Oluşturma Tarihi: {{ \Carbon\Carbon::create($todo->created_at)->format('d/m/Y H:i') }}
            </div>
        </div>
    </form>
@endsection
