@extends('admin.layout.index')
 @section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> User
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
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
                        <form action="{{route('User.update',$user->id) }}" method="POST">                           
                            @csrf
                            <div class="form-group">
                                <label>Ho Ten</label>
                                <input class="form-control" name="name" placeholder="Nhập Ho Tên " value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập Email " value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập Password" value="{{$user->password}}" />
                            </div>
                            <div class="form-group">
                                <label>Password Again</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lai Password" value="{{$user->password}}" />
                            </div>
                            <div class="form-group">
                                <label>Quyen</label>
                                <label class="radio-inline">
                                

                                @if ($user->quyen==1)
                                <label class="radio">
                                <input name="quyen"  type= "radio" value="1" checked />Admin 
                                </label>
                                <label class="radio">
                                <input name="quyen"  type= "radio" value="0"   />Thường
                                </label>

                                @else   
                                <label class="radio">
                                <input name="quyen"  type= "radio" value="1"  />       Admin 
                                </label>
                                <label class="radio">
                                <input name="quyen"  type= "radio" checked value="0" />Thường
                                </label>

                                @endif
                                </lable>
                                
                                

                              
                                
                               
                            </div>
                          
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