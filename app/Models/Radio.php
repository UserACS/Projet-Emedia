<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    use HasFactory;

    // Spécifie la table si elle n'est pas nommée 'radios' dans la base de données
    protected $table = 'files';

    // Liste des colonnes qui peuvent être massivement assignées
    protected $fillable = [
        'file_name',
        'category_id',
        'description',
        'file_path',
    ];

    // Si tu utilises une clé primaire différente de 'id', spécifie-la ici
    // protected $primaryKey = 'your_primary_key';

    // Relation avec le modèle Category (si tu as une table des catégories)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
