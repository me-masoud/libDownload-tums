<?php

class DownloadFile{

    private $savePath;

    public function __construct($savePath)
    {
        $this->savePath = $savePath;
    }

    public function downloadFile($url , $fileName)
    {
        $output_filename = './public/img/'.$fileName.'.jpg';
        $host = $url; // <-- Source image url (FIX THIS)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $host);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // <-- don't forget this
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // <-- and this
        $result = curl_exec($ch);
        curl_close($ch);
        $fp = fopen($output_filename, 'wb');
        fwrite($fp, $result);
        fclose($fp);
    }
}