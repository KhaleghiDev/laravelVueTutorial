@extends('layouts.app')

@section('content')
<div class="container">
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

                    <div class="row">

                        <form method="POST" action="{{ route('admin.task.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $task->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- end titile -->

                            <div class="row mb-3">
                                <label for="time_start" class="col-md-4 col-form-label text-md-end">{{ __('Time_Start') }}</label>

                                <div class="col-md-6">
                                    <input id="time_start" type="datetime-local" class="form-control @error('time_start') is-invalid @enderror" name="time_start" value="{{ old('time_start') }}" required autocomplete="time_start" autofocus>

                                    @error('time_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end time_start -->
                            <div class="row mb-3">
                                <label for="time_end" class="col-md-4 col-form-label text-md-end">{{ __('Time_End') }}</label>

                                <div class="col-md-6">
                                    <input id="time_end" type="datetime-local" class="form-control @error('time_end') is-invalid @enderror" name="time_end" value="{{ old('time_end') }}" required autocomplete="time_end" autofocus>

                                    @error('time_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end time_end -->
                            <div class="row mb-3">
                                <label for="namber" class="col-md-4 col-form-label text-md-end">{{ __('namber') }}</label>

                                <div class="col-md-6">
                                    <input id="namber" type="int" class="form-control @error('namber') is-invalid @enderror" name="namber" value="{{ $task->namber }}" required autocomplete="namber" autofocus>

                                    @error('namber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end namber -->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>

                            <!-- //end form -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
