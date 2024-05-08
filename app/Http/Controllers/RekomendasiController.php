<?php


namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;
use Phpml\Classification\DecisionTree as ClassificationDecisionTree;
use RealRashid\SweetAlert\Facades\Alert;

class RekomendasiController extends Controller
{
    public function index()
    {
        return view('pages.rekomendasi.index');
    }

    public function predict(Request $request)
    {
        $input = $request->validate([
            'harga' => 'required|numeric',
            'durasi' => 'required|numeric',
        ]);

        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $nilaiKriteria = NilaiKriteria::all();

        if ($nilaiKriteria->count() == 0) {
            Alert::error('Gagal', 'Data nilai kriteria belum diisi');
            return redirect()->back();
        }

        $dataTraining = [];
        foreach ($alternatif as $alt) {
            $data = [];
            foreach ($kriteria as $k) {
                $nilai = $nilaiKriteria->where('id_alternatif', $alt->id)->where('id_kriteria', $k->id)->first();
                if ($nilai == null) {
                    $data[] = 0;
                    continue;
                }
                $data[] = $nilai->nilai;
            }
            $dataTraining[] = $data;
        }

        $decisionTree = new ClassificationDecisionTree();
        $decisionTree->train($dataTraining, $alternatif->pluck('nama')->toArray());
        $input['harga'] = (int) $input['harga'];
        $input['durasi'] = (int) $input['durasi'];
        $prediksi = $decisionTree->predict([$input['harga'], $input['durasi']]);
        Alert::success('Berhasil', 'Rekomendasi layanan anda: ' . $prediksi);
        return redirect()->back();
    }
}
