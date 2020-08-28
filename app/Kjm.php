<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kjm extends Model
{
    protected $fillable =['id_kjm', 'thn_akademik', 'smt_akademik', 'bulan', 'id_dosen', 'jml_sks', 'sks_wajib', 'kelebihan', 'keterangan','kjm','pajak'];
}
