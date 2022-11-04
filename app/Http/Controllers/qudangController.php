<?php

namespace App\Http\Controllers;

use AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Redirect;
use View;

class qudangController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('supplier')) {
            return redirect()->route('/berandaSupplier');
        }

        return redirect()->route('/berandaSupplier');
    }
    
    public function cekLogin(Request $request)
  {
    $email = request()->get('email');
    $password = request()->get('password');
        $data = User::where('email', '=', $email)->first();
        $loginData = $request->validate([
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:2|max:255',
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Store data in session
            $request->session()->put('name', request()->get('email'));
            return Redirect::to('/beranda')->with('message', 'Berhasil Login');
        } else{
        return Redirect::to('/')->with('message', 'Login gagal, username atau password tidak sesuai');
    }
  }

  public function supplier()
  {
    return view('berandaSupplier', [
        'tittle' => 'supplier'
    ]);
  }

  public function barangSup()
  {
    return view('dataBarangSup', [
        'tittle' => 'Barang Supplier'
    ]);
  } 

  public function permintaanSup()
  {
    return view('permintaanSup', [
        'tittle' => 'Permintaan'
    ]);
  } 

  public function permintaan()
  {
    return view('permintaan', [
        'tittle' => 'Permintaan'
    ]);
  } 

  public function permintaanform()
  {
    return view('tambahPermintaan', [
        'tittle' => 'Permintaan'
    ]);
  } 

// ================LIHAT DATA==========
  public function lihatDataBarang()
    {
        dd(auth()->check());
        $data = DB::table('barang')->get();
        $barang_masuk = DB::table('barang')
            ->join('detail_barang_masuk', 'barang.id_barang', '=', 'detail_barang_masuk.id_barang')
            ->join('barang_masuk', 'barang_masuk.id_barang_masuk', '=', 'detail_barang_masuk.id_barang_masuk')
            ->get();

        $barang_keluar = DB::table('barang')
            ->join('detail_barang_keluar', 'barang.id_barang', '=', 'detail_barang_keluar.id_barang')
            ->join('barang_keluar', 'barang_keluar.id_barang_keluar', '=', 'detail_barang_keluar.id_barang_keluar')
            ->get();
        return view::make('/dataBarang')->with(['barang'=>$data, 'barangmasuk'=>$barang_masuk,'barangkeluar'=>$barang_keluar]);
    }

    public function lihatDataBarangSup()
    {
        $data = DB::table('barang')->get();
        $barang_masuk = DB::table('barang')
            ->join('detail_barang_masuk', 'barang.id_barang', '=', 'detail_barang_masuk.id_barang')
            ->join('barang_masuk', 'barang_masuk.id_barang_masuk', '=', 'detail_barang_masuk.id_barang_masuk')
            ->get();

        $barang_keluar = DB::table('barang')
            ->join('detail_barang_keluar', 'barang.id_barang', '=', 'detail_barang_keluar.id_barang')
            ->join('barang_keluar', 'barang_keluar.id_barang_keluar', '=', 'detail_barang_keluar.id_barang_keluar')
            ->get();
        return view::make('/dataBarangSup')->with(['barang'=>$data, 'barangmasuk'=>$barang_masuk,'barangkeluar'=>$barang_keluar]);
    }

    public function lihatDataPermintaanSup()
    {
        $data = DB::table('permintaan')->get();
        return view::make('/permintaanSup')->with('permintaan', $data);
    }

    public function lihatDataPermintaan()
    {
        $permintaan = DB::table('permintaan')->get();
        return view::make('/permintaan')->with('permintaan', $permintaan);
    }

    public function lihatDataSupplier()
    {
        $data = DB::table('supplier')->get();
        return view::make('/supplier')->with('supplier', $data);
    }

    // ===========TAMBAH DATA============

    public function tambahbarang()
    {
        $data = array(
            'nama_barang' => request()->get('nama_barang'),
            'satuan' => request()->get('satuan'),
            'stok'=>'0',
            'deskripsi' => request()->get('deskripsi')
        );
        DB::table('barang')->insert($data);
        return Redirect::to('dataBarang')->with('message', 'Berhasil Menambah Data');
    }

    public function tambahSupplier()
    {
        $data = array(
            'nama_supplier' => request()->get('nama_supplier'),
            'deskripsi' => request()->get('deskripsi')
        );
        DB::table('supplier')->insert($data);
        return Redirect::to('supplier')->with('message', 'Berhasil Menambah Data');
    }

    public function tambahPermintaan()
    {
        $data = array(
            'nama_barang' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah'),
            'supplier' => request()->get('supplier')
        );
        DB::table('permintaan')->insert($data);
        return Redirect::to('permintaan')->with('message', 'Berhasil Menambah Data');
    }

// HAPUS DATA ===============================

    public function hapusBarang ($id)
    {
        DB::table('barang')->where('id_barang', '=', $id)->delete();
        return Redirect::to('dataBarang')->with('message', 'Berhasil Menghapus Data');
    }

    public function hapusSupplier ($id)
    {
        DB::table('supplier')->where('id_supplier', '=', $id)->delete();
        return Redirect::to('supplier')->with('message', 'Berhasil Menghapus Data');
    }

    public function hapusPermintaan ($id)
    {
        DB::table('permintaan')->where('id_permintaan', '=', $id)->delete();
        return Redirect::to('permintaan')->with('message', 'Berhasil Menghapus Data');
    }

    // UBAH DATA ============================

    public function updatebarang($id)
    {
        $data = DB::table('barang')->where('id_barang', '=', $id)->first();
        return View::make('ubahBarang')->with('barang', $data);
    }

    public function ubahbarang()
    {
        $data = array(
            'nama_barang' => request()->get('nama_barang'),
            'satuan' => request()->get('satuan'),
            'stok' => '0',
            'deskripsi' => request()->get('deskripsi')
        );

        DB::table('barang')->where('id_barang', '=', request()->get('id'))->update($data);
        return Redirect::to('/dataBarang')->with('message', 'Data Berhasil Diupdate');
    }

    public function updatesupplier($id)
    {
        $data = DB::table('supplier')->where('id_supplier', '=', $id)->first();
        return View::make('ubahSupplier')->with('supplier', $data);
    }

    public function ubahsupplier()
    {
        $data = array(
            'nama_supplier' => request()->get('nama_supplier'),
            'deskripsi' => request()->get('deskripsi')
        );

        DB::table('supplier')->where('id_supplier', '=', request()->get('id'))->update($data);
        return Redirect::to('/supplier')->with('message', 'Data Berhasil Diupdate');
    }

    public function updatePermintaan($id)
    {
        $data = DB::table('permintaan')->where('id_permintaan', '=', $id)->first();
        return View::make('ubahPermintaan')->with('permintaan', $data);
    }

    public function ubahPermintaan()
    {
        $data = array(
            'status' => request()->get('status')
        );

        DB::table('permintaan')->where('id_permintaan', '=', request()->get('id'))->update($data);
        return Redirect::to('/permintaanSup')->with('message', 'Data Berhasil Diupdate');
    }


    // BARANG MASUK ==================

    public function barangMasuk()
    {
        $barang = DB::table('barang')->get();
        $supplier = DB::table('supplier')->get();

        return view::make('barangMasuk')->with(['barang'=>$barang,'supplier'=>$supplier]);
    }

    public function tambahbarangmasuk()
    {

        $sekarang =  date_create(); // waktu sekarang

        $barangmasuk = array(
            'tanggal_masuk' => $sekarang,
            'batch' => request()->get('batch'),'id_supplier' => request()->get('nama_supplier')
        );
        DB::table('barang_masuk')->insert($barangmasuk);
        $id_barang_masuk = DB::table('barang_masuk')->max('id_barang_masuk');

        $detailBarangMasuk = array(
            'id_barang_masuk' => $id_barang_masuk,
            'id_barang' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah')
        );
        DB::table('detail_barang_masuk')->insert($detailBarangMasuk);

        $stoktambah = request()->get('jumlah');
        $stoksekarang = DB::table('barang')
            ->select(DB::raw('stok'))
            ->where('id_barang', '=', request()->get('nama_barang'))->get();

        $nilai = 0;
        foreach ($stoksekarang as $barang) {
            $nilai = $barang->stok;
        }

        $data = array(
            'stok' => $nilai + $stoktambah
        );
        DB::table('barang')->where('id_barang', '=', request()->get('nama_barang'))->update($data);
        return Redirect::to('/dataBarang')->with('message', 'Transaksi Barang Masuk Berhasil');
    }


    // BARANG KELUAR =================

    public function barangKeluar()
    {
        $barang = DB::table('barang')->get();
        $supplier = DB::table('supplier')->get();

        return view::make('barangKeluar')->with(['barang'=>$barang,'supplier'=>$supplier]);
    }

    public function tambahbarangkeluar()
    {

        $sekarang =  date_create(); // waktu sekarang

        $barangkeluar = array(
            'tanggal_keluar' => $sekarang,
            'batch' => request()->get('batch'),'id_supplier' => request()->get('nama_supplier')
        );
        DB::table('barang_keluar')->insert($barangkeluar);
        $id_barang_keluar = DB::table('barang_keluar')->max('id_barang_keluar');

        $detailBarangKeluar = array(
            'id_barang_keluar' => $id_barang_keluar,
            'id_barang' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah')
        );
        DB::table('detail_barang_keluar')->insert($detailBarangKeluar);

        $stockkurang = request()->get('jumlah');
        $stocksekarang = DB::table('barang')
            ->select(DB::raw('stok'))
            ->where('id_barang', '=', request()->get('nama_barang'))->get();

        $nilai = 0;
        foreach ($stocksekarang as $barang) {
            $nilai = $barang->stok;
        }

        $data = array(
            'stok' => $nilai - $stockkurang
        );
        DB::table('barang')->where('id_barang', '=', request()->get('nama_barang'))->update($data);
        return Redirect::to('/dataBarang')->with('message', 'Transaksi Barang Keluar Berhasil');
    }

        public function logout()
    {
        session()->forget('name');
        return Redirect::to('/');
    }
}
