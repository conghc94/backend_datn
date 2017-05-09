<table class="table table-responsive" id="setups-table">
    <thead>
        <th>Status</th>
        <th>Sql Server Utilization(%)</th>
        <th>System Idle Process(%)</th>
        <th>Other Process Cpu(%)</th>
        <th>Available Physical Memory(%)</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($setups as $setup)
        <tr>
            <td><label class="label label-{!! $setup->status !!}">{{$setup->status}}</label></td>
            <td>{!! $setup->sql_server_utilization !!}</td>
            <td>{!! $setup->system_idle_process !!}</td>
            <td>{!! $setup->other_process_cpu !!}</td>
            <td>{!! $setup->available_physical_memory !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('setups.edit', [$setup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>