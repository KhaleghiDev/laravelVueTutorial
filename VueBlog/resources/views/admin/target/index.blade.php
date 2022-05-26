@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Action Target') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a class="btn btn-secondary" href="{{route('admin.target.create')}}">{{ __('Add') }}</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">هدف</th>
                                <th scope="col"></th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($targets as $target )
                            <tr>
                                <th scope="row">{{$target->id}}</th>
                                <td>{{$target->title}}</td>
                                <td>{{$target->time}}</td>
                                <td>
                                    <form action="{{ route('admin.target.destroy',$target->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('admin.target.show',$target->id) }}">{{ __('Preview') }}</a>

                                        <a class="btn btn-primary" href="{{ route('admin.target.edit',$target->id) }}">{{ __('Edit') }}</a>

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
