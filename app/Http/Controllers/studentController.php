<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class studentController extends Controller
{
    public function add_student(){
        $major = DB::table('tbl_major')->orderby('nganh_id','desc')->get();
        return view('admin.add_student')->with('nganh',$major);   
    }

    public function all_student(){
        $all_student = DB::table('tbl_students')
        ->join('tbl_major','tbl_major.nganh_id','=','tbl_students.nganh_id')->get();
        $manager_student = view('admin.all_student')->with('all_student',$all_student);
       return view('admin_layout')->with('admin.all_student',$manager_student); 
    }

    public function save_student(Request $request){
        // Lấy sinh viên cuối cùng từ cơ sở dữ liệu
        $latest_student = DB::table('tbl_students')->orderBy('student_id', 'desc')->first();
    
        // Kiểm tra xem có sinh viên cuối cùng không
        if ($latest_student) {
            // Nếu có sinh viên cuối cùng, lấy số thứ tự từ student_id của sinh viên đó và tăng lên một
            $latest_id_number = substr($latest_student->student_id, 1);
            $next_id_number = $latest_id_number + 1;
        } else {
            // Nếu không có sinh viên trong cơ sở dữ liệu, bắt đầu từ số 1
            $next_id_number = 1;
        }
    
        // Tạo student_id mới
        $student_id = 'B' . sprintf('%07d', $next_id_number);
    
        $data = array();
        $data['student_id'] = $student_id;
        $data['nganh_id'] = $request->major;
        $data['student_name'] = $request->ten;
        $data['student_ngaysinh'] = $request->date;
        $data['student_email'] = $request->email;
        $data['student_password'] = $request->pwd;
        $data['student_sdt'] = $request->sdt;
        $data['student_nienkhoa'] = $request->nk;
        $data['student_role'] = $request->role;
    
        // Kiểm tra email và số điện thoại hợp lệ
        if (!filter_var($data['student_email'], FILTER_VALIDATE_EMAIL)) {
            Session::put('message', 'Email không hợp lệ');
            return Redirect::to('add-student');
        }
    
        if (!preg_match("/^[0-9]{10}$/", $data['student_sdt'])) {
            Session::put('message', 'Số điện thoại không hợp lệ');
            return Redirect::to('add-student');
        }
    
        // Kiểm tra mật khẩu đủ mạnh
        if (strlen($data['student_password']) < 8) {
            Session::put('message', 'Mật khẩu phải có ít nhất 8 ký tự');
            return Redirect::to('add-student');
        }
    
        // Thêm sinh viên vào cơ sở dữ liệu
        DB::table('tbl_students')->insert($data);
        Session::put('message','Thêm sinh viên thành công');
        return Redirect::to('add-student');
    }    
    

    public function edit_student($student_id){
        $nganh = DB::table('tbl_major')->orderby('nganh_id','desc')->get();

        $edit_student = DB::table('tbl_students')->where('student_id',$student_id)->get();
        $manager_student = view('admin.edit_student')->with('edit_student',$edit_student)->with('nganh',$nganh);

        return view('admin_layout')->with('admin.edit_student',$manager_student);
    }

    public function update_student(Request $request, $student_id){
        $data = array();
        $data['student_id'] = $student_id;
        $data['nganh_id'] = $request->major;
        $data['student_name'] = $request->ten;
        $data['student_ngaysinh'] = $request->date;
        $data['student_email'] = $request->email;
        $data['student_password'] = $request->pwd;
        $data['student_sdt'] = $request->sdt;
        $data['student_nienkhoa'] = $request->nk;
        $data['student_role'] = $request->role;
        DB::table('tbl_students')->where('student_id',$student_id)->update($data);
        Session::put('message','Cập nhật khoa thành công');
        return Redirect::to('all-student');
    }
    public function delete_student($student_id){
        DB::table('tbl_students')->where('student_id',$student_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-student');
    }
}
