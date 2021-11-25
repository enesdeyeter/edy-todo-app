@extends('layout.default')

@section('content')
    <h1 class="text-center">Todo Düzenle</h1><hr>

    <div class="row justify-content-center">
        <div class="col-md-8">
                <form action="{{route('todo-up',$todo->id)}}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="todoTitle" class="form-control" id="todoTitle" placeholder="Todo Başlık" value="{{ $todo->title }}">
                    <label for="todoTitle">Todo Başlık</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="todoContent" placeholder="Todo İçerik" id="todoContent" style="height: 100px" >{{ $todo->content }}</textarea>
                    <label for="todoContent">Todo İçerik</label>
                </div>
                    <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block">Todo Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
