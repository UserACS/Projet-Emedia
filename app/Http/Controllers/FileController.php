<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class FileController extends Controller
{
    public function showByCategory($category)
    {
        \Log::info('showByCategory called with category: ' . $category);
        // Vérifier que la catégorie existe
        $category = Category::where('name', $category)->firstOrFail();

        // Récupérer tous les fichiers qui appartiennent à cette catégorie
        $files = File::where('category_id', $category->id)->get();

        // Retourner la vue avec les fichiers et la catégorie
        return view('fichiers.index', compact('files', 'category'));
    }



    public function store(Request $request)
    {
        Log::info('Entrée dans la fonction store');
    
        // Validation des fichiers avec plus de flexibilité et grande taille autorisée
        $request->validate([
            'file' => 'required|file|max:314572800', // Max 300MB ou ajuster en fonction du besoin
            'category_id' => 'required|exists:categories,id',
        ]);
    
        Log::info('Validation réussie');
    
        // Vérification de la présence d'un fichier dans la requête
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            Log::info('Fichier trouvé : ' . $file->getClientOriginalName());
    
            // Générer un nom de fichier unique
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Stocker le fichier dans le répertoire 'files' du disque public
            $filePath = $file->store('files', 'public');
    
            Log::info('Fichier stocké à : ' . $filePath);
    
            // Enregistrer les informations du fichier dans la base de données
            File::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
            ]);
    
            Log::info('Informations du fichier enregistrées en base de données');
    
            // Retourner un message de succès
            return back()->with('success', 'Fichier uploadé et enregistré avec succès!');
        }
    
        Log::info('Aucun fichier trouvé dans la requête');
    
        // Retourner un message d'erreur si aucun fichier n'a été trouvé
        return back()->with('error', 'Erreur lors de l\'upload du fichier.');
    }
    
    

public function view($id)
{
    $file = File::findOrFail($id);

    // Vérification du type de fichier pour définir la vue appropriée
    $fileType = $file->type; // Type de fichier (image, video, audio, document)
    $files = Storage::files('public/files');
     
    return view('fichiers.view', compact('file', 'fileType'));
}


        public function search(Request $request, $categoryId)
    {
        $query = $request->input('query');

        // Récupérer les fichiers qui correspondent à la recherche et à la catégorie
        $files = File::where('category_id', $categoryId)
                    ->where('file_name', 'like', "%{$query}%")
                    ->get(); 

        // Renvoyer la vue avec les fichiers trouvés
        $category = Category::find($categoryId);
        return view('fichiers.index', compact('files', 'category'));
    }
 
}