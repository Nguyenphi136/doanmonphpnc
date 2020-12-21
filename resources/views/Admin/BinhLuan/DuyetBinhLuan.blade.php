@extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Bình Luận
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người Bình Luận</th>
                                <th>Tên Bài Viết</th>
                                <th>Nội Dung</th>
                                <th>Tình Trạng</th>                         
                                <th>Xóa </th>           
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($binhluan as $bl)
                            @if($bl->DaDuyet==0)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bl->id}}</td>
                                <td>{{$bl->User->name}}</td>
                                <td>{{$bl->baiviet->TieuDe}}</td>
                                <td>{!!$bl->NoiDung!!}</td>
                                <td>{{$bl->DaDuyet}}</td>
                                @if($bl->DaDuyet==0)
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>    <a href="{{route('binhluan.duyet',$bl->id)}}"> Duyệt</a></td>
                    @endif
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('binhluan.delete',$bl->id)}}"> Xóa</a></td>
                                
                            </tr>
                            @endif
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
