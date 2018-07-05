<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestasinya extends Model
{
    protected $table='prestasinyas';
    protected $fillable=['nama','tanggal_prestasi'];
    public $timestamps=true;

    public function ekskul()
	{
		return $this->hasMany('App\ekskul','ekskul_id');
	}
}
