<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
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
}
