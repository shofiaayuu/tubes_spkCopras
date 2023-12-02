<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Yajra\DataTables\Facades\DataTables;

class AlternatifController extends Controller
{
    public function index(){
        $data = Alternatif::orderBy('id')->get();
        return view('alternatif.alternatif')->with('alt', $data);
    }

    public function create(){
        return view('alternatif.create')->with('url_form', url('/alternatif'));
    }

    public function store(Request $request){
        $request->validate([
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
