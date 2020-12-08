@extends('admin.layout.index')
 @section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chuyên Mục
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('chuyenmuc.update',$chuyenmuc->id) }}" method="POST"> 
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                        </div>
                        @endif  
                        @if (session(‘thongbao'))

                        <div class="alert alert-success">

                          {{ session(‘thongbao') }}

                            </div>

                             @endif                        
                            @csrf
                            <div class="form-group">
                                <label>Tên Chuyên Mục</label>
                                <input class="form-control" name="Ten" placeholder="Nhập Tên Chuyên Mục" value="{{$chuyenmuc->Ten}}" />
                            </div>
                          <!--  <div class="form-group">
                                <label>Tên Không Dấu</label>
                                <input class="form-control" name="TenKhongDau" placeholder="Nhập Tên Chuyên Mục" />
                            </div>
                          -->
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

      
 @endsection 