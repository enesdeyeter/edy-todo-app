@extends('layout.default')

@section('content')
    <h1 class="text-center">Kayıt Ol</h1><hr>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('registerPost')}}" method="post" autocomplete="on">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">İsim Soyisim</label>
                    <input type="text" name="name" class="form-control" autocomplete="tel">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-success">Kayıt Ol</button>
            </form>
        </div>
    </div>
@endsection
