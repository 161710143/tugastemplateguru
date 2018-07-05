<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataguru extends Model
{
    protected $table='datagurus';
    protected $fillable=['nama_guru','jabatan','poto'];
    public $timestamps=true;
}
