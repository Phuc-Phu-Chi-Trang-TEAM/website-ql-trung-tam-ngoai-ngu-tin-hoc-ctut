@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif

        @if (session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="title ui-widget-header ui-corner-all">Quản lý người dùng</div>
          <form action="quan-ly-nguoi-dung" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_nguoi_dung))
                        @foreach ($thong_tin_nguoi_dung as $ttnd)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã người dùng</label></td>
                                        <td width="400" ><input type="text" name="ma_nguoi_dung" class="input1" value="{{$ttnd->Ma_nguoi_dung}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên đăng nhập<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_dang_nhap" class="input1" value="{{$ttnd->Ten_dang_nhap}}"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mật khẩu<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="password" name="mat_khau" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Quyền <span style="color:red">*</span></label></td>
                                        <td>
                                            <select name="quyen" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="{{$ttnd->Quyen}}">{{$ttnd->Quyen}}</option>
                                                <option value="User">User</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td colspan="2" align="center">
                                            <input type="submit" name="btn_luu" class="nut" value="Lưu">
                                            <input type="submit" name="btn_huy" class="nut" value="Hủy Bỏ"/>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                        @endforeach
                    @elseif(isset($thong_tin_nguoi_dung_xoa))
                        @foreach ($thong_tin_nguoi_dung_xoa as $ttndx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa phòng học này ?<br>
                                        <span style="color:red; font-size:12px"><i>(Cảnh báo: Bạn đang sắp xóa một tài khoản người dùng khỏi hệ thống. Hãy cân nhắc trước khi thực hiện điều này)</i></span>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã người dùng</label></td>
                                        <td width="400" ><input type="text" name="ma_nguoi_dung" class="input1" value="{{$ttndx->Ma_nguoi_dung}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên đăng nhập</label></td>
                                        <td width="400" ><input type="text" name="ten_dang_nhap" class="input1" value="{{$ttndx->Ten_dang_nhap}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td colspan="2" align="center">
                                            <input type="submit" name="btn_xoa" class="nut" value="Xóa">
                                            <input type="submit" name="btn_huy" class="nut" value="Hủy Bỏ"/>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                        @endforeach
                    @else
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên đăng nhập<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_dang_nhap" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mật khẩu<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="password" name="mat_khau" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Quyền <span style="color:red">*</span></label></td>
                                        <td>
                                            <select name="quyen" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn quyền</option>
                                                <option value="User">User</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td colspan="2" align="center">
                                            <input type="submit" name="btn_them" class="nut" value="Thêm">
                                            <input type="submit" name="btn_huy" class="nut" value="Hủy Bỏ"/>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                    @endif
                    </div>
                </div><!--ket thuc dk-->
            </div><!---ket thuc nen-->
        </form>

            <div class="group-box">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Danh sách người dùng</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 200px;">Mã người dùng</th>
                                        <th class="sorting_desc" style="width: 200px;">Tên đăng nhập</th>
                                        <th class="sorting"  style="width: 200px;">Mật khẩu</th>
                                        <th class="sorting"  style="width: 309px;">Quyền</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_nguoi_dung as $dsnd)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsnd->Ma_nguoi_dung}}</td>
                                        <td>{{$dsnd->Ten_dang_nhap}}</td>
                                        <td style="width: 200px; overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical;">{{$dsnd->Mat_khau}}</td>
                                        <td>{{$dsnd->Quyen}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-nguoi-dung/delete/{{$dsnd->Ma_nguoi_dung}}"> Xóa</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-nguoi-dung/{{$dsnd->Ma_nguoi_dung}}">Sửa</a></td>
                                    </tr>
                                @endforeach
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
    
        
    </div>
</div>	<!-- End of Main Content -->
@endsection;