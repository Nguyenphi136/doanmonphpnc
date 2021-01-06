@extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Viết
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>idUser</th>
                                
                                <th>Nội Dung</th>
                                
                                
                                <th>Xóa </th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baiviet->binhluan as $bl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bl->id}}</td>
                                <td>
                                    {{$bl->User->name}}
                                    
                                </td>
                                
                                <td>{{$bl->NoiDung}}</td>
                               
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/baiviet/binhluan/{{$bl->id}}">Xóa</a></td>
                             
                                
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
