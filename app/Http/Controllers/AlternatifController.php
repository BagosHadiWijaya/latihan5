<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Alternatif::latest()->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('pages.alternatif.actions', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.alternatif.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'harga' => 'required|integer',
                'durasi' => 'required|integer',
                'deskripsi' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            Alternatif::create([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('alternatif.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('alternatif.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        return view('pages.alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'harga' => 'required|integer',
                'durasi' => 'required|integer',
                'deskripsi' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $alternatif->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::toast('Data berhasil diupdate', 'success');
            return redirect()->route('alternatif.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('alternatif.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        try {
            $alternatif->delete();
            Alert::toast('Data berhasil dihapus', 'success');
            return redirect()->route('alternatif.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('alternatif.index');
        }
    }
}
