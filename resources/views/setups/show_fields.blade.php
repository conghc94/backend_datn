<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $setup->id !!}</p>
</div>

<!-- Sql Server Utilization Field -->
<div class="form-group">
    {!! Form::label('sql_server_utilization', 'Sql Server Utilization:') !!}
    <p>{!! $setup->sql_server_utilization !!}</p>
</div>

<!-- System Idle Process Field -->
<div class="form-group">
    {!! Form::label('system_idle_process', 'System Idle Process:') !!}
    <p>{!! $setup->system_idle_process !!}</p>
</div>

<!-- Other Process Cpu Field -->
<div class="form-group">
    {!! Form::label('other_process_cpu', 'Other Process Cpu:') !!}
    <p>{!! $setup->other_process_cpu !!}</p>
</div>

<!-- Available Physical Memory Field -->
<div class="form-group">
    {!! Form::label('available_physical_memory', 'Available Physical Memory:') !!}
    <p>{!! $setup->available_physical_memory !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $setup->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $setup->updated_at !!}</p>
</div>

