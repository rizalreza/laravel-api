<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class PegawaiTransformer extends TransformerAbstract {
 
    public function transform($pegawai) {
        return [
            'id' => $pegawai->id,
            'Name' => $pegawai->name,
            'Address' => $pegawai->address,
            'No Reg' => $pegawai->no_reg
        ];
    }
 }
