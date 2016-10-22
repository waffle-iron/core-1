<?php

namespace App\Modules\Triage\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table      = "triage_category";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $fillable   = [
        "name",
        "parent_id",
    ];

    public function parent(){
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public function children(){
        return $this->hasMany(Category::class, "parent_id", "id");
    }

    public function questions(){
        return $this->morphMany(Question::class, "parent");
    }
}
