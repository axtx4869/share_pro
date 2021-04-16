<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * ハッシュタグ表示のアクセサ
     *
     * @return string
     */
    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }

    /**
     * タグモデルに記事モデルへのリレーションを追加
     *
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Article')->withTimestamps();
    }
}
