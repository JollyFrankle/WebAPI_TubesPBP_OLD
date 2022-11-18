<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kosts = Kost::all();

        if($kosts->count() > 0) {
            return response([
                'message' => 'Successfully get all kosts!',
                'data' => $kosts
            ], 200);
        } 

        return response([
            'message' => 'No kosts found!',
            'data' => []
        ], 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'harga' => 'required|integer',
            'idPemilik' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response([
                'message' => 'Failed to create kost!',
                'data' => $validator->errors()
            ], 400);
        }

        $kost = Kost::create($data);

        return response([
            'message' => 'Successfully created kost!',
            'data' => $kost
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kost = Kost::find($id);

        if(!is_null($kost)) {
            return response([
                'message' => 'Successfully get kost!',
                'data' => $kost
            ], 200);
        }

        return response([
            'message' => 'Kost not found!',
            'data' => null
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kost = Kost::find($id);

        if(is_null($kost)) {
            return response([
                'message' => 'Kost not found!',
                'data' => null
            ], 404);
        }

        $data = $request->all();

        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'harga' => 'required|integer',
            'idPemilik' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response([
                'message' => 'Failed to update kost!',
                'data' => $validator->errors()
            ], 400);
        }

        if($kost->update($validator->validated())) {
            return response([
                'message' => 'Successfully updated kost!',
                'data' => $kost
            ], 200);
        }

        return response([
            'message' => 'Failed to update kost!',
            'data' => null
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kost = Kost::find($id);

        if(is_null($kost)) {
            return response([
                'message' => 'Kost not found!',
                'data' => null
            ], 404);
        }

        if($kost->delete()) {
            return response([
                'message' => 'Successfully deleted kost!',
                'data' => $kost
            ], 200);
        }

        return response([
            'message' => 'Failed to delete kost!',
            'data' => null
        ], 400);
    }
}
