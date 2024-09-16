<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios'; // Nom de la table dans la base de données
    protected $fillable = ['name', 'type', 'path'];

    /**
     * Get the category that owns the audio.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
