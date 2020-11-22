<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangModel;
class apicontroller extends Controller
{
    public function read(){
        $daftar_barang = BarangModel::all();
        return response([
            'status' => true,
            'message' => 'Daftar Barang',
            'data' => $daftar_barang
        ], 200);

    }

    public function insert(Request $request){
        $insert_barang = new BarangModel;
        $insert_barang->nama_barang = $request->namaBarang;
        $insert_barang->jumlah_barang = $request->jmlBarang;
        $insert_barang->save();

        
        return response([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
        ],200);
    }


    public function update(Request $request, $id){
        $check_barang = BarangModel::firstWhere('kode_barang',$id);

        if ($check_barang) {
            $data_barang = BarangModel::find($id);
            $data_barang->nama_barang = $request->namaBarang;
            $data_barang->jumlah_barang = $request->jmlBarang;
            $data_barang->save();
    
            return response([
                'status' => true,
                'message' => 'Data berhasil diubah',
            ],200);
            
        } else{
            return response([
                'status' => false,
                'message' => "Kode barang tidak ditemukan"
            ],404);
        }
    }

    public function delete($kode_barang){
        $check_barang = BarangModel::find($kode_barang);

        if ($check_barang){
            BarangModel::destroy($kode_barang);
            return response([
                'status' => true,
                'messsage' => 'Data Dihapus',
            ],200);
        } else {
            return response([
                'status' => false,
                'messsage' => 'Data Tidak Ditemukan',
            ],404);
        }
    }
}
