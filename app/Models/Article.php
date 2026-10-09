<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Article extends Model {
    protected $fillable = [
        'user_id','title','slug','excerpt','content','cover_image','cover_alt',
        'meta_title','meta_description','status','newsletter_sent','published_at','views',
    ];
    protected $casts = ['published_at' => 'datetime', 'newsletter_sent' => 'boolean'];

    protected static function booted() {
        static::creating(function ($a) {
            $a->slug ??= Str::slug($a->title);
            $a->meta_title ??= $a->title;
            $a->meta_description ??= $a->excerpt;
        });
    }

    public function scopePublished(Builder $q) {
        return $q->where('status', 'published')->whereNotNull('published_at');
    }

    public function categories() { return $this->belongsToMany(Category::class); }
    public function comments()   { return $this->hasMany(Comment::class); }
    public function approvedComments() { return $this->hasMany(Comment::class)->where('approved', true)->whereNull('parent_id')->with('replies'); }
    public function author()     { return $this->belongsTo(User::class, 'user_id'); }

    public function getCoverUrlAttribute(): ?string {
        if (!$this->cover_image) return null;
        if (str_starts_with($this->cover_image, 'http')) return $this->cover_image;
        if (str_starts_with($this->cover_image, 'articles/')) return asset('storage/'.$this->cover_image);
        return asset('images/'.$this->cover_image);
    }

    public function incrementViews() {
        $this->increment('views');
    }
}
