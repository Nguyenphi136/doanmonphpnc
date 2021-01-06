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
                                <th>Tiêu Đề</th>
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                <th>Nổi Bật</th>
                                <th>Số Lượt Xem</th>
                                <th>Xóa </th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baiviet as $bv)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bv->id}}</td>
                                <td>
                                    <p>{{$bv->TieuDe}}</p>
                                    <img width="100px" src="{{url('storage/upload/tintuc')}}/{{$bv->Hinh}}"/>
                                </td>
                                <td>{{$bv->TomTat}}</td>
                                <td>{!!$bv->NoiDung!!}</td>
                                <td>{{$bv->loaichuyenmuc->chuyenmuc->Ten}}</td>
                                <td>{{$bv->loaichuyenmuc->Ten}}</td>
                                <td>
                                    @if($bv->NoiBat == 0 )
                                    {{'Không'}}
                                    @else
                                    {{'Có'}}
                                    @endif
                                 </td>
                                <td>{{$bv->SoLuotXem}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('baiviet.delete',$bv->id)}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('baiviet.edit',$bv->id)}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('baiviet.binhluan',$bv->id)}}">Danh Sách Bình Luận</a></td>
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
