@extends('admin/layout')

@section('main')
<div class="container-fluid main-container">
    <div class="col-md-12 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Schools
            </div>
            <div class="panel-body">
                <table id="schools" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Autobusi</th>
                            <th>Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{$school->id}}</td>
                            <td>{{$school->name}}</td>
                            <td>{{$school->bus}}</td>
                            <td><a class="btn btn-success" href="{{url('admin/school/')}}/{{$school->id}}">Izmeni</a></td>
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
            $('#schools').DataTable();
        });
    </script>
@endsection