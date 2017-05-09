<table class="table table-responsive" id="information-table">
    <thead>
        <th>No.</th>
        <th>Date and time</th>
        <th>Sql Server Utilization(%)</th>
        <th>System Idle Process(%)</th>
        <th>Other Process Cpu(%)</th>
        <th>Total Physical Memory(MB)</th>
        <th>Available Physical Memory(MB)</th>
        <th colspan="3">Delete</th>
    </thead>
    <tbody>
    @foreach($information as $infor)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $infor->created_at !!}</td>
            <td>{!! $infor->sql_server_utilization !!}</td>
            <td>{!! $infor->system_idle_process !!}</td>
            <td>{!! $infor->other_process_cpu !!}</td>
            <td>{!! $infor->total_physical_memory !!}</td>
            <td>{!! $infor->available_physical_memory !!}</td>
            <td>
                {!! Form::open(['route' => ['information.destroy', $infor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $information->links() }}