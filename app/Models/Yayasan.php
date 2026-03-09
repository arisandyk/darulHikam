<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    protected $guarded = ['id'];
    public function sekolahs()
    {
        return $this->hasMany(Sekolah::class);
    }
}
