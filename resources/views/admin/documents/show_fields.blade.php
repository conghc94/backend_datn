<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $document->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Name user:') !!}
    <p>{!! $document->user->name !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Name category:') !!}
    <p>{!! $document->category->name !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $document->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $document->description !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $document->type !!}</p>
</div>

<!-- Size Field -->
<div class="form-group">
    {!! Form::label('size', 'Size:') !!}
    <p>{!! $document->size !!}</p>
</div>

<!-- View Count Field -->
<div class="form-group">
    {!! Form::label('view_count', 'View Count:') !!}
    <p>{!! $document->view_count !!}</p>
</div>

<!-- Dowload Count Field -->
<div class="form-group">
    {!! Form::label('dowload_count', 'Dowload Count:') !!}
    <p>{!! $document->dowload_count !!}</p>
</div>

<!-- Tags Field 
<div class="form-group">
    Form::label('tags', 'Tags:') 
    <p> $document->tags </p>
</div>
-->
<!--<div class="form-group">
    
    <a  class="btn btn-large pull-right">
        <i class="icon-download-alt"></i>
    </a>
</div>-->
<div class="form-group">
    {!! Form::label('dowload_document', 'Dowload document: ') !!} <br />
    <a href="{{ route('document.download', [$document->id]) }}" class="btn btn-default">Download</a>
</div>

<!--view demo-->
<div style="clear:both" class="text-center">
    <iframe id="viewer" frameborder="0" scrolling="no" width="700" height="600" src=""></iframe>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $document->updated_at !!}</p>
</div>
