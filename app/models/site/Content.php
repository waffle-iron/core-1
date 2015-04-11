<?php

namespace Models\Site;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Content extends \Models\aTimelineEntry {

    use SoftDeletingTrait;

    const TYPE_PAGE    = 10;
    const TYPE_SECTION = 30;

    const STATUS_DRAFT   = 10;
    const STATUS_PUBLIC  = 40;
    const STATUS_PRIVATE = 80;

    protected $table      = "site_content";
    protected $primaryKey = "content_id";
    protected $dates      = ['created_at', 'updated_at', 'deleted_at'];



    public function scopeIsPage($query){
        return $query->where("type", "=", self::TYPE_PAGE);
    }

    public function scopeIsSection($query){
        return $query->where("type", "=", self::TYPE_SECTION);
    }

    public function scopeIsDefault($query){
        return $query->where("is_default", "=", 1);
    }

    public function sections(){
        return $this->belongsToMany("\Models\Site\Content", "site_content_section_page", "page_id", "section_id")
                    ->withPivot("sort_order", "important")
                    ->withTimestamps();
    }

    public function children(){
        return $this->belongsToMany("\Models\Site\Content", "site_content_section_page", "section_id", "page_id")
                    ->withPivot("sort_order", "important")
                    ->withTimestamps();
    }

    public function getDefaultPageAttribute(){
        return $this->children()->isDefault()->first();
    }

    public function getDisplayValueAttribute() {
        return "NOT YET DEFINED IN __CONTENT__ MODELS";
    }

}
