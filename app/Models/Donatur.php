<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donatur';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'jenis_donatur_id',
        'nama',
        'alamat',
        'nomor_ponsel',
    ];

    public function jenisDonatur()
    {
        return $this->belongsTo(JenisDonatur::class, 'jenis_donatur_id', 'id');
    }

    public function listDonasiUang()
    {
        return $this->hasMany(DonasiUang::class, 'donatur_id', 'id');
    }

    public function listDonasiBeras()
    {
        return $this->hasMany(DonasiBeras::class, 'donatur_id', 'id');
    }
}
