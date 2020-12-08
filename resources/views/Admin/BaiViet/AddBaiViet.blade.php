@extends('admin.layout.index')
 @section('content')

 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Viết
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                    @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                        </div>
                        @endif     
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                    {{session('thongbao')}}
                    </div>
                    @endif  

                        <form action="{{route('baiviet.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label>Chuyên Mục</label>
                            <select class="form-control" name="chuyenmuc" id="chuyenmuc">
                            @foreach($chuyenmuc as $cm)
                            <option value="{{$cm->id}}">{{$cm->Ten}}</option>
                            @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label> Loại Chuyên Mục</label>
                            <select class="form-control" name="loaichuyenmuc" id="loaichuyenmuc">
                            @foreach($loaichuyenmuc as $lcm)
                            <option value="{{$lcm->id}}">{{$lcm->Ten}}</option>
                            @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude"/>
                            </div>
                           
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo"  class="form-control ckeditor" rows="3" name="tomtat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" rows="5" name="noidung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="product_image">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                <input name="noibat" value="0" checked="" type= "radio"  />Không
                                </label>
                                <label class="radio-inline">
                                <input name="noibat" value="1" checked="" type= "radio"  />Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection
@section('script')
<script>
$(document).ready(function(){
    $("#chuyenmuc").change(function(){
        var idChuyenMuc = $(this).val();
      $.get("ajax/loaichuyenmuc/"+idChuyenMuc,function(data){
        $("#loaichuyenmuc").html(data);
      });
    });

});
</script>
@endsection
