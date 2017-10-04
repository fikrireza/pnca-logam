<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = 'amd_general';

    protected $fillable = ['produk','servis','scrapproduk','scrapservis','email_to','email_cc'];
    
}
