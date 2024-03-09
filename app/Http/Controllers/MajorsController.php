<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class MajorsController extends Controller
{
    public function add_major(){
        $faculty = DB::table('tbl_khoa')->orderby('khoa_id','desc')->get();
        return view('admin.add_major')->with('faculty',$faculty);
    }
    public function all_major(){
        $all_major = DB::table('tbl_major')
        ->join('tbl_khoa','tbl_khoa.khoa_id','=','tbl_major.khoa_id')
        ->orderby('tbl_major.nganh_id','desc')->get();
        $manager_major = view('admin.all_major')->with('all_major',$all_major);
       return view('admin_layout')->with('admin.all_faculty',$manager_major); 
    }
    public function save_major(Request $request){
        $data = array();
        $data['khoa_id'] = $request->faculty;
        $data['nganh_ten'] = $request->major_name;

        DB::table('tbl_major')->insert($data);
        Session::put('message','Thêm ngành thành công');
        return Redirect::to('add-major');
    }
    public function edit_major($nganh_id){
        $faculty = DB::table('tbl_khoa')->orderby('khoa_id','desc')->get();

        $edit_major = DB::table('tbl_major')->where('nganh_id',$nganh_id)->get();
        $manager_major = view('admin.edit_major')->with('edit_major',$edit_major)->with('faculty',$faculty);

        return view('admin_layout')->with('admin.edit_major',$manager_major);
    }

    public function update_major(Request $request, $nganh_id){
        $data = array();
        $data['khoa_id'] = $request->faculty;
        $data['nganh_ten'] = $request->major_name;
        DB::table('tbl_major')->where('nganh_id',$nganh_id)->update($data);
        Session::put('message','Cập nhật khoa thành công');
        return Redirect::to('all-major');
    }
    public function delete_major($nganh_id){
        DB::table('tbl_major')->where('nganh_id',$nganh_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-major');
    }
}
