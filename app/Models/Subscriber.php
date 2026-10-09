<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscriber extends Model {
    protected $fillable = ['email','name','token','confirmed','confirmed_at'];
    protected $casts = ['confirmed' => 'boolean', 'confirmed_at' => 'datetime'];

    protected static function booted() {
        static::creating(fn($s) => $s->token = Str::random(64));
    }

    public function scopeConfirmed($q) { return $q->where('confirmed', true); }
}
