<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MencobaController extends Controller
{
        public function index()
    {
        $title = "Belajar laravel asik deh";
        return view('belajar', compact('title'));
    }
        public function tambah()
    {
        $title = "Tambah-tambahan";
        return view('tambah', compact('title'));
    }    
    public function actionTambah(Request $request)
    {
        $title = "Tambah-tambahan";
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah', 'title'));
    }
        public function kurang()
    {
        $title = "Pengurangan";
        return view('kurang', compact('title'));
    }
        public function actionKurang(Request $request)
        {
            $title = "Pengurangan";
            $angka1 = $request->angka1;
            $angka2 = $request->input('angka2');
            $kurang = $angka1 - $angka2;
            return view('kurang', compact('kurang', 'title'));
        }
        public function kali()
    {
        $title = "Perkalian";
        return view('kali', compact('title'));
    }
        public function actionKali(Request $request)
        {
            $title = "Perkalian";
            $angka1 = $request->angka1;
            $angka2 = $request->input('angka2');
            $perkalian = $angka1 * $angka2;
            return view('kali', compact('perkalian', 'title'));
        }
        public function bagi()
    {
        $title = "Pembagian";
        return view('bagi', compact('title'));
    }
        public function actionBagi(Request $request)
        {
            $title = "Pembagian";
            $angka1 = $request->angka1;
            $angka2 = $request->input('angka2');
            $Pembagian = $angka1 / $angka2;
            return view('bagi', compact('Pembagian', 'title'));
        }
       
}
