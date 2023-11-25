<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Carbon;
use PDF;

class MainPageController extends Controller
{
    //

    public function dashboard(Request $request){
        if($request->input('tahun') != '' ){
            $volunteer = DB::table('volunteer')->select("*")->where('is_active',1)->get();
            $total_dana = DB::table('detail_dana_masuk')->select(DB::raw('SUM(qty) as total_dana'),DB::raw("YEAR(created_at) as tahun"))->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->groupBy(DB::raw("YEAR(created_at)"))->get();
            $dibagikan = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->count();
            $dana = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->count();
            $bantuan_masuk = DB::table('stok_masuk')->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->groupBy(DB::raw("YEAR(created_at)"))->count();
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->where('selesai',1)->orderby('created_at','desc')->paginate(5);
        }else{
            $volunteer = DB::table('volunteer')->select("*")->where('is_active',1)->get();
            $total_dana = DB::table('detail_dana_masuk')->select(DB::raw('SUM(qty) as total_dana'),DB::raw("YEAR(created_at) as tahun"))->where(DB::raw("YEAR(created_at)"),Carbon::now())->groupBy(DB::raw("YEAR(created_at)"))->get();
            $dibagikan = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->count();
            $dana = DB::table('view_stok_keluar')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->count();
            $bantuan_masuk = DB::table('stok_masuk')->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->groupBy(DB::raw("YEAR(created_at)"))->count();
            $data = DB::table('view_stok_keluar')->select("*")->where('kategori','Makanan')->where('selesai',1)->orderby('created_at','desc')->paginate(5);
        }

        return view('landing/dashboard',['total_dana'=>$total_dana,'volunteer'=>$volunteer,'dibagikan'=>$dibagikan,'dana'=>$dana, 'bantuan_masuk' => $bantuan_masuk,'data'=> $data]);
    }

    public function detail_dana_masuk_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('detail_dana_masuk')->select("*")->orderby('created_at','desc')->paginate(15);
        }else{
            $data = DB::table('detail_dana_masuk')->select("*")->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }
        return view('landing/laporan_masuk',['data'=>$data]);
    }

    public function detail_makanan_masuk_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('stok_masuk')->select("*")->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->paginate(15);
        }else{
            $data = DB::table('detail_dana_masuk')->select("*")->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(15);
        }
        return view('landing/laporan_masuk',['data'=>$data]);
    }

    public function detail_penyaluran_makanan_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai'  )->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }else{
            $data =  DB::table('view_stok_keluar')->select('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->groupby('path_ttd','path_gambar','code_history','nama_penerima','alamat_penerima','keperluan','created_at','updated_at','nama_volunteer','selesai')->where('selesai',1)->where('kategori','makanan')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(15);
        }
        return view('landing/list_bantuan',['data'=>$data]);
    }

    public function detail_list_bantuan(Request $request,$code){
        $data = DB::table('view_stok_keluar')->select('*')->where('code_history',$code)->orderby('created_at','desc')->paginate(15);
        return view('landing/laporan_bantuan',['data'=>$data]);
    }

    public function detail_penyaluran_dana_widget(Request $request){
        if($request->input('tahun') == ''){
            $data = DB::table('view_stok_keluar')->select('*')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),Carbon::now())->orderby('created_at','desc')->paginate(15);
        }else{
            $data =  DB::table('view_stok_keluar')->select('*')->where('selesai',1)->where('kategori','dana')->where(DB::raw("YEAR(created_at)"),$request->input('tahun'))->orderby('created_at','desc')->paginate(15);
        }
        return view('landing/laporan_bantuan',['data'=>$data]);
    }

}