<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:100|unique:categories,name',
            'color' => 'nullable|string|max:7',
        ]);
        $category = Category::create([
            'name'  => $data['name'],
            'color' => $data['color'] ?? '#0a6b63',
        ]);
        if ($request->expectsJson()) {
            return response()->json(['id' => $category->id, 'name' => $category->name, 'color' => $category->color]);
        }
        return back()->with('success', 'Catégorie créée.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        if (request()->expectsJson()) {
            return response()->json(['deleted' => true]);
        }
        return back()->with('success', 'Catégorie supprimée.');
    }
}
