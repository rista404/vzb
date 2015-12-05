@extends('admin/layout')

@section('main')
<div class="container-fluid main-container">
    <div class="col-md-12 content">
        @if(session('success') !== null)
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{session('success')}}
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Studentske Organizacije <a href="{{url('admin/organization/add')}}" class="btn btn-success pull-right btn-xs">Dodaj</a>
            </div>
            <div class="panel-body">
                <table id="dorms" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($organizations as $ogranization)
                        <tr>
                            <td>{{$ogranization->id}}</td>
                            <td>{{$ogranization->name}}</td>
                            <td><a class="btn btn-success" href="{{url('admin/organization/')}}/{{$ogranization->id}}">Izmeni</a> <a class="btn btn-danger" href="{{url('admin/organization/delete/')}}/{{$ogranization->id}}">Obrisi</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#dorms').DataTable();
        });
    </script>
@endsection