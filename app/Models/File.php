<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_name', 
        'file_path', 
        'description', 
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
