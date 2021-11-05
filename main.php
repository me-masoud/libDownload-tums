<?php

require_once "./service/download.php";

$download = new DownloadFile('./public/img');
for($page = 1; $page<260; $page++){
    $url = "http://lib.tums.ac.ir/exImageDraw?startPage=".$page.
        "&endPage=".$page."&scale=100&filePath=null&language=fa&multimediaId=19325471&biblioId=189240";
    $download->downloadFile($url , $page);
}
