<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rayon;

class RayonController extends Controller
{
     public function index()
    {
     
     $rayon = Rayon::latest()->paginate(5);

     return view('rayon.index',compact('rayon'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     public function create()
    {
        return view('rayon.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'pembimbing' => 'required',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayon.index')
                           ->with('success','Berhasil Menyimpan !');
    }
    public function edit(Rayon $rayon)
    {
        return view('rayon.edit',compact('rayon'));
    }
    public function update(Request $request, Rayon $rayon)
    {
        $request->validate([
        	'rayon' => 'required',
            'pembimbing' => 'required',
        ]);

        Rayon::update($request->all());

        return redirect()->route('rayon.index')
                           ->with('success','Berhasil Update !');
    }
}    