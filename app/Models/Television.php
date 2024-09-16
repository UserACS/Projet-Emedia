<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Television extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'category_id', 'description', 'file_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
