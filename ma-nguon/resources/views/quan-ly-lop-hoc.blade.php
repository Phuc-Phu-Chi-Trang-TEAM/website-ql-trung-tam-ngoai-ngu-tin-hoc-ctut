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
        <div class="title ui-widget-header ui-corner-all">Quản lý lớp học</div>
          <form action="quan-ly-lop-hoc" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_lop_hoc))
                        @foreach ($thong_tin_lop_hoc as $ttlh)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã lớp học</label></td>
                                        <td width="400" ><input type="text" name="ma_lop_hoc" class="input1" value="{{$ttlh->Ma_lop_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên lớp học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_lop_hoc" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Ghi chú</label></td>
                                        <td width="400" ><input type="text" name="ghi_chu" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Khóa Học</label></td>
                                          <td>
                                          <select name="khoa_hoc" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn khóa học</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Buổi Học</label></td>
                                          <td>
                                          <select name="buoi_hoc" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn buổi học</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Chứng Chỉ</label></td>
                                          <td>
                                          <select name="chung_chi" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn chứng chỉ</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                            </table>
                        @endforeach
                    @elseif(isset($thong_tin_lop_hoc_xoa))
                        @foreach ($thong_tin_lop_hoc_xoa as $ttlhx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; color:red; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa lớp học này ?
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã lớp học</label></td>
                                        <td width="400" ><input type="text" name="ma_lop_hoc" class="input1" value="{{$ttlhx->Ma_lop_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên lớp học<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_lop_hoc" class="input1" value="{{$ttlhx->Ten_lop_hoc}}" readonly/></td>
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
                                        <td widht="200"><label for="nn">Tên lớp học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_lop_hoc" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Ghi chú</label></td>
                                        <td width="400" ><input type="text" name="ghi_chu" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Khóa Học</label></td>
                                          <td>
                                          <select name="khoa_hoc" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn khóa học</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Buổi Học</label></td>
                                          <td>
                                          <select name="buoi_hoc" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn buổi học</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Chứng Chỉ</label></td>
                                          <td>
                                          <select name="chung_chi" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn chứng chỉ</option>
                                          </select></div>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách lớp học</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã lớp học</th>
                                        <th class="sorting"  style="width: 160px;">Tên lớp học</th>
                                        <th class="sorting"  style="width: 309px;">Ghi Chú</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_lop_hoc as $dsph)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsph->Ma_lop_hoc}}</td>
                                        <td>{{$dsph->Ten_lop_hoc}}</td>
                                        <td>{{$dsph->Ghi_chu}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-lop-hoc/delete/{{$dsph->Ma_lop_hoc}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-lop-hoc/{{$dsph->Ma_lop_hoc}}">Sửa</a></td>
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