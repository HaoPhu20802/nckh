@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật khoa
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_faculty as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-faculty/'.$edit_value->khoa_id)}}" method="post">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên khoa</label>
                        <input type="text" value="{{$edit_value->khoa_ten}}" name="faculty_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <button type="submit" name="update_faculty" class="btn btn-info">Cập nhật khoa</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection