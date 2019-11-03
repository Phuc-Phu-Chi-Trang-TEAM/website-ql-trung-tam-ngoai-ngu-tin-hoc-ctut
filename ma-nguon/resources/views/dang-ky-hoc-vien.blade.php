@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        <div class="title ui-widget-header ui-corner-all">Đăng ký học viên</div>
          <form action="#" method="post" enctype="">
            <div id="nen">
              <div id="dk">
                <div id="nd">
                  <table width="600px">
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Tên Học Viên </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Ngày Sinh </label></td>
                            <td width="400" ><input type="date" name="bday" max="1979-12-31" class="bday1"></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Nơi sinh </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">CMND </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Địa Chỉ </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Điện Thoại </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Email </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Ghi Chú </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>
                            </td>
                          </div>
                    </tr>    
                    <tr>
                        <div class="tt">
                            <td widht="200" style="font-family: none;"><h2>Chọn Lớp Học</h2></td>                
                          </div>
                          </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          	<td width="200"><label for="nn">Buổi học</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn buổi học</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          	<td width="200"><label for="nn">Loại chứng chỉ</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn chứng chỉ</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          	<td width="200"><label for="nn">Lớp học</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn lớp học</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td colspan="2" align="center">
                                <input type="submit" name="xn" class="nut" value="Thêm">
                                <input type="reset" name="huy" class="nut" value="Hủy Bỏ"/>							    	
                            </td>
                        </div>
                    </tr>
                        </table>
                    </div>
                </div><!--ket thuc dk-->
            </div><!---ket thuc nen-->
        </form>
    </div>
    <div class="group-box">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Thông tin đăng ký</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"  role="grid" aria-describedby="dataTables-example_info" border="1" id="t1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã Học Viên</th>
                                        <th class="sorting"  style="width: 160px;">Tên Học Viên</th>
                                        <th class="sorting"  style="width: 160px;">Ngày Sinh</th>
                                        <th class="sorting"  style="width: 160px;">CMND</th>
                                        <th class="sorting"  style="width: 160px;">Điện Thoại</th>
                                        <th class="sorting"  style="width: 160px;">Mã Lớp</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>                           
                                @foreach ($ds_hoc_vien as $dshv)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dshv->Ma_hoc_vien}}</td>
										<td>{{$dshv->Ten_hoc_vien}}</td>
                                        <td>{{$dshv->Ngay_sinh}}</td>
                                        <td>{{$dshv->CMND}}</td>
                                        <td>{{$dshv->Dien_thoai}}</td>
                                        <td>{{$dshv->Ma_lop}}</td>
                                        <td class="center"><i class="icon-trash"></i><a href="#">Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                    </tr>
                                @endforeach 
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
            <!-- Kết thúc danh sách giảng viên -->
         
    
        


    
        
    </div>
</div>	<!-- End of Main Content -->
@endsection;