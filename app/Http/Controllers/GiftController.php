<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::latest()->get();

        return view('welcome', compact('gifts'));
    }

    public function create()
    {
        return view('gifts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
        ]);

        Gift::create($data);

        return redirect()->route('gifts.index');
    }

    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }

    public function edit(Gift $gift)
    {
        return view('gifts.edit', compact('gift'));
    }

    public function update(Request $request, Gift $gift)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
        ]);

        $gift->update($data);

        return redirect()->route('gifts.show', $gift);
    }

    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('gifts.index');
    }
}
