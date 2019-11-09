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
          <form action="phan-cong-giang-day" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_lop_hoc))
                        @foreach ($thong_tin_lop_hoc as $ttlh)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Lớp học</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Mã lớp học</label></td>
                                        <td width="400" ><input type="text" name="ma_lop_hoc" class="input1" value="{{$ttlh->Ma_lop_hoc}}" readonly/></div></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Tên lớp học</label></td>
                                        <td width="400" ><input type="text" name="ten_lop_hoc" class="input1" value="{{$ttlh->Ten_lop_hoc}}" readonly/></div></td>
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
                                                <thead>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">ID</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Tên lớp</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">SLHV</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Chứng chỉ</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Buổi</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Lịch học</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Khai giảng</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Bế giảng</th>
                                                    </thead>
                                                    <tr>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ma_lop_hoc}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ten_lop_hoc}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->So_luong_hoc_vien}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ten_chung_chi}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ten_buoi_hoc}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ten_kieu_lich_hoc}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ngay_khai_giang}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttlh->Ngay_be_giang}}</td>
                                                    </tr>
                                        </table>
                                    </div>
                                </tr>
                            </table>
                        @endforeach

                        @foreach($thong_tin_giao_vien as $ttgv)
                            <table width="650px" style="margin-left:150px;">
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn giáo viên</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Chuyên ngành</label></td>
                                        <td>
                                            <select onchange="loadCbxGiaoVienTheoCbxChuyenNganhPCGD()" id="cbx_chuyen_nganh" name="ma_chuyen_nganh" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="{{$ttgv->Ma_chuyen_nganh}}">{{$ttgv->Ten_chuyen_nganh}}</option>
                                                @foreach ($ds_chuyen_nganh as $dscn)
                                                    <option value="{{$dscn->Ma_chuyen_nganh}}">{{$dscn->Ten_chuyen_nganh}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Giáo viên<span style="color:red">*</span></label></td>
                                        <td>
                                            <select onchange="loadChiTietGiaoVienPCGD()" id="cbx_giao_vien" name="ma_giao_vien" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="{{$ttgv->Ma_giao_vien}}">{{$ttgv->Ten_giao_vien}}</option>
                                                @foreach ($ds_giao_vien as $dsgv)
                                                    <option value="{{$dsgv->Ma_giao_vien}}">({{$dsgv->Ma_giao_vien}}) {{$dsgv->Ten_giao_vien}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chi tiết giáo viên:</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <table id="chi_tiet_giao_vien_load" style="padding: 0;border: none;border-collapse: collapse;border: 1px solid #ddd;width: 600px;margin-left: 150px; auto 10px;">
                                                    <thead>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">ID</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Tên giáo viên</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Ngày sinh</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Học vị</th>
                                                        <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Chuyên ngành</th>
                                                    </thead>
                                                    <tr>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttgv->Ma_giao_vien}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttgv->Ten_giao_vien}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttgv->Ngay_sinh}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttgv->Hoc_vi}}</td>
                                                        <td style="border: 1px solid #aaaaaa;">{{$ttgv->Ten_chuyen_nganh}}</td>
                                                    </tr>
                                        </table>
                                    </div>
                                </tr>
                            </table>
                            <table width="650px">
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
                    @else
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn Lớp Học</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Loại chứng chỉ</label></td>
                                        <td>
                                            <select onchange="loadCbxLopHocTheoCbxChungChiPCGD()" id="cbx_chung_chi" name="ma_chung_chi" class="input1 cbx-inp" style="width:250px; margin-left:5px">
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
                            </table>

                            <table width="650px" style="margin-left:150px;">
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn giáo viên</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Chuyên ngành</label></td>
                                        <td>
                                            <select onchange="loadCbxGiaoVienTheoCbxChuyenNganhPCGD()" id="cbx_chuyen_nganh" name="ma_chuyen_nganh" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn chuyên ngành</option>
                                                @foreach ($ds_chuyen_nganh as $dscn)
                                                    <option value="{{$dscn->Ma_chuyen_nganh}}">{{$dscn->Ten_chuyen_nganh}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Giáo viên<span style="color:red">*</span></label></td>
                                        <td>
                                            <select onchange="loadChiTietGiaoVienPCGD()" id="cbx_giao_vien" name="ma_giao_vien" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn giáo viên</option>
                                                @foreach ($ds_giao_vien as $dsgv)
                                                    <option value="{{$dsgv->Ma_giao_vien}}">({{$dsgv->Ma_giao_vien}}) {{$dsgv->Ten_giao_vien}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chi tiết giáo viên:</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <table id="chi_tiet_giao_vien_load" style="padding: 0;border: none;border-collapse: collapse;border: 1px solid #ddd;width: 600px;margin-left: 150px; auto 10px;">
                                        </table>
                                    </div>
                                </tr>
                            </table>

                            <table width="650px">
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách giảng dạy</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting"  style="width: 150px;">Mã giáo viên</th>
                                        <th class="sorting"  style="width: 300px;">Tên giáo viên</th>
                                        <th class="sorting"  style="width: 100px;">Mã lớp</th>
                                        <th class="sorting"  style="width: 300px;">Tên lớp</th>
                                        <th class="sorting"  style="width: 100px;">Sửa</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_giang_day as $dsgd)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td>{{$dsgd->Ma_giao_vien}}</td>
                                        <td>{{$dsgd->Ten_giao_vien}}</td>
                                        <td>{{$dsgd->Ma_lop_hoc}}</td>
                                        <td>{{$dsgd->Ten_lop_hoc}}</td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="phan-cong-giang-day/{{$dsgd->Ma_lop_hoc}}">Sửa</a></td>
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