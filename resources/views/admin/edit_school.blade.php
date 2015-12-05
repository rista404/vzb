@extends('admin/layout')

@section('main')
    <div class="container-fluid main-container">
        <div class="col-md-12 content">
            @if(isset($success))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{$success}}
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
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection