<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;

class Balasan extends Model
{
    protected $guarded = ['id'];

    public function komentar(){
        return $this->belongsTo(Komentar::class);
    }
}
