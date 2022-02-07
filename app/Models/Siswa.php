<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model {
    protected $table = "siswas";
    protected $guarded = ['id'];
    // public function getRouteKeyName() {
    //     return 'nisn';
    // }
    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
    public function transaksi() {
        return $this->hasMany(Pembayaran::class);
    }
}
