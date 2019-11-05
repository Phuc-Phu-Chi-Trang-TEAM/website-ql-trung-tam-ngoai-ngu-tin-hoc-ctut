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
        <div class="title ui-widget-header ui-corner-all">Quản lý phòng học</div>
          <form action="quan-ly-phong-hoc" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_phong_hoc))
                        @foreach ($thong_tin_phong_hoc as $ttph)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã Phòng Học</label></td>
                                        <td width="400" ><input type="text" name="ma_phong_hoc" class="input1" value="{{$ttph->Ma_phong_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên Phòng Học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_phong_hoc" class="input1" value="{{$ttph->Ten_phong_hoc}}"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Ghi chú</label></td>
                                        <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$ttph->Ghi_chu}}"/></td>
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
                    @elseif(isset($thong_tin_phong_hoc_xoa))
                        @foreach ($thong_tin_phong_hoc_xoa as $ttphx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; color:red; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa phòng học này ?
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã Phòng Học</label></td>
                                        <td width="400" ><input type="text" name="ma_phong_hoc" class="input1" value="{{$ttphx->Ma_phong_hoc}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên Phòng Học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_phong_hoc" class="input1" value="{{$ttphx->Ten_phong_hoc}}" readonly/></td>
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
                                        <td widht="200"><label for="nn">Tên Phòng Học <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_phong_hoc" class="input1"/></td>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách phòng học</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã Phòng Học</th>
                                        <th class="sorting"  style="width: 160px;">Tên Phòng Học</th>
                                        <th class="sorting"  style="width: 309px;">Ghi Chú</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_phong_hoc as $dsph)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsph->Ma_phong_hoc}}</td>
                                        <td>{{$dsph->Ten_phong_hoc}}</td>
                                        <td>{{$dsph->Ghi_chu}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-phong-hoc/delete/{{$dsph->Ma_phong_hoc}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-phong-hoc/{{$dsph->Ma_phong_hoc}}">Sửa</a></td>
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