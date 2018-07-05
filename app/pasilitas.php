<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasilitas extends Model
{
    protected $table='pasilitas';
    protected $fillable=['nama','poto','kategoripasilitas_id','deskripsi'];
    public $timestamps=true;

    public function kategori_pasilitas()
	{
		return $this->belongsTo('App\kategori_pasilitas','kategoripasilitas_id');
	}
}
