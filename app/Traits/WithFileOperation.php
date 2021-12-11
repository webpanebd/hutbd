<?php

namespace App\Traits;


trait WithFileOperation{
    public function deleteWithFile(){
      foreach($this->deletable_files as $file){
        if(file_exists($this[$file])){
            unlink($this[$file]);
        };
      }
      $this->delete();
    }
}