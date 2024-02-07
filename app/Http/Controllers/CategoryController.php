<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
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

    public function all():View{
        return view('items.index',[
            'categories' => Category::all(),
            'items' => Item::all()
        ]);
    }

    public function items(Category $category):View{
        $items = $category->items;
        return view('items.index',[
            'categories' => Category::all(),
            'items' => $items
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

    public function update(Request $request,Category $category):RedirectResponse{
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $category->update($validated);

        return redirect()->back();
    }

    public function edit(Category $category):View{
        return view();
    }
}
