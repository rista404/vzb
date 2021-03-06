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
                    {{$school->name}}
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/school/{{$school->id}}" enctype="multipart/form-data" method="post">
                        {!! csrf_field() !!}
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Autobusi</label>
                                <div class="col-md-4">
                                    <input id="bus" name="bus" type="text" class="form-control input-md" value="{{$school->bus}}">
                                    <span class="help-block">Brojeve odvojite zarezom</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Slike</label>
                                <div class="col-md-4">
                                    {!! Form::file('images[]', array('multiple'=>true)) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Izmeni</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>

                <h3>Slike:</h3>
                <div class="row">
                    @foreach($school->photos as $photo)
                        <div class="col-md-3">
                            <img src="/{{$photo->location}}" alt="" style="width: 100%">
                            <a class="btn btn-danger" href="{{url('admin/delete/photo/'.$photo->id)}}">Obrisi</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection