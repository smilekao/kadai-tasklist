@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        {{ $user->name }}
        
        <div class="row">
            <aside class="col-xs-4">
                {!! Form::open(['route' => 'tasks.store']) !!}
                
                　　<!--
                    <div class="form-group">
                        {!! Form::textarea('status', old('status'), ['class' => 'form-control', 'rows' => '1']) !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    {!! Form::submit('新規タスクを登録', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
                -->
                
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
            </aside>
            <div class="col-xs-8">
        
    @else
        <div class="center jumbotron">
            <div class="col-xs-8">
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
            </div>
            <div class="text-center">
                <h1>Welcome to the TaskList</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection