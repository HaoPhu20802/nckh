@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật ngành
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
                    @foreach ($edit_major as $key => $data_major)
                    <form role="form" action="{{URL::to('/update-major/'.$data_major->nganh_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn khoa</label>
                            <select name="faculty" class="form-control m-bot15">
                                @foreach($faculty as $key => $data)
                                    @if($data->khoa_id == $data_major->khoa_id)
                                        <option selected value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                    @else
                                        <option value="{{$data->khoa_id}}">{{$data->khoa_ten}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên ngành</label>
                            <input type="text" value="{{$data_major->nganh_ten}}" name="major_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <button type="submit" name="update_major" class="btn btn-info">Cập nhật ngành</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

</div>
@endsection