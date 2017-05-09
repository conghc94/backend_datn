@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Information of server: <b>{{ $server->name }} [{{$server->mac_address}}]</b></h1>
        <a href="{!! route('users.show', ['id'=>$server->customer_id]) !!}" class="btn btn-default pull-right">Back</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('information.table')
            </div>
        </div>
    </div>
@endsection

