<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;

class KriteriaController extends Controller
{
    public function index(){
        $data = KriteriaModel::orderBy('kode')->get();
        return view('kriteria.kriteria')->with('kr', $data);
    }

    public function create(){
        return view('kriteria.create_kriteria')->with('url_form', url('/kriteria'));
    }

    public function store(Request $request){
        $request->validate([
            'kode'=>'required|string|unique:kriteria,kode',
            'nama'=>'required|string',
            'bobot'=>'required|numeric',
            'jenis'=>'required|in:Benefit,Cost'
        ]);

        $bobotPersen = $request->input('bobot');
        if ($bobotPersen > 1){
            $bobotPersen /= 100;
        }

        $countBobot = KriteriaModel::sum('bobot') + $bobotPersen;

        if ($countBobot <= 1) {
            $data = $request->except(['_token']);
            $data['bobot'] = $bobotPersen;

            $kriteria = KriteriaModel::create($data);
            return redirect('kriteria')->with('success', 'Kriteria Berhasil Ditambahkan');
        } else {
            return redirect('kriteria')->with('failed', 'Nilai Bobot Tidak Seimbang');
        }
    }

    public function edit($id){
        $kriteria = KriteriaModel::find($id);
        return view('kriteria.edit_kriteria')
            ->with('kr', $kriteria)
            ->with('url_form', url('/kriteria/'.$id));
    }

    public function update(Request $request, $id){
        $kriteria = KriteriaModel::find($id);
        $preBobot = $kriteria->bobot;
        $request->validate([
            'nama'=>'required|string',
            'bobot'=>'required|numeric',
            'jenis'=>'required|in:Benefit,Cost'
        ]);
        $bobotPersen = $request->input('bobot');
        if ($bobotPersen >= 1){
            $bobotPersen /= 100;
        }
        $countBobot = KriteriaModel::sum('bobot') - $preBobot + $bobotPersen;
        if ($countBobot <= 1) {
            $data = $request->except(['_token']);
            $data['bobot'] = $bobotPersen;
            $kriteria->update($data);
            return redirect('kriteria')->with('success', 'Kriteria Berhasil Diedit');
        } else {
            return redirect('kriteria')->with('failed', 'Nilai Bobot Tidak Seimbang');
        }
    }
    
    public function destroy($id){
        KriteriaModel::where('id', '=', $id)->delete();
        return redirect('kriteria')
            ->with('success', 'Kriteria Berhasil Dihapus');
    }
}