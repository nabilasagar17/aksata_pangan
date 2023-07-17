<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    //

    public function dashboard(){
        $total_dana = DB::table('stok_masuk')->select(DB::raw('SUM(harga) as total_dana'),DB::raw("YEAR(created_at) as tahun"))->groupBy(DB::raw("YEAR(created_at)"))->get();
        return view('admin/dashboard',['total_dana'=>$total_dana]);
    }

    public function master_stok(Request $request){
        if($request->segment(2) == 'food_bank'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Makanan')->orderby('exp_date','asc')->paginate(15);
        }elseif($request->segment(2) == 'bantuan_dana'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);

        }else{
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Dana')->orderby('exp_date','asc')->paginate(15);
        }
        return view('admin/stok_masuk',['data'=>$data]);
    }


    public function penyaluran_bantuan(Request $request){
        if($request->segment(2) == 'penyaluran_makanan'){
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->orderby('exp_date','asc')->paginate(15);
        }elseif($request->segment(2) == 'penyaluran_dana'){
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);

        }else{
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->orderby('exp_date','asc')->paginate(15);
        }
        return view('admin/penyaluran_bantuan',['data'=>$data]);
    }

    public function laporan_masuk(Request $request){
        if($request->segment(2) == 'laporan_dana_masuk'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);
        }elseif($request->segment(2) == 'laporan_makanan_masuk'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Makanan')->orderby('exp_date','asc')->paginate(15);
        }else{
            $data = DB::table('stok_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/laporan_masuk',['data'=>$data]);
    }

    public function laporan_bantuan(Request $request){
        if($request->segment(2) == 'laporan_penyaluran_bantuan'){
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);
        }elseif($request->segment(2) == 'laporan_penyaluran_dana'){
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->orderby('created_at','desc')->paginate(15);
        }else{
            $data = DB::table('view_stok_keluar')->select("*")->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/laporan_bantuan',['data'=>$data]);
    }

    public function user_list(){
        $data = DB::table('users')->select('*')->orderby('created_at','desc')->paginate(15);
        return view('admin/user_list',['data'=>$data]);
    }

    public function volunteer(){
        $data = DB::table('volunteer')->select('*')->orderby('created_at','desc')->paginate(15);
        return view('admin/volunteer',['data'=>$data]);
    }

    public function insert_volunteer(Request $request){
        $nama = $request->input('nama');
        $batch = $request->input('batch');
        $email = $request->input('email');
        $password = $request->input('password');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $tgl_gabung = $request->input('tgl_gabung');

        DB::table('volunteer')->insert([
            'nama' => $nama,
            'batch' => $batch,
            'email' => $email,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'tgl_gabung' => Carbon::now(),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id
        ]);

        DB::table('users')->insert([
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'telp' => $no_telp,
            'password' => bcrypt("123456"),
            'role_user' => 'volunteer',
            'is_active' => 1,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('message', 'Data Volunteer Berhasil Ditambah!');
    }

    public function update_volunteer($id){
        $email = $request->input('email');
        $nama = $request->input('nama');
        $batch = $request->input('batch');
        $password = $request->input('password');
        $alamat = $request->input('alamant');
        $no_telp = $request->input('no_telp');

        DB::table('volunteer')->where('id', $id)->update([
            'email' => $email,
            'nama' => $nama,
            'batch' => $batch,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->id
        ]);
        return redirect()->back()->with('message', 'Data Volunteer Berhasil Diupdate!');


    }

    public function preview_barang_masuk(Request $request){
        $data = DB::table('preview_barang_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/preview_barang_masuk',['data'=>$data]);
    }

    public function insert_preview_bantuan(Request $request){
        $nama_makanan = $request->input('nama_makanan');
        $tgl_masuk = $request->input('tgl_masuk');
        $exp_date = $request->input('exp_date');
        $berat = $request->input('berat');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $satuan = $request->input('satuan_barang');
        $pengantaran = $request->input('pengantaran');
        $kategori = $request->input('kategori');
        if($kategori == 'makanan'){
            DB::table('preview_barang_masuk')->insert([
                'nama' => $nama_makanan,
                'kategori' => $kategori,
                'berat' => $berat,
                'qty' => $qty,
                'tgl_masuk' => $tgl_masuk,
                'exp_date' => $exp_date,
                'pengiriman' => $pengantaran,
                'satuan_barang' => $satuan,
                'harga' => $harga,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id

            ]);
        }else{
            DB::table('preview_barang_masuk')->insert([
                'nama' => $nama_makanan,
                'kategori' => $kategori,
                'berat' => $berat,
                'qty' => $harga,
            
                'tgl_masuk' => $tgl_masuk,
                'exp_date' => $exp_date,
                'pengiriman' => $pengantaran,
                'satuan_barang' => $satuan,
                'harga' => $harga,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id

            ]);
        }    
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }

    public function insert_data_donatur(Request $request){
        $data = DB::table('preview_barang_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/insert_data_donatur',['data'=>$data]);
    }


    public function insert_bantuan(Request $request){
        $nama = $request->input('donatur');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $no_telp = $request->input('no_telp');
        $keterangan = $request->input('keterangan');
        $file_path = $request->input('file_path');

        $folderPath = public_path('file_ttd/');
        
        $image_parts = explode(";base64,", $request->signed);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
           
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        $preview = DB::table('preview_barang_masuk')->select("*")->where('created_by',Auth::user()->id)->get();
        foreach($preview as $previews){
            DB::table('stok_masuk')->insert([
                'nama_pemberi' => $nama,
                'alamat_pemberi' => $alamat,
                'email_pemberi' => $email,
                'no_telp_pemberi' => $no_telp,
                'keterangan_pemberi' => $keterangan,
                'nama' => $previews->nama,
                'kategori' => $previews->kategori,
                'berat' => $previews->berat,
                'qty' => $previews->qty,
                'tgl_masuk' => $previews->tgl_masuk,
                'exp_date' => $previews->exp_date,
                'sisa_belum_tersebar' => $previews->qty,
                'sisa_disebar' => 0,
                'status' => 0,
                'file_path' => $file_path,
                'path_ttd_pemberi' => $path_ttd_pemberi,
                'pengiriman' => $previews->pengiriman,
                'satuan_barang' => $$previews->satuan_barang,
                'harga' => $previews->harga,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,

            ]);
            DB::table('preview_barang_masuk')->where('id',$previews->id)->delete();
        }

        return redirect()->back();
    }

    
    public function preview_barang_keluar(Request $request){
        $data = DB::table('preview_barang_keluar')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/preview_barang_keluar',['data'=>$data]);
    }

    public function insert_preview_bantuan_keluar(Request $request){
        $nama_makanan = $request->input('nama_makanan');
        $tgl_masuk = $request->input('tgl_masuk');
        $exp_date = $request->input('exp_date');
        $berat = $request->input('berat');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $satuan = $request->input('satuan_barang');
        $pengantaran = $request->input('pengantaran');
        $kategori = $request->input('kategori');

        DB::table('preview_barang_keluar')->insert([
            'nama' => $nama_makanan,
            'kategori' => $kategori,
            'berat' => $berat,
            'qty' => $qty,
            'tgl_masuk' => $tgl_masuk,
            'exp_date' => $exp_date,
            'pengiriman' => $pengantaran,
            'satuan_barang' => $satuan,
            'harga' => $harga,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id

        ]);
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }

    public function insert_data_penerima(Request $request){
        $data = DB::table('preview_barang_keluar')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/insert_data_penerima',['data'=>$data]);
    }


    public function insert_bantuan_keluar(Request $request){
        $nama = $request->input('donatur');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $no_telp = $request->input('no_telp');
        $keterangan = $request->input('keterangan');
        $file_path = $request->input('file_path');

        $folderPath = public_path('file_ttd/');
        
        $image_parts = explode(";base64,", $request->signed);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
           
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        $preview = DB::table('preview_barang_masuk')->select("*")->where('created_by',Auth::user()->id)->get();
        foreach($preview as $previews){
            DB::table('stok_masuk')->insert([
                'nama_pemberi' => $nama,
                'alamat_pemberi' => $alamat,
                'email_pemberi' => $email,
                'no_telp_pemberi' => $no_telp,
                'keterangan_pemberi' => $keterangan,
                'nama' => $previews->nama,
                'kategori' => $previews->kategori,
                'berat' => $previews->berat,
                'qty' => $previews->qty,
                'tgl_masuk' => $previews->tgl_masuk,
                'exp_date' => $previews->exp_date,
                'sisa_belum_tersebar' => $previews->qty,
                'sisa_disebar' => 0,
                'status' => 0,
                'file_path' => $file_path,
                'path_ttd_pemberi' => $path_ttd_pemberi,
                'pengiriman' => $previews->pengiriman,
                'satuan_barang' => $$previews->satuan_barang,
                'harga' => $previews->harga,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,

            ]);
            DB::table('preview_barang_masuk')->where('id',$previews->id)->delete();
        }

        return redirect()->back();
    }


    
}