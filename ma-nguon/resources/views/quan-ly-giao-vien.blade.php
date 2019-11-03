@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        <div class="title ui-widget-header ui-corner-all">Quản lý giáo viên</div>
          <form action="#" method="post" enctype="">
            <div id="nen">
              <div id="dk">
                <div id="nd">
                  <table width="650px">

                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Mã Giáo Viên </label></td>
                            <td width="400" ><input type="text" name="hoten" class="input1"/>
                          </div>
                          </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Tên Giáo Viên</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Ngày Sinh</label></td>
                          <td width="400"><input style="width:250px; margin-left:5px" type="date" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Nơi Sinh</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">CMND</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          	<td width="200"><label for="nn">Học Vị</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn học vị</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          	<td width="200"><label for="nn">Chuyên Ngành</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn chuyên ngành</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Địa chỉ</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Điện thoại</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Email</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td width="200"><label for="nn">Ghi chú</label></td>
                          <td width="400" ><input type="text" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>				    
                    <tr>
                        <div class="tt">
                            <td colspan="2" align="center">
                                <input type="submit" name="xn" class="nut" value="Tìm kiếm">
                                <input type="submit" name="xn" class="nut" value="Thêm">
                                <input type="submit" name="xn" class="nut" value="Lưu">
                                <input type="reset" name="huy" class="nut" value="Hủy Bỏ"/>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách giáo viên</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã giáo viên</th>
										<th class="sorting"  style="width: 309px;">Tên giáo viên</th>
                                        <th class="sorting"  style="width: 309px;">Ngày sinh</th>
                                        <th class="sorting"  style="width: 309px;">Chuyên ngành</th>
                                        <th class="sorting"  style="width: 309px;">Điện thoại</th>
                                        <th class="sorting"  style="width: 309px;">Xem chi tiết</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>   
                                @foreach ($ds_giao_vien as $dsgv)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsgv->Ma_giao_vien}}</td>
										<td>{{$dsgv->Ten_giao_vien}}</td>
                                        <td>{{$dsgv->Ngay_sinh}}</td>
                                        <td>{{$dsgv->Chuyen_nganh}}</td>
                                        <td>{{$dsgv->Dien_thoai}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="#">Xem chi tiết</a></td>
                                        <td class="center"><i class="icon-trash"></i><a href="#">Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
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