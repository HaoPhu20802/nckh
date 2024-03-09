@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm khoa
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
                    <form role="form" action="{{URL::to('/save-faculty')}}" method="post">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên khoa</label>
                        <input type="text" name="faculty_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <button type="submit" name="add_faculty" class="btn btn-info">Thêm khoa</button>
                </form>
                </div>

            </div>
        </section>

</div>
@endsection