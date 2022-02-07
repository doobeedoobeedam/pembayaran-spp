<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model {
    protected $table = 'spps';
    protected $guarded = ['id'];
    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);
    }
}
