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

    public function store(Request $request)  {
        if ($request->isMethod('put')) {
            //Menapilkan pegawai
            $pegawai = Pegawai::find($request->no_reg);
            if (!$pegawi) {
                return $this->response->errorNotFound('Task Not Found');
            }
        } else {
            $pegawai = new Pegawai;
        }
 
        $pegawai->id = $request->input('pegawai_id');
        $pegawai->name = $request->input('name');
        $pegawai->address = $request->input('address');
        $pegawai->user_id =  1; //$request->user()->id;
 
        if($pegawai->save()) {
            return $this->response->withItem($pegawai, new  PegawaiTransformer());
        } else {
             return $this->response->errorInternalError('Tidak bisa update pegawai');
        }
 
    }

}
