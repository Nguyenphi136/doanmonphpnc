@extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Chuyên Mục
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Loại Chuyên Mục</th>
                                <th>Tên Không Dấu</th>
                                <th>Chuyên Mục</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($loaichuyenmuc as $lcm)
                            <tr class="odd gradeX" align="center">
                            <td>{{$lcm->id}}</td> 
                            <td>{{$lcm->Ten}}</td>
                            <td>{{$lcm->TenKhongDau}}</td>
                            <td>{{$lcm->chuyenmuc['Ten']}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('loaichuyenmuc.delete',$lcm->id)}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('loaichuyenmuc.edit',$lcm->id)}}">Sửa</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection 