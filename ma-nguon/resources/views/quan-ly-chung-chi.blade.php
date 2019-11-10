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
        <div class="title ui-widget-header ui-corner-all">Quản lý chứng chỉ</div>
          <form action="quan-ly-chung-chi" method="post">
            <input type="hidden" name="_token" value={{csrf_token()}}>
            <div id="nen">
              <div id="dk">
                <div id="nd">
                    @if (isset($thong_tin_chung_chi))
                        @foreach ($thong_tin_chung_chi as $ttcc)
                            <table width="650px">
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã chứng chỉ</label></td>
                                        <td width="400" ><input type="text" name="ma_chung_chi" class="input1" value="{{$ttcc->Ma_chung_chi}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên chứng chỉ <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_chung_chi" class="input1" value="{{$ttcc->Ten_chung_chi}}"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Giá tiền</label></td>
                                        <td width="400" ><input type="text" name="gia_tien" class="input1" value="{{$ttcc->Gia_tien}}"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Ghi chú</label></td>
                                        <td width="400" ><input type="text" name="ghi_chu" class="input1" value="{{$ttcc->Ghi_chu}}"/></td>
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
                    @elseif(isset($thong_tin_chung_chi_xoa))
                        @foreach ($thong_tin_chung_chi_xoa as $ttccx)
                            <table width="650px">
                                <tr>
                                    <div class="tt" style="font-size:20px; margin-top:10px;margin-bottom:10px">
                                        Bạn có chắc chắn muốn xóa chứng chỉ này ?<br>
                                        <span style="color:red; font-size:12px"><i>(Cảnh báo: Việc xóa dữ liệu này có thể khiến các dữ liệu quan trọng liên quan bị mất bao gồm các dữ liệu lớp học, dữ liệu lịch giảng dạy. Hãy cân nhắc trước khi thực hiện điều này)</i></span>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Mã Chứng Chỉ</label></td>
                                        <td width="400" ><input type="text" name="ma_chung_chi" class="input1" value="{{$ttccx->Ma_chung_chi}}" readonly/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Tên Chứng Chỉ</label></td>
                                        <td width="400" ><input type="text" name="ten_chung_chi" class="input1" value="{{$ttccx->Ten_chung_chi}}" readonly/></td>
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
                                        <td widht="200"><label for="nn">Tên chứng chỉ <span style="color:red">*</span></label></td>
                                        <td width="400" ><input type="text" name="ten_chung_chi" class="input1"/></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="tt">
                                        <td widht="200"><label for="nn">Giá tiền</label></td>
                                        <td width="400" ><input type="text" name="gia_tien" class="input1"/></td>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách chứng chỉ</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã chứng chỉ</th>
                                        <th class="sorting"  style="width: 300px;">Tên chứng chỉ</th>
                                        <th class="sorting"  style="width: 300px;">Giá tiền</th>
                                        <th class="sorting"  style="width: 300px;">Ghi Chú</th>
                                        <th class="sorting"  style="width: 120px;">Delete</th>
                                        <th class="sorting"  style="width: 120px;">Edit</th></tr>
                                </thead>
                            <tbody>
                                @foreach ($ds_chung_chi as $dscc)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dscc->Ma_chung_chi}}</td>
                                        <td>{{$dscc->Ten_chung_chi}}</td>
                                        <td>{{$dscc->Gia_tien}}</td>
                                        <td>{{$dscc->Ghi_chu}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="quan-ly-chung-chi/delete/{{$dscc->Ma_chung_chi}}">Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-chung-chi/{{$dscc->Ma_chung_chi}}">Sửa</a></td>
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