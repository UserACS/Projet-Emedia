<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\File;
use App\Models\Television;
use Illuminate\Support\Facades\Log;

class TelevisionController extends Controller
{
    public function index()
    {
        $files = File::with('category')->get();
        return view('television.index', compact('files'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('television.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'file_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,doc,pdf,mp4,mp3|max:2048',
        ]);

        // Enregistrement du fichier
        $path = $request->file('file')->store('files');

        // Sauvegarde des données en base
        $television = new Television();
        $television->file_name = $request->input('file_name');
        $television->category_id = $request->input('category_id');
        $television->description = $request->input('description');
        $television->file_path = $path;  // Stocker le chemin du fichier dans la base de données
        $television->save();

        return redirect()->route('television.index')->with('success', 'Fichier ajouté avec succès!');
    }

    public function destroy($id)
    {
        try {
            $file = File::findOrFail($id);
            $file->delete();

            return redirect()->route('television.index')->with('success', 'Fichier supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Échec de la suppression du fichier : ' . $e->getMessage());
            return redirect()->route('television.index')->with('error', 'Échec de la suppression du fichier.');
        }
    }
}
