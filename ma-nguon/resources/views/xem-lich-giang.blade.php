@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        <div class="title ui-widget-header ui-corner-all">Xem lịch giảng</div>
          <form action="#" method="post" enctype="">
            <div id="nen">
              <div id="dk">
                <div id="nd">
                  <table width="650px">
                    <tr>
                        <div class="tt">
                            <td widht="200" style="font-family: none;"><h2>Chọn Giảng Viên</h2></td>                
                          </div>
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
                          	<td width="200"><label for="nn">Giảng viên</label></td>
                          	<td>
							  <select name="" id="" class="input1 cbx-inp" style="width:250px; margin-left:5px">
								  <option value="">Chọn giảng viên</option>
							  </select></div>
							</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td colspan="2" align="center">
                                <input type="submit" name="xn" class="nut" value="Tìm Kiếm">							    	
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
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"  role="grid" aria-describedby="dataTables-example_info" border="1" id="t1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 300px;">Mã Giáo Viên</th>
                                        <th class="sorting"  style="width: 300px;">Tên Giáo Viên</th>
                                        <th class="sorting"  style="width: 300px;">Mã Lớp học</th>
                                        <th class="sorting"  style="width: 300px;">Buổi</th>
                                    </tr>
                                </thead>
                            <tbody>                           
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">3</td>
                                    <td>Lê Thị Cẩm C</td>
                                    <td>19/05/1978</td>
                                    <td>Đồng Tháp</td>
                                </tr>
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
            <!-- Kết thúc danh sách giảng viên -->
    

    </div>			
    </div>
</div>	<!-- End of Main Content -->
@endsection;