<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('items.index',[
            'items' => Item::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request):RedirectResponse
    {
        $validated = $request->validated();

        //Saving incoming images into a variable
        $imageFiles = $request->files->all()['images'];

        //Creating variable to store image names for saving into db
        $imageNames = '';

        //Saving image names into the variable and moving images from temp
        //location into a permanent one
        foreach ($imageFiles as $image){
            $imageName = time() . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imageNames = $imageNames . $imageName . ';';
        }

        //Changing value of images field that will be saved into db
        $validated['images'] = $imageNames;

        //Saving Item into db
        $request->user()->items()->create($validated);
        return redirect(route('items.index'));


    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item):View
    {
        $this->authorize('update', $item);

        return View('items.edit',['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item):RedirectResponse
    {
        $this->authorize('update',$item);

        $validated = $request->validated();

        $item->update($validated);

        return redirect(route('items.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete',$item);

        $item->delete();

        return redirect(route('items.index'));
    }
}