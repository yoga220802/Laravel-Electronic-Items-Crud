<?php

namespace App\Http\Controllers;

use App\Models\ElectronicItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElectronicItemController extends Controller
{
    public function index()
    {
        $items = ElectronicItem::all();
        return view('electronic_items.index', compact('items'));
    }

    public function create()
    {
        return view('electronic_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($imagePath);
        }

        ElectronicItem::create($data);

        return redirect()->route('electronic-items.index')->with('success', 'Item created successfully.');
    }

    public function show(ElectronicItem $electronicItem)
    {
        return view('electronic_items.show', compact('electronicItem'));
    }

    public function edit(ElectronicItem $electronicItem)
    {
        return view('electronic_items.edit', compact('electronicItem'));
    }

    public function update(Request $request, ElectronicItem $electronicItem)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($electronicItem->image) {
                Storage::delete(str_replace('/storage', 'public', $electronicItem->image));
            }
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($imagePath);
        }

        $electronicItem->update($data);

        return redirect()->route('electronic-items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(ElectronicItem $electronicItem)
    {
        if ($electronicItem->image) {
            Storage::delete('public/' . $electronicItem->image);
        }
        $electronicItem->delete();

        return redirect()->route('electronic-items.index')->with('success', 'Item deleted successfully.');
    }
}

