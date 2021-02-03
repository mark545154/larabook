@extends('layouts.app')
@section('menu')
    @parent
@endsection

@section('content')
    <div class="col-3">
        {!! Form::open(['action'=>'TopicController@search', 'class'=>'form']) !!}
        <div class="input-group">
            {!! Form::text('searchform', '', ['class'=>'form-control', 'placeholder'=>'Введите данные', 'autocomplete'=>'off']) !!}
            <button type="submit" class="btn btn-success btn-sm">поиск</button>
        </div>
        {!! Form::close() !!}

        {{-- список топиков --}}
        <ul class="list-unstyled">
            @foreach($topics as $topic)
                <li>
                    <a href="{{url('topic/'.$topic->id)}}" class="btn-link my-2">
                        {{$topic->topicname}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-9">
        {{-- блоки по выбранному топику --}}
        @if($id != 0)
            <h1 class="text-center">{{$topicname}}</h1>
            <hr>
            @foreach($blocks as $block)
                <div class="p-2">
                    {{-- заголовок блока --}}
                    <h2 class="text-center">{{$block->title}}</h2>

                    {{-- изображение --}}
                    @if($block->imagepath)
                        <img src="{{asset($block->imagepath)}}" alt="block_image" class="img-fluid my-2">
                    @endif

                    {{-- текст --}}
                    <p class="lead">{{$block->content}}</p>

                    @if($is_admin !==0)
                    {{-- кнопка редактирования --}}
                    <a href="{{url('block/'.$block->id.'/edit')}}" class="btn btn-success m-1">Редактировать</a>

                    {{-- кнопка удаления --}}
                    {!! Form::open(['route'=>['block.destroy', $block->id]]) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <button type="submit" class="btn btn-danger m-1">Удалить</button>
                    {!! Form::close() !!}
                    @endif

                </div>
            @endforeach
        @endif
    </div>
@endsection