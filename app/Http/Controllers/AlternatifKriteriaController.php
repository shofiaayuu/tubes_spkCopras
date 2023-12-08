<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;

class AlternatifKriteriaController extends Controller
{
    public function index(){
        $scores = AlternatifKriteria::select(
            'alternatif_kriteria.id as id',
            'alternatif.id as ida',
            'kriteria.id as idk',
            'alternatif_kriteria.value as value' ,
            'kriteria.nama as nama',
            'kriteria.jenis as jenis',
            'kriteria.bobot as bobot',
            'kriteria.deskripsi as deskripsi',
        )
        ->leftJoin('alternatif', 'alternatif.id', '=', 'alternatif_kriteria.id_alternatif')
        ->leftJoin('kriteria', 'kriteria.id', '=', 'alternatif_kriteria.id_kriteria')
        ->get();

        $alternatif = Alternatif::get();
        $kriteriabobot = KriteriaModel::get();
        return view('alternatif.index', compact('scores', 'alternatif', 'kriteriabobot'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $kriteriabobot = KriteriaModel::get();
        return view('alternatif.create', compact('kriteriabobot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $request->validate([
        'nama' => 'required',
        'kode' => 'required|unique:alternatif,kode'
    ]);

    // Menyimpan alternatif
    $alt = new Alternatif();
    $alt->nama = $request->nama;
    $alt->kode = $request->kode;
    $alt->save();

    // Menyimpan skor
    $kriteriabobot = KriteriaModel::get();
    foreach ($kriteriabobot as $k) {
        $score = new AlternatifKriteria();
        $score->id_alternatif = $alt->id;
        $score->id_kriteria = $k->id;
        $score->value = 0; // Set a default value, change as needed
        $score->save();
    }

    return redirect()->route('alternatif.index')
                    ->with('success', 'Alternatif created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlternatifModel  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        $kriteriabobot = KriteriaModel::get();
        $alternatifskor = AlternatifKriteria::where('id_alternatif', $alternatif->id)->get();
        return view('alternatif.edit', compact('alternatif', 'alternatifskor', 'kriteriabobot'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlternatifModel  $alternatif
     * @return \Illuminate\Http\Response
     */
    // Metode update
    public function update(Request $request, $id, Alternatif $alternatif)
    {
        // Validasi
        $request->validate([
            'nama.*' => 'required',
            'value' => 'required|array',
            'value.*' => 'required|numeric',
        ]);
    
        // Menyimpan Skor
        $kriteriabobot = KriteriaModel::get();
        $alternatif = Alternatif::find($id);

        foreach ($kriteriabobot as $k) {
            $score = AlternatifKriteria::updateOrCreate(
                [
                    'id_alternatif' => $alternatif->id,
                    'id_kriteria' => $k->id,
                ],
                [
                    'value' => $request->value[$k->id] ?? 0,
                ]
            );
        }
    
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diperbarui');
    }

    public function destroy($id)
    {
        $scores = AlternatifKriteria::where('id_alternatif', '=', $id)->delete();
        $alternatif = Alternatif::where('id', '=', $id)->delete();

        return redirect()->route('alternatif.index')
                        ->with('success','alternatif deleted successfully');
    }
}
