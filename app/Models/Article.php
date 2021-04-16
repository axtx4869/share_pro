<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','image','url','image'];

    /**
     * 
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 記事モデルからユーザモデルへのリレーションを追加
     * @return BelongsToMany
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimestamps();
    }

    /**
     * ユーザが記事をいいね済みかどうかを判定する
     *
     * @param User|null $user
     * @return boolean
     */
    public function isLiked(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    /**
     * 現在のいいね数を算出する
     *
     * @return integer
     */
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    /**
     * 記事モデルからタグモデルへのリレーションを追加
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
}
