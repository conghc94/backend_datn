<table class="table table-responsive" id="servers-table">
    <thead>
        <th>Name</th>
        <th>Mac Address</th>
        <th>Customer Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($servers as $server)
        <tr>
            <td>{!! $server->name !!}</td>
            <td>{!! $server->mac_address !!}</td>
            <td>{!! $server->customer_id !!}</td>
            <td>
                {!! Form::open(['route' => ['servers.destroy', $server->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('servers.show', [$server->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('servers.edit', [$server->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>