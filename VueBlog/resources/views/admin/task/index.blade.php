@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a class="btn btn-secondary" href="{{route('admin.task.create')}}">{{ __('Add') }}</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $task )
                            <tr>
                                <th scope="row">{{$task->id}}</th>
                                <td>{{$task->title}}</td>
                                <td>
                                    <form action="{{ route('admin.task.destroy',$task->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('admin.task.show',$task->id) }}">{{ __('Preview') }}</a>

                                        <a class="btn btn-primary" href="{{ route('admin.task.edit',$task->id) }}">{{ __('Edit') }}</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
