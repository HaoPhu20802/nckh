@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <header class="panel-heading">
        Chỉnh sửa thông tin sinh viên
    </header>
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="panel-body">
        @foreach ($edit_student as $key => $data_student)
        <form class="form-horizontal bucket-form" action="{{URL::to('/update-student/'.$data_student->student_id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Họ và tên</label>
                <div class="col-sm-6">
                    <input type="text" name="ten" value="{{$data_student->student_name}}" class="form-control" required="">
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="date" value="{{$data_student->student_ngaysinh}}" name="date" class="form-control round-input" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ngành</label>
                <div class="col-sm-6">
                    <select name="major" class="form-control m-bot15" required="">
                        <option value="">Chọn ngành</option>
                        @foreach($nganh as $key => $data)
                            @if($data->nganh_id == $data_student->nganh_id)
                                <option selected value="{{$data->nganh_id}}">{{$data->nganh_ten}}</option>
                            @else
                                <option value="{{$data->nganh_id}}">{{$data->nganh_ten}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input class="form-control" name="email" value="{{$data_student->student_email}}" type="text" value="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input class="form-control" name="pwd" value="{{$data_student->student_password}}" type="password" value="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Số điện thoại</label>
                <div class="col-sm-6">
                    <input type="text" name="sdt" value="{{$data_student->student_sdt}}" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-3 control-label">Niên khóa</label>
                <div class="col-sm-6">
                    <input type="text" name="nk" value="{{$data_student->student_nienkhoa}}" class="form-control" placeholder="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-3 control-label">Phân quyền</label>
                <div class="col-sm-6">
                    <select name="role" class="form-control m-bot15">
                        <option selected value="{{$data_student->student_role}}">{{$data_student->student_role}}</option>
                    </select>
                </div>
            </div>
            <div style="text-align:center;">
                <button  type="submit" name="add_sv" class="btn btn-info">Cập nhật thông tin sinh viên</button>
            </div>
            
        </form>
        @endforeach
    </div>
</section>
@endsection