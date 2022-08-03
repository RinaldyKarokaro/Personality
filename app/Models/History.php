<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class History extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'kepribadian_id' => 'array',
        'poin' => 'array'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
