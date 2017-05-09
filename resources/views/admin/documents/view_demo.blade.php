<!DOCTYPE html>
  <html lang="en">
    <head>
        <title>JavaScript PDF Viewer Demo</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            function PreviewImage() {
                pdffile=document.getElementById("uploadPDF").files[0];
                pdffile_url=URL.createObjectURL(pdffile);
                alert(pdffile_url);
                $('#viewer').attr('src',pdffile_url);
            }
            $(document).ready(function(){
                $("#uploadPDF").change(function(){
                    PreviewImage();
                });
                $('#viewer').attr('src',{!! "'". $file . "'" !!});
            });
        </script>
    </head> 
    <body>
        <input id="uploadPDF" type="file" name="myPDF"  />
       
        <div style="clear:both">
            <iframe id="viewer" frameborder="0" scrolling="no" width="400" height="600" src=""></iframe>
        </div>
    </body>
</html>