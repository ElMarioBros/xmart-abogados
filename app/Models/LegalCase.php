<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_name',
        'form_type',
        'file_number',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
        'client_photo',
        'defendant_name',
        'defendant_email',
        'defendant_phone',
        'defendant_address',
        'defendant_photo',
        'payer_name',
        'payer_email',
        'payer_phone',
        'payer_address',
        'payer_photo',
        'observations',
        'law_firm_validation',
        'drawer_number',
        'satisfaction_level',
        'honorarium',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

}