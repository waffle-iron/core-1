<?php

namespace App\Modules\Triage\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Malahierba\PublicId\PublicId;

class Article extends Model
{
    use PublicId, Searchable;

    static protected $public_id_salt       = 'vatsim-uk-triage-articles';
    static protected $public_id_min_length = 10;
    static protected $public_id_alphabet   = 'upper_alphanumeric';

    protected $table      = "triage_article";
    protected $primaryKey = "id";
    public $timestamps = ["created_at", "updated_at"];
    public $fillable   = [
        "title",
        "content",
        "is_visibile",
        "is_public",
    ];

    public function scopePublic($query){
        return $query->where("is_public", "=", 1);
    }

    public function scopePrivate($query){
        return $query->where("is_private", "=", 1);
    }

    public function toSearchableArray(){
        $array = $this->toArray();

        return $array;
    }

    public function category(){
        return $this->belongsTo(\App\Modules\Triage\Models\Category::class, "category_id", "id");
    }
}
