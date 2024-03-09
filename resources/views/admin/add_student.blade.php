@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <header class="panel-heading">
        Thêm thông tin sinh viên
    </header>
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="panel-body">
        <form class="form-horizontal bucket-form" action="{{URL::to('/save-student')}}" method="post">
            {{csrf_field()}}
            {{-- <div class="form-group">
                <label class="col-sm-3 control-label">Mã số sinh viên</label>
                <div class="col-sm-6">
                    <input type="text" name="mssv" class="form-control">
                </div>
            </div> --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Họ và tên</label>
                <div class="col-sm-6">
                    <input type="text" name="ten" class="form-control" required="">
                   
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="date" name="date" class="form-control round-input" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ngành</label>
                <div class="col-sm-6">
                    <select name="major" class="form-control m-bot15" required="">
                        <option value="">Chọn ngành</option>
                        @foreach($nganh as $key => $data)
                        <option value="{{$data->nganh_id}}">{{$data->nganh_ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input class="form-control" name="email"  type="text" value="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input class="form-control" name="pwd" type="password" value="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Số điện thoại</label>
                <div class="col-sm-6">
                    <input type="text" name="sdt" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-3 control-label">Niên khóa</label>
                <div class="col-sm-6">
                    <input type="text" name="nk" class="form-control" placeholder="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class=" col-sm-3 control-label">Phân quyền</label>
                <div class="col-sm-6">
                    <select name="role" class="form-control m-bot15" required="">
                        <option value="1">Sinh viên</option>
                        <option value="2">Giảng viên</option>
                    </select>
                </div>
            </div>
            <div style="text-align:center;">
                <button  type="submit" name="add_sv" class="btn btn-info">Thêm sinh viên</button>
            </div>
            
        </form>
    </div>
</section>
@endsection