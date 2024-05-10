<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Audience;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_name',
        'form_type',
        'file_number',
        'file_number_type',
        'authority_criminal',
        'authority_federal',
        'client_name',
        'client_type',
        'client_email',
        'client_phone',
        'client_address',
        'client_photo',
        'defendant_name',
        'defendant_type',
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
        'honorarium_currency',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function audience(): HasMany
    {
        return $this->hasMany(Audience::class);
    }

}
