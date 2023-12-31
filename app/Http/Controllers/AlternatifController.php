<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\KriteriaModel;
use App\Models\SubKriteria;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Yajra\DataTables\Facades\DataTables;

class AlternatifController extends Controller
{
    public function index(){
        $data = Alternatif::orderBy('kode')->get();
        $kriteria = KriteriaModel::all();
        $alternatif_kriteria = AlternatifKriteria::all();
        $alternatifKriteriaGrouped = $alternatif_kriteria->groupBy(['id_alternatif', 'id_kriteria']);
        $subKriteria = SubKriteria::all();
        return view('alternatif.alternatif')
            ->with('alt', $data)
            ->with('kriteria', $kriteria)
            ->with('alternatif_kriteria', $alternatif_kriteria)
            ->with('alternatifKriteriaGrouped', $alternatifKriteriaGrouped)
            ->with('subKriteria', $subKriteria);

    }

    public function create(){
        return view('alternatif.create')->with('url_form', url('/alternatif'));
    }

    public function store(Request $request){
        $request->validate([
            'kode'=>'required|string|unique:alternatif,kode',
            'nama'=>'required|string',
        ]);
            $data = $request->except(['_token']);
            $alternatif = Alternatif::create($data);
            return redirect('alternatif')->with('success', 'Alternatif Berhasil Ditambahkan');

    }

    public function edit($id){
        $alternatif = Alternatif::find($id);
        return view('alternatif.edit')
            ->with('alt', $alternatif)
            ->with('url_form', url('/alternatif/'.$id));
    }

    public function update(Request $request, $id){
        $alternatif = Alternatif::find($id);
        $request->validate([
            'nama'=>'required|string',
        ]);
            $data = $request->except(['_token']);
            $alternatif->update($data);
            return redirect('alternatif')->with('success', 'Alternatif Berhasil Diedit');

    }

    public function destroy($id){
        Alternatif::where('id', '=', $id)->delete();
        return redirect('alternatif')
            ->with('success', 'Alternatif Berhasil Dihapus');
    }
}
