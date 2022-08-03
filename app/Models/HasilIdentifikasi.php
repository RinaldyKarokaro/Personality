<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilIdentifikasi extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'identifikasi_id' => 'array',
        'karir' => 'array',
        'kepribadian' => 'array'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}