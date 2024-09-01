<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medias extends Model
{
    use HasFactory;


    protected $table = 'medias';
    protected $appends = ['url'];

    protected $fillable = [
        'name',
        'original_name',
        'mime_type',
        'path',
        'collection',
        'disk',
        'post_id',
        'news_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
