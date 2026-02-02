<?php

namespace App\Http\Controllers\AdminUI;

use App\Http\Controllers\AdminUI\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends AdminBaseController
{
    public function index()
    {
        if ($r = $this->ensureAdmin()) return $r;
        $categories = Category::orderBy('order')->paginate(20);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        if ($r = $this->ensureAdmin()) return $r;
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'icon' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            $filename = \App\Services\CategoryImageService::storeUploaded($request->file('icon'));
            $data['icon'] = $filename;
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created');
    }

    public function edit($id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $c = Category::findOrFail($id);
        return view('admin.categories.edit', ['c' => $c]);
    }

    public function update(Request $request, $id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $c = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            if ($c->icon) {
                if (\Storage::disk('public')->exists('categories/originals/' . $c->icon)) {
                    \Storage::disk('public')->delete('categories/originals/' . $c->icon);
                }
                if (\Storage::disk('public')->exists('categories/thumb/' . $c->icon)) {
                    \Storage::disk('public')->delete('categories/thumb/' . $c->icon);
                }
            }
            $filename = \App\Services\CategoryImageService::storeUploaded($request->file('icon'));
            $data['icon'] = $filename;
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $c->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated');
    }

    public function destroy($id)
    {
        if ($r = $this->ensureAdmin()) return $r;
        $c = Category::findOrFail($id);
        if ($c->icon) {
            if (\Storage::disk('public')->exists('categories/originals/' . $c->icon)) {
                \Storage::disk('public')->delete('categories/originals/' . $c->icon);
            }
            if (\Storage::disk('public')->exists('categories/thumb/' . $c->icon)) {
                \Storage::disk('public')->delete('categories/thumb/' . $c->icon);
            }
        }
        $c->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted');
    }
}
