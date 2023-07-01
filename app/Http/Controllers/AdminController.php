<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;

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
}