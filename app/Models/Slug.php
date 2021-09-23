<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slug extends Model
{

    use HasFactory;

    protected $fillable = [
        "slugable_id",
        "slugable_type",
        "language_id",
        "slug"
    ];

    public $timestamps = false;

    public $with = ["language"];

    public function slugable()
    {
        return $this->morphTo();
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}