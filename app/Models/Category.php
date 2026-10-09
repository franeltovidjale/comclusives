<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model {
    protected $fillable = ['name', 'slug', 'color'];

    protected static function booted() {
        static::creating(fn($c) => $c->slug ??= Str::slug($c->name));
    }

    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
