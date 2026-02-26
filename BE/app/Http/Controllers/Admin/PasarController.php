<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasar;
use Illuminate\Http\Request;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pasars = Pasar::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('alamat', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pasars.index', compact('pasars'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pasars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string'],
            'status' => ['required', 'in:aktif,nonaktif'],
        ]);

        \App\Models\Pasar::create($validated);

        return redirect()->route('pasars.index')
            ->with('success', 'Data pasar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        return view('admin.pasars.edit', compact('pasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $pasar->update($validated);

        return redirect()
            ->route('pasars.index')
            ->with('success', 'Data pasar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasar $pasar)
    {
        $pasar->delete();

        return redirect()->route('pasars.index');
    }
}
