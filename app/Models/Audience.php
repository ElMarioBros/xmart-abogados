<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LegalCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audience extends Model
{
    use HasFactory;
    protected $fillable = [
        'date'
    ];

    public function legalCase():BelongsTo{
        return $this->belongsTo(LegalCase::class);
    }
}
