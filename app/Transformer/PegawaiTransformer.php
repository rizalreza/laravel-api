<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class PegawaiTransformer extends TransformerAbstract {
 
    public function transform($pegawai) {
        return [
            'No_Urut' => $pegawai->id,
            'Nama_Pegawai' => $pegawai->name,
            'Alamat_Pegawai' => $pegawai->address
        ];
    }
 }
