@extends('layout.default')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
        <div class="alert alert-secondary" role="alert">
            yönetici olduğunuz için ilk tabloda tüm todo'ları görebiliyorsunuz. ikinci tabloda size ait todo'ları görebilirsiniz.
        </div>
        <h1 class="text-center">Tüm Todo'lar</h1><hr>
    @else
        <h1 class="text-center">Todo'larınız</h1><hr>
    @endif

    <table class="table table-bordered table-hover" id="todos-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Todo Başlık</th>
            <th>Todo İçerik</th>
            <th>Durum</th>
            <th>-</th>
        </tr>
        </thead>
    </table>

    <hr>

    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
        <h1 class="text-center">Sizin Todo'larınız</h1><hr>
        <table class="table table-bordered table-hover" id="admin-todos-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Todo Başlık</th>
                <th>Todo İçerik</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
            </thead>
        </table>
    @endif
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#todos-table').DataTable({
                "language":{
                    "url":"//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
                },
                "processing": true,
                "serverSide": true,
                "scrollX": true,
                ajax: '{{ route('getTodosRecord') }}',
                columns: [
                    { data: 'id'},
                    { data: 'title' },
                    { data: 'content' },
                    { data: "status",
                        render: function (data, type, row) {
                            if (data == 0) {
                                return '<span class="badge bg-danger">Tamamlanmadı</span>';
                            }
                            else if (data == 1) {
                                return '<span class="badge bg-success">Tamamlandı</span>';
                            }
                            return '<span class="badge badge-dark">Diğer</span>';
                        }
                    },
                    { data: 'id' },
                ],
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                columnDefs: [
                    { "targets": 0, "width": "20px"},
                    { "targets": 4,
                        "width": "160px",
                        render: function(data) {
                            return  '<a href="todos/'+data+'" class="btn btn-sm btn-primary mr-2">Detaylı Gör</a> <a href="del/'+data+'" class="btn btn-sm btn-secondary mr-2" onclick="return confirm()">Sil</a>'

                        }
                    },
                ],
                @endif

            });
        });

        $(function() {
            $('#admin-todos-table').DataTable({
                "language":{
                    "url":"//cdn.datatables.net/plug-ins/1.10.12/i18n/Turkish.json"
                },
                "processing": true,
                "serverSide": true,
                "scrollX": true,
                ajax: '{{ route('getAdminTodosRecord') }}',
                columns: [
                    { data: 'id'},
                    { data: 'title' },
                    { data: 'content' },
                    { data: "status",
                        render: function (data, type, row) {
                            if (data == 0) {
                                return '<span class="badge bg-danger">Tamamlanmadı</span>';
                            }
                            else if (data == 1) {
                                return '<span class="badge bg-success">Tamamlandı</span>';
                            }
                            return '<span class="badge badge-dark">Diğer</span>';
                        }
                    },
                    { data: 'id' },
                ],
                columnDefs: [
                    { "targets": 0, "width": "20px"},
                    { "targets": 4,
                        "width": "140px",
                        render: function(data) {
                        var dasdca = "comfirm?"
                            return  '<a href="todos/'+data+'" class="btn btn-sm btn-primary mr-2">Detaylı Gör</a> <a href="del/'+data+'" class="btn btn-sm btn-secondary mr-2" onclick="return confirm('+dasdca+')">Sil</a>'

                        }
                    },
                ],
            });
        });
    </script>

@endsection
