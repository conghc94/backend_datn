@if(!empty($user))
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

<div class="form-group">
    <strong>Servers:</strong>
    @if(count($user->servers)>0)
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Server</th>
                <th>Mac Address</th>
                <th>Action</th>
            </tr>
            @foreach($user->servers as $v)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td><a href="{{route('servers.show', [$v->id])}}">{{ $v->name }}</a></td>
                    <td>{{ $v->mac_address }}</td>
                    <td>
                        <a data-toggle="tooltip" title="View more information of server" href="{!! route('information.show', [$v->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
    <p>You don't have any server.</p>
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

@else
<div class="alert alert-danger">User not found!</div>
@endif

