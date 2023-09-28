<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=[

        'title',
        'slug',
        'description',
        'type_id',
        'img',

    ];

    protected $appends=[
        'Full_Img'
    ];

    public function getFullImgAttribute(){
        return asset("/storage/$this->img");
    }

    public function type() {
        return $this->belongsTo(Type::class);
        
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
