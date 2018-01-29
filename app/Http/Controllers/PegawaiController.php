<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Pegawai;
use App\Transformer\PegawaiTransformer;

class PegawaiController extends Controller
{
     protected $respose;
 
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
 
    public function index()

    {
        //Mendapatkan list pegawai
        $pegawais = Pegawai::paginate(15);
        // MEngembalikan pegawai dengan paginate
        return $this->response->withPaginator($pegawais, new  PegawaiTransformer());
    }

     public function show($id)
    {
        //Menampilkan data pegawai
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return $this->response->errorNotFound('Pegawai Not Found');
        }
        //Menampilkan salah satu pegawai
        return $this->response->withItem($pegawai, new  PegawaiTransformer());
    }

    	public function destroy($id)
    {
        //Menampilkan pegawai
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return $this->response->errorNotFound('Pegawai Not Found');
        }
 
        if($pegawai->delete()) {
             return $this->response->withItem($pegawai, new  PegawaiTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete a pegawai');
        }
 
    }

    public function store(Request $request) {
    
             $pegawai = Pegawai::create($request->all());
             return response()->json($pegawai, 201);
    }

    public function update(Request $request, $id) {


        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
    }
}
