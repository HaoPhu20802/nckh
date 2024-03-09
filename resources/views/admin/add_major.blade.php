@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm ngành
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-major')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn khoa</label>
                            <select name="faculty" class="form-control m-bot15">
                                @foreach($faculty as $key => $data)
                                <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên ngành</label>
                            <input type="text" name="major_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <button type="submit" name="add_major" class="btn btn-info">Thêm ngành</button>
                    </form>
                </div>

            </div>
        </section>

</div>
@endsection