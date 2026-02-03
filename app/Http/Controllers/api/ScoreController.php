<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ScoreResource;
use App\Models\Score;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Score::all();
        // return Score::all()->toResourceCollection(ScoreResource::class);
        return new ScoreResource(true,'menampilkan semua data',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $data = Score::create($request->all());
        return new ScoreResource(true,'Data berhasil ditambahkan',$data);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Score::findOrFail($id)->toResource(ScoreResource::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Score::findOrFail($id);
        if (!$siswa) {
            $siswa->response()->json(['message' => 'Score not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required',
            'tugas' => 'sometimes|required|numeric',
            'uts' => 'sometimes|required|numeric',
            'uas' => 'sometimes|required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        $siswa->update($request->all());
        // return new ScoreResource($siswa);
        return new ScoreResource(true,'Data berhasil diubah',$siswa);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Score::findOrFail($id);
        if (!$siswa) {
            $siswa->response()->json(['message' => 'Score not found'], 404);
        }

        $siswa->delete();
        return new ScoreResource(true,'Data berhasil dihapus',$siswa);
    }
}
