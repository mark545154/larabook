@extends('layouts.app')

@section('menu')
    @parent
@endsection

@section('content')
    <div class="col-12">
        @if(session('errors'))
            @foreach(session('errors')->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}<br>
                </div>
            @endforeach
        @endif

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}<br>
            </div>
        @endif

        {!! Form::model($topic, ['action'=>'TopicController@store']) !!}
        <div class="form-group">
            {!! Form::label('topicnameform','Topic name: ') !!}
            {!! Form::text('topicnameform', '', ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Add topic', ['class'=>'btn btn-primary']) !!}
        {{--        <button type="submit" class="btn btn-primary">Add topic</button>--}}

        {!! Form::close() !!}
    </div>
@endsection
