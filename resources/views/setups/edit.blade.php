@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Setup status [{{$setup->status}}]
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($setup, ['route' => ['setups.update', $setup->id], 'method' => 'patch']) !!}

                        @include('setups.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection