<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengusulan extends Model
{
    use HasFactory;
    protected $table = 'usulan';
    protected $casts = [
        "id" => "string"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'satker_approval','id');
    }

    public function scopeTotal($query)
    {
        return $query->whereIn('status_usulan', ["12","13","16"]);
    }

    public function scopeDisetujui($query)
    {
        return $query->whereIn('status_usulan', ["16"]);
    }

    public function scopeDitolak($query)
    {
        return $query->whereIn('status_usulan', ["13"]);
    }

    public function scopeDiproses($query)
    {
        return $query->whereIn('status_usulan', ["13","16"]);
    }

    public function scopeBelumDiproses($query)
    {
        return $query->whereIn('status_usulan', ["12"]);
    }
}
