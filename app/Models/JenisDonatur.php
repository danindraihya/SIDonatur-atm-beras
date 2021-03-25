<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDonatur extends Model
{
    use HasFactory;

    protected $table = 'jenis_donatur';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'label',
    ];

    public function listDonatur()
    {
        return $this->hasMany(Donatur::class, 'jenis_donatur_id', 'id');
    }
}
