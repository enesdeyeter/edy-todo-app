<!doctype html>
<html lang=tr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4e3532a199.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <style>
        a{
            text-decoration: none;
        }
        .mr-5{
            margin-right: 5px !important;
        }

        .mr-10{
            margin-right: 10px !important;
        }

        .mt-50{
            margin-top: 50px !important;
        }
        .mb-50{
            margin-bottom: 50px !important;
        }

        .ptb-40{
            padding: 40px 0 !important;
        }
        .b-border{
            border: 1px solid #eee;
            padding: 15px 0;
            border-radius: 4px;
        }
        .b-border .num{
            font-weight: bolder;
            font-size: 24px;
        }
    </style>
</head>
<body class="">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">edy todo list</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Anasayfa</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Todo List
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('todos.index')}}">Görüntüle</a></li>
                            {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('todos.create')}}">Liste Öğesi Ekle</a></li>
                        </ul>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kullanıcılar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('users')}}">Görüntüle</a></li>
                                {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('users')}}">Yönetici Yap</a></li>
                            </ul>
                        </li>
                    @endif

                @endif
            </ul>
            <form class="d-flex">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                        <a  class="btn btn-dark mr-10 disabled" >Yönetici</a>

                    @endif
                    <a href="{{route('todos.create')}}" class="btn btn-success mr-10">Yeni Todo Ekle</a>
                    <a href="{{route('profile')}}" class="btn btn-outline-secondary mr-10">Profil</a>
                    <a href="{{route('logout')}}" class="btn btn-outline-danger">Çıkış Yap</a>
                @else
                    <a href="{{route('register')}}" class="btn btn-outline-success mr-10">Kayıt Ol</a>
                    <a href="{{route('login')}}" class="btn btn-outline-primary">Giriş Yap</a>
                @endif

            </form>
        </div>
    </div>
</nav>

<div class="container-xxl">




<div class="container-xxl ptb-40">

    @yield('content')
</div>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2021 enes bilaloğulları</p>


        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="https://github.com/enesdeyeter" class="nav-link px-2 text-muted">GitHub</a></li>
            <li class="nav-item"><a href="https://www.linkedin.com/in/enesbilalogullari/" class="nav-link px-2 text-muted">Linkedin</a></li>
{{--            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>--}}
{{--            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>--}}
{{--            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>--}}
        </ul>
    </footer>
</div>

</div>


<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}

@yield('scripts')


<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
</body>
</html>
