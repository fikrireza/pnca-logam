<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'amd_kontak';

    protected $fillable = ['nama', 'email', 'telepon', 'subyek', 'pesan', 'flag_read'];
}
