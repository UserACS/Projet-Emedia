<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['file_name', 'file_path', 'description', 'category_id'];

    /**
     * Get the category that owns the image.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
