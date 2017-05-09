@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Document
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.documents.show_fields')
                    <a href="{!! route('documents.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
//        function PreviewImage() {
//            pdffile=document.getElementById("uploadPDF").files[0];
//            pdffile_url=URL.createObjectURL(pdffile);
//            //alert(pdffile_url);
//            $('#viewer').attr('src',pdffile_url);
//        }
        $(document).ready(function(){
            $('#viewer').attr('src',{!! "'". $file_path . "'" !!});
        });
        
    </script>
@endsection