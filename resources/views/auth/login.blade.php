@extends('layout.default')

@section('content')
    <h1 class="text-center">Giriş Yapın</h1><hr>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('loginPost')}}" method="post" autocomplete="on">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    {{--            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" name="password" class="form-control" minlength="8" required>
                </div>
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
            </form>
        </div>
    </div>
@endsection
