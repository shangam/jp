<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function getFilePath($filename){
        return (is_null($filename) || $filename == '') ? null : (url(config('constants.files.UPLOAD_DIR').tenant('id').'/'.$filename));
    }

    public function getDocumentOriginalName($filename){
        if(is_null($filename) || $filename == ''){
            return null;
        }
        return DocumentDetail::where('hash_value', $filename)->first()->pluck('original_name')->first();
    }
}
