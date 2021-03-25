<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiUang extends Model
{
    use HasFactory;

    protected $table = 'donasi_uang';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'donatur_id',
        'jumlah',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id', 'id');
    }
}