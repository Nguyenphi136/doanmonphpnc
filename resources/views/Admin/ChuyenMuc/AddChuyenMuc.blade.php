@extends('admin.layout.index')
 @section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chuyên Mục
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('chuyenmuc.store') }}" method="POST">                           
                            @csrf
                            <div class="form-group">
                                <label>Tên Chuyên Mục</label>
                                <input class="form-control" name="Ten" placeholder="Nhập Tên Chuyên Mục" />
                            </div>
                          <!--  <div class="form-group">
                                <label>Tên Không Dấu</label>
                                <input class="form-control" name="TenKhongDau" placeholder="Nhập Tên Chuyên Mục" />
                            </div>
                          -->
                            <button type="submit" class="btn btn-default"> Add</button>
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