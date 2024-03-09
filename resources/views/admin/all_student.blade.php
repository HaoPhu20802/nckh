@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sinh viên
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-3" style="float:right">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Search</button>
              </span>
            </div>
        </div>
    </div>
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Ngành</th>
            <th>Email</th>
            <th>Password</th>
            <th>Số điện thoại</th>
            <th>Niên khóa</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_student as $key => $data_student)
          <tr>
            <td>{{$data_student->student_id}}</td>
            <td>{{$data_student->student_name}}</td>
            <td>{{$data_student->student_ngaysinh}}</td>
            <td>{{$data_student->nganh_ten}}</td>
            <td>{{$data_student->student_email}}</td>
            <td>{{$data_student->student_password}}</td>
            <td>{{$data_student->student_sdt}}</td>
            <td>{{$data_student->student_nienkhoa}}</td>
            <td>
              <a href="{{URL::to('/edit-student/'.$data_student->student_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:15px;"></i></a>
              <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{URL::to('/delete-student/'.$data_student->nganh_id)}}" class="active" ui-toggle-class=""> 
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection