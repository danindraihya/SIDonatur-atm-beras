<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiBeras extends Model
{
    use HasFactory;

    protected $table = 'donasi_beras';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'donatur_id',
        'nominal',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id', 'id');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->setTimezone('Asia/Jakarta')->format('d/m/Y');
    }
}
