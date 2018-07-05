<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ekskulsmp extends Model
{
    protected $table='ekskulsmps';
    protected $fillable=['nama','poto','ekskul_id'];
    public $timestamps=true;

    public function prestasinya()
	{
		return $this->belongsTo('App\prestasinya','ekskul_id');
	}
}
