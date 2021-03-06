@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create a customer
        </h1>
    </section>
    <div class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

                        @include('admin.users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
