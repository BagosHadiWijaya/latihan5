<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\Pesanan;
use App\Models\Terapis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $dataAlternatif = Alternatif::all();
        $dataKriteria = Kriteria::all();
        $dataTerapis = Terapis::all();

        if (Auth::check()) {
            $dataAlternatifPesanan = Pesanan::with('alternatif')->where('id_user', Auth::user()->id)->get();
            return view('pages.welcome', compact('dataAlternatif', 'dataKriteria', 'dataTerapis', 'dataAlternatifPesanan'));
        } else {
            return view('pages.welcome', compact('dataAlternatif', 'dataKriteria', 'dataTerapis'));
        }
    }

    public function storePesanan(Request $request)
    {
        try {
            if (Auth::check() == false) {
                Alert::error('Error', 'Anda harus login terlebih dahulu');
                return redirect()->back()->withInput();
            }

            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'id_alternatif' => 'required',
                'id_user' => 'required',
                'id_terapis' => 'required',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            Pesanan::create([
                'nama' => $request->nama,
                'id_alternatif' => $request->id_alternatif,
                'id_user' => $request->id_user,
                'id_terapis' => $request->id_terapis,
            ]);

            Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('home');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function storeNilaiKriteria(Request $request)
    {
        try {
            if (Auth::check() == false) {
                Alert::error('Error', 'Anda harus login terlebih dahulu');
                return redirect()->back()->withInput();
            }

            $validator = Validator::make($request->all(), [
                'id_alternatif_2' => 'required',
                'nilai*' => 'required',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('id_alternatif', $request->id_alternatif_2)->first();
            if ($pesanan == null) {
                Alert::error('Error', 'Pesanan tidak ditemukan');
                return redirect()->back()->withInput();
            }

            foreach ($request->nilai as $key => $value) {
                NilaiKriteria::create([
                    'id_alternatif' => $pesanan->id_alternatif,
                    'id_kriteria' => $key,
                    'nilai' => $value,
                ]);
            }

            Alert::toast('Data berhasil disimpan', 'success');
            return redirect()->route('home');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
