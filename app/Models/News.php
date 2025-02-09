<?php


namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    use HasFilter;

    protected $table = 'news';
    protected $fillable = ['title', 'content', 'excerpt', 'image', 'type', 'slug', 'created_by', 'deleted_at', 'is_popup', 'status'];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';

    public function getImage()
    {
        if (isset($this->image)) {
            return uploadedAsset('news', $this->image);
        } else {
            return imageNotFound();
        }
    }

    public function media(): HasMany
    {
        return $this->hasMany(Medias::class, 'news_id', 'id');
    }

}