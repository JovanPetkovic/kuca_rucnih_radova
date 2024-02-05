<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index():View{
        return view('category.index',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->get('name')
        ]);

        return redirect()->back();
    }

    public function destroy(Category $category):RedirectResponse{
        $category->items()->detach();
        $category->delete();


        return redirect()->back();
    }

    public function update(Category $category):RedirectResponse{
        return redirect()->back();
    }

    public function edit(Category $category):View{
        return view();
    }
}
