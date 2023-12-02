<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CloudinaryService;
use App\Models\Item;

class AdminController extends Controller
{
    protected $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function add(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'category' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
    ]);

    $uploadedFileUrl = $this->cloudinaryService->upload($request->file('image')->getRealPath());

    $item = new Item;
    $item->name = $request->name;
    $item->description = $request->description;
    $item->price = $request->price;
    $item->quantity = $request->quantity;
    $item->category = $request->category;
    $item->image_url = $uploadedFileUrl;
    $item->save();

    return redirect()->route('admin.dashboard')->with('success', 'Item added successfully.');
}

}
