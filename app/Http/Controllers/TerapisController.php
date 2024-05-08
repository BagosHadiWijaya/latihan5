<?php

namespace App\Http\Controllers;

use App\Models\Terapis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TerapisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Terapis::latest()->get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('pages.terapis.actions', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.terapis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.terapis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            Terapis::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            Alert::toast('Data terapis berhasil ditambahkan', 'success');
            return redirect()->route('terapis.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('terapis.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Terapis $terapis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terapis $terapis)
    {
        return view('pages.terapis.edit', compact('terapis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terapis $terapis)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $terapis->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            Alert::toast('Data terapis berhasil diubah', 'success');
            return redirect()->route('terapis.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('terapis.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terapis $terapis)
    {
        try {
            $terapis->delete();
            Alert::toast('Data terapis berhasil dihapus', 'success');
            return redirect()->route('terapis.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('terapis.index');
        }
    }
}
