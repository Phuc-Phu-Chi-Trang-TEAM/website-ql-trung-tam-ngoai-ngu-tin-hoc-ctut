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
        <div class="title ui-widget-header ui-corner-all">Xem lịch giảng</div>
          <form action="xem-lich-giang" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn mốc thời gian</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Tháng</label></td>
                                        <td>
                                            <select id="cbx_thang" name="thang" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn tháng</option>
                                                <option value="1">Tháng 1</option>
                                                <option value="2">Tháng 2</option>
                                                <option value="3">Tháng 3</option>
                                                <option value="4">Tháng 4</option>
                                                <option value="5">Tháng 5</option>
                                                <option value="6">Tháng 6</option>
                                                <option value="7">Tháng 7</option>
                                                <option value="8">Tháng 8</option>
                                                <option value="9">Tháng 9</option>
                                                <option value="10">Tháng 10</option>
                                                <option value="11">Tháng 11</option>
                                                <option value="12">Tháng 12</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Năm</label></td>
                                        <td>
                                            <select id="cbx_nam" name="nam" class="input1 cbx-inp" style="width:250px; margin-left:5px">
                                                <option value="">Chọn năm</option>
                                                <option value="2019">Năm 2019</option>
                                                <option value="2020">Năm 2020</option>
                                            </select>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200" style="font-family: none;"><h2>Chọn giáo viên</h2></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td width="200"><label for="nn">Chuyên ngành</label></td>
                                        <td>
                                            <select onchange="loadCbxGiaoVienTheoCbxChuyenNganhXLG()" id="cbx_chuyen_nganh" name="ma_chuyen_nganh" class="input1 cbx-inp" style="width:250px; margin-left:5px">
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
                                            <select onchange="loadChiTietGiaoVienXLG()" id="cbx_giao_vien" name="ma_giao_vien" class="input1 cbx-inp" style="width:250px; margin-left:5px">
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
                                        <table id="chi_tiet_giao_vien_load" style="padding: 0;border: none;border-collapse: collapse;border: 1px solid #ddd;width: 600px; auto 10px;">
                                        </table>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td colspan="2" align="center">
                                            <input type="submit" name="btn_xem" class="nut" value="Xem" style="margin-top:20px;margin-bottom:20px">
                                        </td>
                                    </div>
                                </tr>
                            </table>
                    </div>
                </div><!--ket thuc dk-->
            </div><!---ket thuc nen-->
        </form>

            <div class="group-box">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Lịch giảng</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">

                            @if (isset($lich_giang))
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 200px;">Ngày</th>
                                        <th class="sorting"  style="width: 150px;">Thứ</th>
                                        <th class="sorting"  style="width: 150px;">Buổi</th>
                                        <th class="sorting"  style="width: 400px;">Lớp</th>
                                        <th class="sorting"  style="width: 400px;">Giáo viên</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($lich_giang as $lg)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$lg->Ngay_hoc}}</td>
                                        <td>Thứ {{$lg->Thu}}</td>
                                        <td>{{$lg->Ten_buoi_hoc}}</td>
                                        <td>{{$lg->Ten_lop_hoc}}</td>
                                        <td>({{$lg->Ma_giao_vien}}) {{$lg->Ten_giao_vien}}</td>
                                    </tr>
                                @endforeach
                             </tbody>
                            </table>
                            @endif

                        </div>
                 </div>
            </div>    
    </div>
</div>	<!-- End of Main Content -->
@endsection;