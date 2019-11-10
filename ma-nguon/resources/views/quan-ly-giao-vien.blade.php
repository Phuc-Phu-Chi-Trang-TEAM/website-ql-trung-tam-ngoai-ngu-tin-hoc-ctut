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
        <div class="title ui-widget-header ui-corner-all">Quản lý giáo viên</div>
          <form action="quan-ly-giao-vien" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_giao_vien))
                        @foreach ($thong_tin_giao_vien as $ttgv)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Mã giáo viên</label></td>
                                        <td width="400" ><input type="text" name="ma_giao_vien" class="input1" value="{{$ttgv->Ma_giao_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Tên giáo viên <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="ten_giao_vien" class="input1" value="{{$ttgv->Ten_giao_vien}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ngày sinh <span style="color:red">*</span></label></td>
                                      <td width="400"><input style="width:250px; margin-left:5px" type="date" name="ngay_sinh" class="input1" value="{{$ttgv->Ngay_sinh}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Nơi sinh <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="noi_sinh" class="input1" value="{{$ttgv->Noi_sinh}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">CMND <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="cmnd" class="input1" value="{{$ttgv->CMND}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Học vị <span style="color:red">*</span></label></td>
                                          <td>
                                          <select name="hoc_vi" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="{{$ttgv->Hoc_vi}}" selected>{{$ttgv->Hoc_vi}}</option>
                                              <option value="">Cử nhân</option>
                                              <option value="">Thạc sĩ</option>
                                              <option value="">Tiến sĩ</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Chuyên ngành <span style="color:red">*</span></label></td>
                                          <td>
                                          <select name="ma_chuyen_nganh" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="{{$ttgv->Ma_chuyen_nganh}}">{{$ttgv->Ten_chuyen_nganh}}</option>
                                              @foreach ($ds_chuyen_nganh as $dscn)
                                                <option value="{{$dscn->Ma_chuyen_nganh}}">{{$dscn->Ten_chuyen_nganh}}</option>
                                              @endforeach
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Địa chỉ</label></td>
                                      <td width="400" ><input type="text" name="dia_chi" class="input1" value="{{$ttgv->Dia_chi}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Điện thoại</label></td>
                                      <td width="400" ><input type="text" name="dien_thoai" class="input1" value="{{$ttgv->Dien_thoai}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Email</label></td>
                                      <td width="400" ><input type="text" name="email" class="input1" value="{{$ttgv->Email}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ghi chú</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$ttgv->Ghi_chu}}"/></div></td>
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
                    @elseif(isset($thong_tin_giao_vien_xoa))
                        @foreach ($thong_tin_giao_vien_xoa as $ttgvx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; color:red; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa giáo viên này ?
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã giáo viên</label></td>
                                        <td width="400" ><input type="text" name="ma_giao_vien" class="input1" value="{{$ttgvx->Ma_giao_vien}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên giáo viên<span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_giao_vien" class="input1" value="{{$ttgvx->Ten_giao_vien}}" readonly/></td>
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
                    @elseif(isset($chi_tiet_giao_vien))
                        @foreach ($chi_tiet_giao_vien as $ctgv)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Mã giáo viên</label></td>
                                        <td width="400" ><input type="text" name="ma_giao_vien" class="input1" value="{{$ctgv->Ma_giao_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Tên giáo viên</label></td>
                                      <td width="400" ><input type="text" name="ten_giao_vien" class="input1" value="{{$ctgv->Ten_giao_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ngày sinh</label></td>
                                      <td width="400" ><input type="text" name="ngay_sinh" class="input1" value="{{$ctgv->Ngay_sinh}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Nơi sinh</label></td>
                                      <td width="400" ><input type="text" name="noi_sinh" class="input1" value="{{$ctgv->Noi_sinh}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">CMND</label></td>
                                      <td width="400" ><input type="text" name="cmnd" class="input1" value="{{$ctgv->CMND}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Học vị</label></td>
                                      <td width="400" ><input type="text" name="hoc_vi" class="input1" value="{{$ctgv->Hoc_vi}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Chuyên ngành</label></td>
                                      <td width="400" ><input type="text" name="ma_chuyen_nganh" class="input1" value="{{$ctgv->Ten_chuyen_nganh}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Địa chỉ</label></td>
                                      <td width="400" ><input type="text" name="dia_chi" class="input1" value="{{$ctgv->Dia_chi}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Điện thoại</label></td>
                                      <td width="400" ><input type="text" name="dien_thoai" class="input1" value="{{$ctgv->Dien_thoai}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Email</label></td>
                                      <td width="400" ><input type="text" name="email" class="input1" value="{{$ctgv->Email}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ghi chú</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$ctgv->Ghi_chu}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td colspan="2" align="center">
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
                                      <td width="200"><label for="nn">Tên giáo viên <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="ten_giao_vien" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ngày sinh <span style="color:red">*</span></label></td>
                                      <td width="400"><input style="width:250px; margin-left:5px" type="date" name="ngay_sinh" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Nơi sinh <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="noi_sinh" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">CMND <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="cmnd" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Học vị <span style="color:red">*</span></label></td>
                                          <td>
                                          <select name="hoc_vi" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn học vị</option>
                                              <option value="Cử nhân">Cử nhân</option>
                                              <option value="Thạc sĩ">Thạc sĩ</option>
                                              <option value="Tiến sĩ">Tiến sĩ</option>
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                          <td width="200"><label for="nn">Chuyên ngành <span style="color:red">*</span></label></td>
                                          <td>
                                          <select name="ma_chuyen_nganh" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                              <option value="">Chọn chuyên ngành</option>
                                              @foreach ($ds_chuyen_nganh as $dscn)
                                                <option value="{{$dscn->Ma_chuyen_nganh}}">{{$dscn->Ten_chuyen_nganh}}</option>
                                              @endforeach
                                          </select></div>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Địa chỉ</label></td>
                                      <td width="400" ><input type="text" name="dia_chi" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Điện thoại</label></td>
                                      <td width="400" ><input type="text" name="dien_thoai" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Email</label></td>
                                      <td width="400" ><input style="width:250px; margin-left:5px" type="email" name="email" class="input1"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ghi chú</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1"/></div></td>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách giáo viên</div>
                    <div class="tt">
                        <td width="200"><label for="nn">Từ khóa tìm kiếm</label></td>
                        <td width="400" ><input type="text" onkeyup="layDSGV_QLGV()" name="tu_khoa_tim_kiem" id="tu_khoa_tim_kiem" class="input1"/></div></td>
                    </div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table name="table_DSGV" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 100px;">ID</th>
                                        <th class="sorting"  style="width: 300px;">Tên giáo viên</th>
                                        <th class="sorting"  style="width: 300px;">Học vị</th>
                                        <th class="sorting"  style="width: 300px;">Chuyên ngành</th>
                                        <th class="sorting"  style="width: 100px;">Chi tiết</th>
                                        <th class="sorting"  style="width: 100px;">Xóa</th>
                                        <th class="sorting"  style="width: 100px;">Sửa</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_giao_vien as $dsgv)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsgv->Ma_giao_vien}}</td>
                                        <td>{{$dsgv->Ten_giao_vien}}</td>
                                        <td>{{$dsgv->Hoc_vi}}</td>
                                        <td>{{$dsgv->Ten_chuyen_nganh}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-giao-vien/xem-chi-tiet/{{$dsgv->Ma_giao_vien}}">Chi tiết</a></td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-giao-vien/delete/{{$dsgv->Ma_giao_vien}}"> Xóa</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-giao-vien/{{$dsgv->Ma_giao_vien}}">Sửa</a></td>
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