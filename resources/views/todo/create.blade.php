@extends('layout.default')

@section('content')
    <h1 class="text-center">Yeni Todo Oluştur</h1><hr>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <form class="row g-3" action="{{route('todos.store')}}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="todoTitle" class="form-control" id="todoTitle" placeholder="Todo Başlık">
                    <label for="todoTitle">Todo Başlık</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="todoContent" placeholder="Todo İçerik" id="todoContent" style="height: 100px"></textarea>
                    <label for="todoContent">Todo İçerik</label>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block">Todo Ekle</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="col-md-12 mt-50">
            <div>
                <h3>Son eklenen 3 todo <a href="{{route("todos.index")}}" style="float: right">hepsini gör</a></h3>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>İçerik</th>
                    <th>Oluşturma Zamanı</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody>

                @if($lastTheree->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Henüz todo eklemediniz. Yukarıdaki alandan hızlıca ekleyebilirsiniz.
                    </div>
                @else
                    @foreach($lastTheree as $item)
                        <tr>
                            <th scope="row" width="50px">{{ $loop->iteration }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td data-bs-toggle="tooltip" data-bs-placement="top" title="{{ \Carbon\Carbon::create($item->created_at)->format('d/m/Y H:i') }}" >
                                {{ \Carbon\Carbon::create($item->created_at)->diffForHumans() }} <i class="fa fa-info-circle text-muted"></i>
                            </td>
                            <td width="150px">
                                @if( $item->status == 0 )
                                    <span class="badge bg-danger">Tamamlanmadı</span>
                                @else
                                    <span class="badge bg-success">Tamamlandı</span>
                                @endif
                            </td>
                            <td width="120px">
                                <a href="{{ $item->id }}" class="btn btn-sm btn-primary mr-2">Detaylı Gör</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
