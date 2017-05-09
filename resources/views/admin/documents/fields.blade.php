<!-- User Id Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('user_id', "User: ") !!}
    {!! Form::text('user_id', null, ['class' => 'form-control ']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id',$categories,null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <?php
        $file = isset($document->type) ? '/uploads/' . $document->type : '/uploads/' . "no-image.png";
    ?>

    <br />
    {!! Form::label('type', 'Type:') !!}
    {!! Form::file('type') !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#view-file').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#type").change(function () {
            readURL(this);
        });
    });
</script>