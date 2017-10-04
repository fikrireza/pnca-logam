<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'amd_layanan';

    protected $fillable = ['kategori','nama','deskripsi','img_url','img_alt','slug'];


}
