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
        <div class="title ui-widget-header ui-corner-all">Quản lý học viên</div>
          <form action="dang-ky-hoc-vien" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_hoc_vien))
                        @foreach ($thong_tin_hoc_vien as $tthv)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Mã học viên</label></td>
                                        <td width="400" ><input type="text" name="ma_hoc_vien" class="input1" value="{{$tthv->Ma_hoc_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Tên học viên <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_hoc_vien" class="input1" value="{{$tthv->Ten_hoc_vien}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ngày sinh <span style="color:red">*</span></label></td>
                                      <td width="400"><input style="width:250px; margin-left:5px" type="date" name="ngay_sinh" class="input1" value="{{$tthv->Ngay_sinh}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Nơi sinh <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="noi_sinh" class="input1" value="{{$tthv->Noi_sinh}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">CMND <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="cmnd" class="input1" value="{{$tthv->CMND}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Địa chỉ</label></td>
                                      <td width="400" ><input type="text" name="dia_chi" class="input1" value="{{$tthv->Dia_chi}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Điện thoại</label></td>
                                      <td width="400" ><input type="text" name="dien_thoai" class="input1" value="{{$tthv->Dien_thoai}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Email</label></td>
                                      <td width="400" ><input style="width:250px; margin-left:5px" type="email" name="email" class="input1" value="{{$tthv->Email}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ghi chú</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$tthv->Ghi_chu}}"/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn Lớp Học</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Loại chứng chỉ</label></td>
                                        <td>
                                            <select onchange="loadCbxLopHocTheoCbxChungChi()" id="cbx_chung_chi" name="ma_chung_chi" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn chứng chỉ</option>
                                                @foreach ($ds_chung_chi as $dscc)
                                                    <option value="{{$dscc->Ma_chung_chi}}">{{$dscc->Ten_chung_chi}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Lớp học <span style="color:red">*</span></label></td>
                                        <td>
                                            <select onchange="loadChiTietLopHoc()" id="cbx_lop_hoc" name="ma_lop_hoc" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="{{$tthv->Ma_lop_hoc}}" selected>({{$tthv->Ma_lop_hoc}}) {{$tthv->Ten_lop_hoc}}</option>
                                                @foreach ($ds_lop_hoc as $dslh)
                                                    <option value="{{$dslh->Ma_lop_hoc}}">({{$dslh->Ma_lop_hoc}}) {{$dslh->Ten_lop_hoc}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chi tiết lớp học:</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <table id="chi_tiet_lop_hoc_load" style="padding: 0;border: none;border-collapse: collapse;border: 1px solid #ddd;width: 600px;margin: 10px; auto 10px;">
                                        </table>
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
                    @elseif(isset($thong_tin_hoc_vien_xoa))
                        @foreach ($thong_tin_hoc_vien_xoa as $tthvx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa học viên này ?<br>
                                        <span style="color:red; font-size:12px"><i>(Cảnh báo: Bạn đang sắp xóa vĩnh viễn một học viên khỏi hệ thống. Hãy cân nhắc trước khi thực hiện điều này)</i></span>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã học viên</label></td>
                                        <td width="400" ><input type="text" name="ma_hoc_vien" class="input1" value="{{$tthvx->Ma_hoc_vien}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên học viên</label></td>
                                        <td width="400" ><input type="text" name="ten_hoc_vien" class="input1" value="{{$tthvx->Ten_hoc_vien}}" readonly/></td>
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
                    @elseif(isset($chi_tiet_hoc_vien))
                        @foreach ($chi_tiet_hoc_vien as $cthv)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Mã học viên</label></td>
                                        <td width="400" ><input type="text" name="ma_hoc_vien" class="input1" value="{{$cthv->Ma_hoc_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Tên học viên</label></td>
                                      <td width="400" ><input type="text" name="ten_hoc_vien" class="input1" value="{{$cthv->Ten_hoc_vien}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ngày sinh</label></td>
                                      <td width="400" ><input type="text" name="ngay_sinh" class="input1" value="{{$cthv->Ngay_sinh}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Nơi sinh</label></td>
                                      <td width="400" ><input type="text" name="noi_sinh" class="input1" value="{{$cthv->Noi_sinh}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">CMND</label></td>
                                      <td width="400" ><input type="text" name="cmnd" class="input1" value="{{$cthv->CMND}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Địa chỉ</label></td>
                                      <td width="400" ><input type="text" name="dia_chi" class="input1" value="{{$cthv->Dia_chi}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Điện thoại</label></td>
                                      <td width="400" ><input type="text" name="dien_thoai" class="input1" value="{{$cthv->Dien_thoai}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Email</label></td>
                                      <td width="400" ><input type="text" name="email" class="input1" value="{{$cthv->Email}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Ghi chú</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$cthv->Ghi_chu}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                      <td width="200"><label for="nn">Lớp</label></td>
                                      <td width="400" ><input type="text" name="ghi_chu" class="input1" value="({{$cthv->Ma_lop_hoc}}) {{$cthv->Ten_lop_hoc}}" readonly/></div></td>
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
                                      <td width="200"><label for="nn">Tên học viên <span style="color:red">*</span></label></td>
                                      <td width="400" ><input type="text" name="ten_hoc_vien" class="input1"/></div></td>
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
                                        <td widht="200" style="font-family: none;"><h2>Chọn Lớp Học</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Loại chứng chỉ</label></td>
                                        <td>
                                            <select onchange="loadCbxLopHocTheoCbxChungChi()" id="cbx_chung_chi" name="ma_chung_chi" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn chứng chỉ</option>
                                                @foreach ($ds_chung_chi as $dscc)
                                                    <option value="{{$dscc->Ma_chung_chi}}">{{$dscc->Ten_chung_chi}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Lớp học <span style="color:red">*</span></label></td>
                                        <td>
                                            <select onchange="loadChiTietLopHoc()" id="cbx_lop_hoc" name="ma_lop_hoc" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn lớp học</option>
                                                @foreach ($ds_lop_hoc as $dslh)
                                                    <option value="{{$dslh->Ma_lop_hoc}}">({{$dslh->Ma_lop_hoc}}) {{$dslh->Ten_lop_hoc}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chi tiết lớp học:</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <table id="chi_tiet_lop_hoc_load" style="padding: 0;border: none;border-collapse: collapse;border: 1px solid #ddd;width: 600px;margin: 10px; auto 10px;">
                                        </table>
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

            <div class="group-box" style="margin-top:20px">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Danh sách học viên</div>
                        <div class="tt" style="margin:15px">
                          <td width="200"><label for="nn">Nhập mã lớp học</label></td>
                          <td width="400" ><input onkeyup="layDSHocVien()" id="ma_lop_hoc_xem_ds" type="text" name="ma_lop_hoc_xem_ds" class="input1"/></div></td>
                        </div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table name="table_ds_hoc_vien" class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                            </table>
                        </div>
                 </div>
            </div>    
    </div>
</div>	<!-- End of Main Content -->
@endsection;