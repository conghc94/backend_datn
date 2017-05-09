<?php
    $filename = "teste";
    $extension = ".doc";
    $output = array();
    $return_var = 0;

    exec("/home/backend/public/uploads\python/public_html/docpdf/adocpdf {$filename} {$extension}", $output, $return_var);
    print_r($output);
    print($return_var);