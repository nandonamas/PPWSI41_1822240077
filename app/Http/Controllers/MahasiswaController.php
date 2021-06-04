<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert(){
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?, ?)', 
        ['1822240088', 'Feliana', 'Surabaya', '2000-9-14', 'Jl Ketapang ', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Lala",
        updated_at = now() where npm = ?', ['1822240088']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240088']);
        dump($result);
    }

    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        //dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1822240077',
                'nama_mahasiswa' => 'Haniel',
                'tempat_lahir' => 'Prabumulih',
                'tanggal_lahir' => '2000-04-13',
                'alamat' => 'Jl M isa',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')->where('npm', '1822240077')->update(  
            [
                'nama_mahasiswa' => 'Haniel',
                'updated_at' => now()
            ]
        );
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')->where('npm', '=', '1822240077')->delete();
        dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa; // instansiasi class Mahasiswa
        $mahasiswa->npm = '1822240027'; // isi properti
        $mahasiswa->nama_mahasiswa = 'Popeye';
        $mahasiswa->tempat_lahir = 'Bali';
        $mahasiswa->tanggal_lahir = '2016-04-05';
        $mahasiswa->alamat = 'Jl Veteran';
        $mahasiswa->save(); // menyimpan data ke tabel mahasiswa
        dump($mahasiswa); // lihat isi $mahasiswa
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240027')->first(); // cari data berdasarkan npm
        $mahasiswa->nama_mahasiswa = 'Popeye';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240077')->first(); // caridata
        $mahasiswa->delete(); // hapus data npm 1822240002
        dump($mahasiswa);
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = Mahasiswa::all();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }
}
