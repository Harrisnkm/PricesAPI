<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as Storage;

class PricesCapture extends Model
{

    protected $downloadPath;
    protected $filename;

    public function setFileName($filename) {

        $this->filename = $filename;
    }

    public function getFileName($filename) {
        return $this->filename;
    }

    public function setDownloadPath($downloadPath){
        $this->downloadPath = $downloadPath;
    }

    public function getDownloadPath($downloadPath){
        return $this->downloadPath;
    }

    public function downloadFile() {
        //wget exec
        $output = shell_exec('wget '.$this->downloadPath);
        //save the file
        Storage::disk('feeschedules')->put($this->filename, $output);
        //get the path
        return Storage::disk('feeschedules')->path($this->filename);

    }

    public function convertToCsv($filename){

    }



}
