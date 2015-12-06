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
                    Izmeni dogadjaj
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/event/{{$event->id}}" method="post">
                        {!! csrf_field() !!}
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="textinput">Ime</label>
                                <div class="col-md-4">
                                    <input id="name" name="name" type="text" class="form-control input-md" value="{{$event->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="textinput">Lokacija</label>
                                <div class="col-md-4">
                                    <input id="location" name="location" type="text" class="form-control input-md" value="{{$event->location}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="textinput">Datum/Vreme</label>
                                <div class="col-md-4">
                                    <input id="time_date" name="time_date" type="text" class="form-control input-md" value="{{$event->time_date}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="textinput">Opis</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" class="form-control input-md">{{$event->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Sacuvaj</button>
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
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection