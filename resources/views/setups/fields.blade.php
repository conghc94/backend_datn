<!-- Sql Server Utilization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sql_server_utilization', 'Sql Server Utilization(%):') !!}
    {!! Form::text('sql_server_utilization', null, ['class' => 'form-control']) !!}
</div>

<!-- System Idle Process Field -->
<div class="form-group col-sm-6">
    {!! Form::label('system_idle_process', 'System Idle Process(%):') !!}
    {!! Form::text('system_idle_process', null, ['class' => 'form-control']) !!}
</div>

<!-- Other Process Cpu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('other_process_cpu', 'Other Process Cpu(%):') !!}
    {!! Form::text('other_process_cpu', null, ['class' => 'form-control']) !!}
</div>

<!-- Available Physical Memory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('available_physical_memory', 'Available Physical Memory(%):') !!}
    {!! Form::text('available_physical_memory', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('setups.index') !!}" class="btn btn-default">Cancel</a>
</div>
