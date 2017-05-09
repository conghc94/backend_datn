<?php use App\Components\Convert; ?>
<table class="table table-responsive" id="documents-table">
    <thead>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>Type</th>
        <th>Size</th>
        <th>View Count</th>
        <th>Dowload Count</th>
        <th>Tags</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->user->name !!}</td>
            <td>{!! $document->category->name !!}</td>
            <td>{!! $document->title !!}</td>
            <td>{!! $document->description !!}</td>
            <td>{!! $document->type !!}</td>
            <td>{!! Convert::formatBytes($document->size) !!}</td>
            <td>{!! $document->view_count !!}</td>
            <td>{!! $document->dowload_count !!}</td>
            <td>{!! $document->tags !!}</td>
            <td>
                {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documents.show', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documents.edit', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>