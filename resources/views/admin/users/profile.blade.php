@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Id:') !!}
                        <p>{!! $user->id !!}</p>
                    </div>

                    <!-- Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        <p>{!! $user->name !!}</p>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        <p>{!! $user->email !!}</p>
                    </div>

                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if(!empty($user->roles))
                            @foreach($user->roles as $v)
                                <label class="label label-success">{{ $v->display_name }}</label>
                            @endforeach
                        @endif
                    </div>

                    <!-- Created At Field -->
                    <div class="form-group">
                        {!! Form::label('created_at', 'Created At:') !!}
                        <p>{!! $user->created_at !!}</p>
                    </div>

                    <!-- Updated At Field -->
                    <div class="form-group">
                        {!! Form::label('updated_at', 'Updated At:') !!}
                        <p>{!! $user->updated_at !!}</p>
                    </div>


                    <a href="{!! route('home') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
