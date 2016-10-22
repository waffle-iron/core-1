<?php

namespace App\Modules\Triage\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table      = "triage_question";
    protected $primaryKey = "id";
    public $timestamps = ["created_at", "updated_at"];
    public $fillable   = [
        "question",
        "answer",
    ];

    public function parent(){
        return $this->morphTo();
    }

    public function children(){
        return $this->morphMany(Question::class, "parent");
    }
}
