@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('LIfe') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a class="btn btn-secondary" href="{{route('admin.life.create')}}">add</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">رنگ</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lifes as $life )
                            <tr>
                                <th scope="row">{{$life->id}}</th>
                                <td>{{$life->title}}</td>
                                <td while="50px" style="background-color: {{$life->color}}" class="p-3"></td>
                                <td>
                                    <form action="{{ route('admin.life.destroy',$life->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('admin.life.show',$life->id) }}">نمایش</a>

                                        <a class="btn btn-primary" href="{{ route('admin.life.edit',$life->id) }}">ویرایش</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">حدف</button>
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
