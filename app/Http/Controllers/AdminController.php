<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Carbon;
use PDF;


class AdminController extends Controller
{
    //

    public function dashboard(Request $request){
        if($request->input('tahun') != '' ){
            $volunteer = DB::table('volunteer')->select("*")->where('is_active',1)->get();
            $total_dana = DB::table('detail_dana_masuk')->select(DB::raw('SUM(qty) as total_dana'),DB::raw("YEAR(created_at) as tahun"))->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->groupBy(DB::raw("YEAR(created_at)"))->get();
            $dibagikan = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->count();
            $dana = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->count();
            $bantuan_masuk = DB::table('stok_masuk')->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->groupBy(DB::raw("YEAR(created_at)"))->count();
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(5);
        }else{
            $volunteer = DB::table('volunteer')->select("*")->where('is_active',1)->get();
            $total_dana = DB::table('detail_dana_masuk')->select(DB::raw('SUM(qty) as total_dana'),DB::raw("YEAR(created_at) as tahun"))->where(DB::raw("YEAR(created_at)"),Carbon::now())->groupBy(DB::raw("YEAR(created_at)"))->get();
            $dibagikan = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->count();
            $dana = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->count();
            $bantuan_masuk = DB::table('stok_masuk')->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->groupBy(DB::raw("YEAR(created_at)"))->count();
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->orderby('created_at','desc')->paginate(5);

        }

        return view('admin/dashboard',['total_dana'=>$total_dana,'volunteer'=>$volunteer,'dibagikan'=>$dibagikan,'dana'=>$dana, 'bantuan_masuk' => $bantuan_masuk,'data'=> $data]);
    }

    public function detail_dana_masuk_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('detail_dana_masuk')->select("*")->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }else{
            $data = DB::table('detail_dana_masuk')->select("*")->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->paginate(15);
        }
        return view('admin/laporan_masuk',['data'=>$data]);
    }

    public function detail_makanan_masuk_widget(Request $request){
        if($request->input('tahun') == ''){
            $bantuan_masuk = DB::table('stok_masuk')->select("*")->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->paginate(15);
        }else{
            $data = DB::table('detail_dana_masuk')->select("*")->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/laporan_masuk',['data'=>$data]);
    }

    public function detail_penyaluran_makanan_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai'  )->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }else{
            $data =  DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai' )->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/list_bantuan',['data'=>$data]);
    }

    public function detail_penyaluran_dana_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('view_stok_keluar')->select('*')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }else{
            $data =  DB::table('view_stok_keluar')->select('*')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/laporan_bantuan',['data'=>$data]);
    }

    public function master_stok(Request $request){
        if($request->segment(2) == 'food_bank'){
            if($request->input('search') != null || $request->input('start') != null || $request->input('end') != null){
                $data = DB::table('stok_masuk')->select("*")->where('kategori','Makanan')
                ->where('nama', 'like', '%' . $request->input('search'). '%')
               
                ->orderby('exp_date','asc')->paginate(15);
            }else{
                $data = DB::table('stok_masuk')->select("*")->where('kategori','Makanan')->orderby('exp_date','asc')->paginate(15);

            }
        }elseif($request->segment(2) == 'bantuan_dana'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);

        }else{
            $data = DB::table('stok_masuk')->select("*")->where('kategori','Dana')->orderby('exp_date','asc')->paginate(15);
        }
        return view('admin/stok_masuk',['data'=>$data]);
    }

    public function delete_stok_masuk(Request $request){
        $id = $request->input('id');
      
        DB::table('stok_masuk')->where('id',$id)->delete();
        DB::table('preview_barang_keluar')->where('id_stok_masuk',$id)->delete();
        DB::table('stok_keluar')->where('id_stok_masuk',$id)->delete();

        return redirect()->back()->with('message', 'Data Stok Berhasil Dihapus!');
    }
    
    public function delete_stok_keluar(Request $request){
        $id = $request->input('id');
        $data = DB::table('stok_keluar')->select("*")->where('id',$id)->get(1);
        $master = DB::table('stok_masuk')->select("*")->where('id',$data[0]->id_stok_masuk)->get(1);
        $qty_master = $master[0]->qty + $data[0]->qty;
        $jumlah_disebar = $master[0]->sisa_disebar - $data[0]->qty;
        DB::table('stok_masuk')->where('id',$data[0]->id_stok_masuk)->update([
            'qty' => $qty_master,
            'sisa_disebar' => $jumlah_disebar,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->id
        ]);
        DB::table('stok_keluar')->where('id',$id)->delete();

    

        return redirect()->back()->with('message', 'Data Stok Keluar Berhasil Dihapus!');
    }



    public function detail_dana_masuk(Request $request){
        
            $data = DB::table('detail_dana_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        
        return view('admin/detail_dana_masuk',['data'=>$data]);
    }

    public function print_detail_dana_masuk(Request $request){
        
        $data = DB::table('detail_dana_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
    
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.laporan_detail_dana_masuk', compact('data'));
        return $pdf->stream("Laporan Dana Masuk".'pdf');
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


    public function delete_penyaluran_bantuan(Request $request){
        $id =  $request->input('id');
        $keluar = DB::table('view_stok_keluar')->select("*")->where('id',$id)->get(1);
        $masuk = DB::table('stok_masuk')->select("*")->where('id',$keluar[0]->id_stok_masuk)->get(1);
        $qty = $masuk[0]->qty + $keluar[0]->qty;
        $sisa =  $masuk[0]->sisa_disebar - $keluar[0]->qty;
        DB::table('stok_masuk')->where('id',$keluar[0]->id_stok_masuk)->update([
            'qty' =>$qty ,
            'sisa_disebar' =>$sisa,
        ]);
        DB::table('stok_keluar')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data Bantuan Berhasil Dihapus!');
    }


    public function laporan_masuk(Request $request){
        if($request->segment(2) == 'laporan_bantuan_dana'){
            if($request->input('start') != null || $request->input('end') != null){
                $data = DB::table('detail_dana_masuk')->select("*")->whereDate('tgl_masuk',">=",$request->input('start') )->whereDate('tgl_masuk',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('detail_dana_masuk')->select("*")->orderby('created_at','desc')->paginate(15);

            }
        }elseif($request->segment(2) == 'laporan_bantuan_makanan'){
            if($request->input('start') != null || $request->input('end') != null){
                $data = DB::table('stok_masuk')->select("*")->where('kategori','makanan')->whereDate('tgl_masuk',">=",$request->input('start') )->whereDate('tgl_masuk',"<=",$request->input('end') )->orderby('exp_date','asc')->paginate(15);
            }else{
                $data = DB::table('stok_masuk')->select("*")->where('kategori','makanan')->orderby('exp_date','asc')->paginate(15);

            }
        }else{
            $data = DB::table('stok_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        }
        return view('admin/laporan_masuk',['data'=>$data]);
    }

    public function laporan_masuk_report(Request $request){
        if($request->segment(2) == 'laporan_bantuan_dana_report'){
            $data = DB::table('detail_dana_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        }elseif($request->segment(2) == 'laporan_bantuan_makanan_report'){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','makanan')->orderby('exp_date','asc')->paginate(15);
        }else{
            $data = DB::table('stok_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.laporan_masuk_report', compact('data'));
        return $pdf->stream("Laporan Masuk".'pdf');
    }

    public function laporan_bantuan(Request $request){
        if($request->segment(2) == 'laporan_penyaluran_makanan'){
            if($request->input('start') != null || $request->input('end') != null){
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->orderby('created_at','desc')->paginate(15);

            }
            }elseif($request->segment(2) == 'laporan_penyaluran_dana'){
            if($request->input('start') != null || $request->input('end') != null){   
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);

            }
        }else{
            if($request->input('start') != null || $request->input('end') != null){   
                $data = DB::table('view_stok_keluar')->select("*")->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->orderby('created_at','desc')->paginate(15);

            }
        }
        return view('admin/laporan_bantuan',['data'=>$data]);
    }


    public function laporan_bantuan_report(Request $request){
        if($request->segment(2) == 'laporan_penyaluran_makanan_report'){
            if($request->input('start') != null || $request->input('end') != null){
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->orderby('created_at','desc')->paginate(15);

            }        
        }elseif($request->segment(2) == 'laporan_penyaluran_dana_report'){
            if($request->input('start') != null || $request->input('end') != null){   
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Dana')->orderby('created_at','desc')->paginate(15);

            }        
        }else{
            if($request->input('start') != null || $request->input('end') != null){   
                $data = DB::table('view_stok_keluar')->select("*")->whereDate('created_at',">=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select("*")->orderby('created_at','desc')->paginate(15);

            }        
        }
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.laporan_bantuan_report', compact('data'));
        return $pdf->stream("Laporan Penyaluran".'pdf');
    }

    public function user_list(){
        if(Auth::user()->role_user == 'admin' || Auth::user()->role_user == 'ceo'){
            $data = DB::table('users')->select('*')->orderby('created_at','desc')->paginate(15);
        }else{
            $data = DB::table('users')->select('*')->where('id', Auth::user()->id)->orderby('created_at','desc')->paginate(15);

        }    
        return view('admin/user_list',['data'=>$data]);
    }

    public function laporan_user(){
        $data = DB::table('users')->select('*')->orderby('created_at','desc')->paginate(15);
        $pdf = PDF::setPaper('A4', 'potrait');
        $pdf->loadView('admin.laporan_user', compact('data'));
        return $pdf->stream("Laporan User".'pdf');
    }


    public function insert_user(Request $request){
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $role =  $request->input('role');
      

        DB::table('users')->insert([
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'telp' => $no_telp,
            'password' => bcrypt("123456"),
            'role_user' => $role,
            'is_active' => 1,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('message', 'Data User Berhasil Ditambah!');
    }

    public function edit_user(Request $request){
        $id = $request->input('id');
        $nama = $request->input('namas');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telps');
        $role =  $request->input('roles');
        $is_active =  $request->input('is_actives');
        $password =  $request->input('password');
        
        if($password == ''){
            DB::table('users')->where('id',$id)->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'email' => $email,
                'telp' => $no_telp,
                'role_user' => $role,
                'is_active' => $is_active,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'email' => $email,
                'telp' => $no_telp,
                'password' => bcrypt($password),
                'role_user' => $role,
                'is_active' => $is_active,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
        }    
        return redirect()->back()->with('message', 'Data User Berhasil Diedit!');
    }

    public function delete_user(Request $request){
        $id = $request->input('id');
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data User Berhasil Dihapus!');

           
    }

    public function volunteer(){
        $data = DB::table('volunteer')->select('*')->orderby('created_at','desc')->paginate(15);
        return view('admin/volunteer',['data'=>$data]);
    }

    public function laporan_volunteer(){
        $data = DB::table('volunteer')->select('*')->orderby('created_at','desc')->paginate(15);
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.laporan_user', compact('data'));
        return $pdf->stream("Laporan Volunteer".'pdf');
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
            'is_active' => 1,
            'tgl_gabung' => Carbon::now(),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id
        ]);

        DB::table('users')->insert([
            'nama' => $nama,
            'batch' => $batch,
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

    public function edit_volunteer(Request $request){
        $id = $request->input('id');
        $nama = $request->input('namas');
        $batch = $request->input('batchs');
      
        $alamat = $request->input('alamats');
      
        $is_active = $request->input('is_actives');
        $no_telp = $request->input('no_telps');
        $data = DB::table('volunteer')->where('id', $id)->select("*")->where('id',$id)->get(1);
        DB::table('volunteer')->where('id', $id)->update([
          
            'nama' => $nama,
            'batch' => $batch,
            'alamat' => $alamat,
            'is_active' => $is_active,
            'no_telp' => $no_telp,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->id
        ]);
        DB::table('users')->where('email', $data[0]->email)->update([
            
            'nama' => $nama,
            'alamat' => $alamat,
        
            'is_active' => $is_active,
            'telp' => $no_telp,
            'updated_at' => Carbon::now(),
            'updated_by' => Auth::user()->id
        ]);
        return redirect()->back()->with('message', 'Data Volunteer Berhasil Diupdate!');
    }

    public function delete_volunteer(Request $request){
        $id = $request->input('id');
        DB::table('volunteer')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data Volunteer Berhasil Dihapus!');

    }

    public function preview_barang_masuk(Request $request){
        $data = DB::table('preview_barang_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/preview_barang_masuk',['data'=>$data]);
    }

    public function insert_preview_bantuan(Request $request){
        $nama_makanan = $request->input('nama_makanan');
        $tgl_masuk = ($request->input('tgl_masuk')) ? $request->input('tgl_masuk') : Carbon::now() ;
        $exp_date = $request->input('exp_date');
        $berat = $request->input('berat');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $satuan = $request->input('satuan_barang');
        $pengantaran = $request->input('pengantaran');
        $kategori = $request->input('kategori');
        $keterangan = $request->input('keterangan');
        $total = $harga * $qty;
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
                'keterangan' => $keterangan,
                'total' => $total,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id

            ]);
        }else{
            DB::table('preview_barang_masuk')->insert([
                'nama' => $nama_makanan,
                'kategori' => $kategori,
                'berat' => $berat,
                'qty' => $harga,
                'total' => $harga,
                'tgl_masuk' => $tgl_masuk,
                'exp_date' => $exp_date,
                'pengiriman' => $pengantaran,
                'keterangan' => $keterangan,
                'satuan_barang' => 'Rupiah',
                'harga' => $harga,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id

            ]);
        }    
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }


    public function edit_preview_bantuan(Request $request){
        $id = $request->input('id');
        $nama_makanan = $request->input('nama_makanans');
        $data = DB::table('preview_barang_masuk')->select("*")->where('id',$id)->get(1);
        $tgl_masuk = ($request->input('tgl_masuks')) ? $request->input('tgl_masuks') : $data[0]->tgl_masuk ;
        $exp_date = ($request->input('exp_dates')) ? $request->input('exp_dates') : $data[0]->exp_date;
        $qty = $request->input('qtys');
        $harga = $request->input('hargas');
        $satuan = $request->input('satuan_barangs');
        $pengantaran = $request->input('pengantarans');
        $kategori = $request->input('kategoris');
        $keterangan = $request->input('keterangans');
        $total = $harga * $qty;


        if($kategori == 'makanan'){
            DB::table('preview_barang_masuk')->where('id',$id)->update([
                'nama' => $nama_makanan,
                'kategori' => $kategori,
                'qty' => $qty,
                'tgl_masuk' => $tgl_masuk,
                'exp_date' => $exp_date,
                'pengiriman' => $pengantaran,
                'satuan_barang' => $satuan,
                'harga' => $harga,
                'keterangan' => $keterangan,
                'total' => $total,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id

            ]);
        }else{
            DB::table('preview_barang_masuk')->where('id',$id)->update([
                'nama' => $nama_makanan,
                'kategori' => $kategori,
                'qty' => $harga,
                'total' => $harga,
                'tgl_masuk' => $tgl_masuk,
               
                'pengiriman' => $pengantaran,
                'keterangan' => $keterangan,
                'harga' => $harga,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id

            ]);
        }    
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }

    public function delete_preview_bantuan(Request $request){
        $id = $request->input('id');
        DB::table('preview_barang_masuk')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Data Preview Berhasil Dihapus!');

    }

    public function insert_stok_masuk(Request $request){
        $nama = $request->input('nama');
        $no_telp = $request->input('no_telp');
        /*Save File TTD Donatur*/
        $folderPath = public_path("file_ttd_masuk/");
        if($request->signed != ''){    
            $image = explode(";base64,", $request->signed);
              
            $image_type = explode("image/", $image[0]);
           
            $image_type_png = $image_type[1];
           
            $image_base64 = base64_decode($image[1]);
            $ttd = uniqid();
            $file_ttd_pemberi = $folderPath . $ttd . '.'.$image_type_png;
            file_put_contents($file_ttd_pemberi, $image_base64);
            $file_name_ttd = $ttd . '.'.$image_type_png;
        }else{
            $file_name_ttd = NULL;
        }
        /*End Save File TTD Donatur*/
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $code = "";
        for ($i = 0; $i < 16; $i++) {
            $code .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        if($request->gambar != ''){
            $file_name = $code.'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('img/bukti_masuk'), $file_name);
        }else{
            $file_name = NULL;
        }

        $data = DB::table('preview_barang_masuk')->select("*")->where('created_by',Auth::user()->id)->get();
        foreach($data as $datas){
            if($datas->kategori == 'makanan'){
                DB::table('stok_masuk')->insert([
                    'nama' => $datas->nama,
                    'nama_pemberi' => $nama,
                    'no_telp_pemberi' => $no_telp,
                    'kategori' => $datas->kategori,
                    'berat' => $datas->berat,
                    'qty' => $datas->qty,
                    'qty_masuk' => $datas->qty,
                    'sisa_disebar' => 0,
                    'tgl_masuk' => $datas->tgl_masuk,
                    'exp_date' => $datas->exp_date,
                    'pengiriman' => $datas->pengiriman,
                    'satuan_barang' => $datas->satuan_barang,
                    'harga' => $datas->harga,
                    'keterangan' => $datas->keterangan,
                    'total' => $datas->total,
                    'file_path' => $file_name,
                    'path_ttd_pemberi' => $file_name_ttd,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id

                ]);
            }else{
                $master = DB::table('stok_masuk')->select('*')->where('kategori','dana')->get(1);
                $total = $datas->qty + $master[0]->qty ; 
                
                DB::table('stok_masuk')->where('kategori','dana')->update([
                    'qty' => $total,
                    'harga' => $total,
                ]);
                DB::table('detail_dana_masuk')->insert([
                    'id_stok_masuk' => $master[0]->id,
                    'nama' => $datas->nama,
                    'nama_pemberi' => $nama,
                    'no_telp_pemberi' => $no_telp,
                    'qty' => $datas->qty,
                    'tgl_masuk' => $datas->tgl_masuk,                
                    'pengiriman' => $datas->pengiriman,               
                    'keterangan' => $datas->keterangan,  
                    'file_path' => $file_name,
                    'path_ttd_pemberi' => $file_name_ttd,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id

                ]);

            }
            DB::table('preview_barang_masuk')->where('id',$datas->id)->delete();
        }  
        
        return redirect('admin/food_bank')->with('message', 'Data Bantuan Masuk Berhasil Disimpan!');

    }
   
    

    public function insert_bantuan(Request $request){
        $nama = $request->input('donatur');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $no_telp = $request->input('no_telp');
        $keterangan = $request->input('keterangan');
        $file_path = $request->input('file_path');

        $folderPath = public_path('file_ttd_masuk');
        
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
        $data = DB::table('view_preview_barang_keluar')->select("*")->orderby('created_at','desc')->paginate(15);
        $makanan = DB::table('stok_masuk')->select("*")->where('qty',">", 0)->where('kategori','makanan')->orderby('exp_date','asc')->get(15);
        $dana = DB::table('stok_masuk')->select("*")->where('kategori','dana')->orderby('tgl_masuk','asc')->get(15);

        return view('admin/preview_barang_keluar',['data'=>$data,'makanan'=>$makanan,'dana'=>$dana]);
    }

    public function insert_preview_bantuan_keluar(Request $request){
        $id = $request->input('id');
        $qty = $request->input('qty');
        
        $data = DB::table('stok_masuk')->select("*")->where('id',$id)->get(1);
       
        if($data[0]->kategori == 'makanan'){
            $cek = DB::table('preview_barang_keluar')->select("*")->where('id_stok_masuk',$id)->get(1);
            $total_qty = $qty + @$cek[0]->qty;
            $cek_qty = $data[0]->qty - $total_qty;
            if($cek_qty < 0){
                return redirect()->back()->with('error', 'Jumlah dari '. $data[0]->nama . ' tidak mencukupi!');

            }else{
            $total = $data[0]->harga * $qty;
                DB::table('preview_barang_keluar')->insert([
                    'id_stok_masuk' => $id,
                    'qty' => $qty,
                    'total' => $total,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id
                ]);
            }    
        }else{
            $total = $qty;
            DB::table('preview_barang_keluar')->insert([
                'id_stok_masuk' => $id,
                'qty' => $qty,
                'total' => $total,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id
            ]);
        }    
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }

    public function delete_preview_keluar(Request $request){
        $id = $request->input('id');
        DB::table('preview_barang_keluar')->where('id',$id)->delete();
       
        return redirect()->back()->with('message', 'Data Berhasil Diinput!');
    }
    

    public function insert_data_penerima(Request $request){
        $data = DB::table('view_preview_barang_keluar')->select("*")->orderby('created_at','desc')->paginate(15);
        return view('admin/insert_data_penerima',['data'=>$data]);
    }


    public function insert_bantuan_keluar(Request $request){
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        // $email = $request->input('email');
        $no_telp = $request->input('no_telp');
        // $keterangan = $request->input('keterangan');
        // $file_path = $request->input('file_path');
        $keperluan = $request->input('keperluan');

        /*Save File TTD Donatur*/
        // $folderPath = public_path('file_ttd_keluar');
        
        // $image = explode(";base64,", $request->signed);
              
        // $image_type = explode("image/", $image[0]);
           
        // $image_type_png = $image_type[1];
           
        // $image_base64 = base64_decode($image[1]);
           
        // $file_ttd_pemberi = $folderPath . uniqid() . '.'.$image_type_png;
        // file_put_contents($file_ttd_pemberi, $image_base64);
        /*End Save File TTD Donatur*/
      
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $code = "";
        for ($i = 0; $i < 16; $i++) {
            $code .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        // $file_name = $chars.'.'.$request->gambar->extension();  
        // $request->gambar->move(public_path('img/bukti_keluar'), $file_name);

        $preview = DB::table('preview_barang_keluar')->select("*")->where('created_by',Auth::user()->id)->get();
        foreach($preview as $previews){
            $data = DB::table('stok_masuk')->select("*")->where('id',$previews->id_stok_masuk)->get(1);
            $qty = $data[0]->qty - $previews->qty;
            $jlh_disebar = $data[0]->sisa_disebar + $previews->qty;
            $total = $previews->qty * $data[0]->harga;
            if($data[0]->kategori == 'makanan'){
                DB::table('stok_masuk')->where('id',$previews->id_stok_masuk)->update([
                    'qty' => $qty,
                    'sisa_disebar' =>$jlh_disebar,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
        
                ]);
            }else{
                DB::table('stok_masuk')->where('id',$previews->id_stok_masuk)->update([
                    'qty' => $qty,
                    'harga' => $qty,
                    'total' => $qty,
                    'selesai' => 1,
                    'sisa_disebar' => $jlh_disebar,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
        
                ]);
            }
            DB::table('stok_keluar')->insert([
                'id_stok_masuk' => $previews->id_stok_masuk,
                'qty' => $previews->qty,
                'selesai' => 0,
                'total' => $total ,
                'code_history' => $code,
                'keperluan' => $keperluan,
                'nama_penerima' => $nama,
                'alamat_penerima' => $alamat, 
                'no_telp_penerima' => $no_telp, 
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,
                // 'path_ttd' => $file_ttd_pemberi,
                // 'path_gambar' => $file_name
            ]);
            DB::table('preview_barang_keluar')->where('id',$previews->id)->delete();
        }

        return redirect('admin/list_bantuan')->with('message', 'Data Berhasil Diinput!');
    }

    public function insert_dana_keluar(Request $request){
        $qtys = $request->input('qty');   
        $keperluan = $request->input('keperluan');
        $keterangan = $request->input('keterangan');
        $id = $request->input('id');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
      
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $code = "";
        for ($i = 0; $i < 16; $i++) {
            $code .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

            $data = DB::table('stok_masuk')->select("*")->where('id',$id)->get(1);
            $qty = $data[0]->qty - $qtys;
            $jlh_disebar = $data[0]->sisa_disebar + $qtys;
          
                DB::table('stok_masuk')->where('id',$id)->update([
                    'qty' => $qty,
                    'harga' => $qty,
                    'total' => $qty,
                    
                    'sisa_disebar' => $jlh_disebar,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
        
                ]);
            
            DB::table('stok_keluar')->insert([
                'id_stok_masuk' => $id,
                'qty' => $qtys,
                'total' => $qtys,
                'selesai' => 1,
                'keterangan' => $keterangan,
                'code_history' => $code,
                'keperluan' => $keperluan,
                'nama_penerima' => $nama,
                'alamat_penerima' => $alamat, 
                'no_telp_penerima' => $no_telp, 
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id
            ]);

        return redirect('admin/laporan_penyaluran_dana')->with('message', 'Data Berhasil Diinput!');
    }


    public function list_bantuan(Request $request,$history = ''){
        if($request->input('start') != null || $request->input('end') != null){
            $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('kategori','makanan')->whereDate('created_at',"<=",@$request->input('start') )->whereDate('created_at',"<=",@$request->input('end') )->orderby('created_at','desc')->paginate(15);
        }else{
            $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('kategori','makanan')->orderby('created_at','desc')->paginate(15);
      
        }
            if($history != ''){
            if($request->input('start') != null || $request->input('end') != null){
                $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('kategori','makanan')->where('kategori','makanan')->whereDate('created_at',"<=",$request->input('start') )->whereDate('created_at',"<=",$request->input('end') )->orderby('created_at','desc')->paginate(15);
            }else{
                $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('kategori','makanan')->where('kategori','makanan')->orderby('created_at','desc')->paginate(15);

            }
        }
        return view('admin/list_bantuan',['data'=>$data]);
    }

    public function list_bantuan_report(Request $request){
        $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('kategori','makanan')->orderby('created_at','desc')->paginate(15);
        
        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.list_bantuan_report', compact("data"));
        return $pdf->stream("Laporan List Pembagian Bantuan".'pdf');  
    }

    public function update_list_bantuan(Request $request){
        $history = $request->input('history');

        /*Save File TTD Donatur*/
        $folderPath = public_path('file_ttd_keluar/');
       
        $image = explode(";base64,", $request->signed);
              
        $image_type = explode("image/", $image[0]);
           
        $image_type_png = $image_type[1];
           
        $image_base64 = base64_decode($image[1]);
        $ttd = uniqid();
        $file_ttd_pemberi = $folderPath . $ttd . '.'.$image_type_png;
        $file_ttd = $ttd . '.'.$image_type_png;
        file_put_contents($file_ttd_pemberi, $image_base64);
        /*End Save File TTD Donatur*/
      
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $code = "";
        for ($i = 0; $i < 16; $i++) {
            $code .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        $file_name = $code.'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('img/bukti_keluar'), $file_name);

        $preview = DB::table('stok_keluar')->select("*")->where('code_history',$history)->get();
        foreach($preview as $previews){
           
            DB::table('stok_keluar')->where('code_history',$history)->update([
                'selesai' => 1,
            
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id,
                'path_ttd' => $file_ttd,
                'path_gambar' => $file_name
            ]);
            DB::table('preview_barang_keluar')->where('id',$previews->id)->delete();
        }

        return redirect()->back();
    }



    public function detail_list_bantuan(Request $request,$code){
        $data = DB::table('view_stok_keluar')->select('*')->where('code_history',$code)->orderby('created_at','desc')->paginate(15);
        return view('admin/laporan_bantuan',['data'=>$data]);
    }


    public function laporan_dana(Request $request){
        $bantuan_individual = DB::table('detail_dana_masuk')->select('*')->orderby('created_at','desc')->sum('qty');
        $bantuan_perusahaan = DB::table('stok_masuk')->select('*')->where('kategori','makanan')->orderby('created_at','desc')->sum('total');
        $total_bantuan_masuk = $bantuan_individual + $bantuan_perusahaan;
        $bantuan_keluar = DB::table('view_stok_keluar')->select('*')->where('kategori','makanan')->orderby('created_at','desc')->sum('total');
        $operasional = DB::table('view_stok_keluar')->select('*')->where('keperluan','Keperluan Operasional')->orderby('created_at','desc')->sum('total');
        $program = DB::table('view_stok_keluar')->select('*')->where('keperluan','Pelaksanaan Program')->orderby('created_at','desc')->sum('total');
        $total_pengeluaran = $operasional + $program;
        $nett_loss = $total_bantuan_masuk - $bantuan_keluar - $total_pengeluaran;

        return view('admin/laporan_keuangan',['bantuan_individual'=>$bantuan_individual,'bantuan_perusahaan'=> $bantuan_perusahaan,'total_bantuan_masuk'=> $total_bantuan_masuk,'bantuan_keluar'=> $bantuan_keluar,'operasional' => $operasional,'program'=> $program, 'total_pengeluaran' => $total_pengeluaran, 'nett_loss' => $nett_loss ]);
    }

    public function laporan_dana_report(Request $request){
        $bantuan_individual = DB::table('detail_dana_masuk')->select('*')->orderby('created_at','desc')->sum('qty');
        $bantuan_perusahaan = DB::table('stok_masuk')->select('*')->where('kategori','makanan')->orderby('created_at','desc')->sum('total');
        $total_bantuan_masuk = $bantuan_individual + $bantuan_perusahaan;
        $bantuan_keluar = DB::table('view_stok_keluar')->select('*')->where('kategori','makanan')->orderby('created_at','desc')->sum('total');
        $operasional = DB::table('view_stok_keluar')->select('*')->where('keperluan','Keperluan Operasional')->orderby('created_at','desc')->sum('total');
        $program = DB::table('view_stok_keluar')->select('*')->where('keperluan','Pelaksanaan Program')->orderby('created_at','desc')->sum('total');
        $total_pengeluaran = $operasional + $program;
        $nett_loss = $total_bantuan_masuk - $bantuan_keluar - $total_pengeluaran;

        $pdf = PDF::setPaper('A4', 'landscape');
        $pdf->loadView('admin.laporan_keuangan_report', compact('bantuan_individual',"bantuan_perusahaan","total_bantuan_masuk","bantuan_keluar","operasional","program","total_pengeluaran","nett_loss"));
        return $pdf->stream("Laporan Dana Masuk".'pdf');  
    }  
    
}