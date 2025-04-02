<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentsToUploads extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(DocumentsToUploads::class, 'parent_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(DocumentsToUploads::class, 'parent_id');
    }
}
