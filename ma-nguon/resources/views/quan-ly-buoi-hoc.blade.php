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
        <div class="title ui-widget-header ui-corner-all">Quản lý buổi học</div>
          <form action="quan-ly-buoi-hoc" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_buoi_hoc))
                        @foreach ($thong_tin_buoi_hoc as $ttbh)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã buổi học</label></td>
                                        <td width="400" ><input type="text" name="ma_buoi_hoc" class="input1" value="{{$ttbh->Ma_buoi_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên buổi học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_buoi_hoc" class="input1" value="{{$ttbh->Ten_buoi_hoc}}"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Ghi chú</label></td>
                                        <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$ttbh->Ghi_chu}}"/></td>
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
                    @elseif(isset($thong_tin_buoi_hoc_xoa))
                        @foreach ($thong_tin_buoi_hoc_xoa as $ttbhx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; color:red; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa buổi học này ?
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã buổi học</label></td>
                                        <td width="400" ><input type="text" name="ma_buoi_hoc" class="input1" value="{{$ttbhx->Ma_buoi_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên buổi học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_buoi_hoc" class="input1" value="{{$ttbhx->Ten_buoi_hoc}}" readonly/></td>
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
                                        <td widht="200"><label for="nn">Tên buổi học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_buoi_hoc" class="input1"/></td>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách buổi học</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã buổi học</th>
                                        <th class="sorting"  style="width: 160px;">Tên buổi học</th>
                                        <th class="sorting"  style="width: 309px;">Ghi Chú</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_buoi_hoc as $dsph)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsph->Ma_buoi_hoc}}</td>
                                        <td>{{$dsph->Ten_buoi_hoc}}</td>
                                        <td>{{$dsph->Ghi_chu}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-buoi-hoc/delete/{{$dsph->Ma_buoi_hoc}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-buoi-hoc/{{$dsph->Ma_buoi_hoc}}">Sửa</a></td>
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