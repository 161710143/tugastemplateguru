<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_pasilitas extends Model
{
     protected $table='kategori_pasilitas';
    protected $fillable=['nama_pasilitas'];
    public $timestamps=true;

	public function pasilitas()
	{
		return $this->hasMany('App\pasilitas','kategoripasilitas_id');
	}
}
