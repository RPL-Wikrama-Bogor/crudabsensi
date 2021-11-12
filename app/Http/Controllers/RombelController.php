<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;

class RombelController extends Controller
{
     public function index()
    {
     
     $rombel = Rombel::latest()->paginate(5);

     return view('rombel.index',compact('rombel'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

     public function create()
    {
        return view('rombel.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
        ]);

        Rombel::create($request->all());

        return redirect()->route('rombel.index')
                           ->with('success','Berhasil Menyimpan !');
    }
    public function edit(Rombel $rombel)
    {
        return view('rombel.edit',compact('rombel'));
    }
    public function update(Request $request, Rombel $rombel)
    {
        $request->validate([
        	'rombel' => 'required',
        ]);

        Rombel::update($request->all());

        return redirect()->route('rombel.index')
                           ->with('success','Berhasil Update !');
    }
}    