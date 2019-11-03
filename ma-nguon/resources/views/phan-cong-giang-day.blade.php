@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        <div class="title ui-widget-header ui-corner-all">Phân công giảng dạy</div>
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
                                <input type="submit" name="xn" class="nut" value="Kiểm tra">
                                <input type="reset" name="huy" class="nut" value="Phân công"/>
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
                    <div class="title ui-widget-header ui-corner-all">Danh sách giảng dạy</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"  role="grid" aria-describedby="dataTables-example_info" border="1" id="t1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã lớp học</th>
                                        <th class="sorting"  style="width: 300px;">Tên lớp học</th>
                                        <th class="sorting"  style="width: 160px;">Mã giáo viên</th>
                                        <th class="sorting"  style="width: 300px;">Tên giáo viên</th>
                                        <th class="sorting"  style="width: 160px;">Phân công lại</th>
                                </thead>
                            <tbody>
                                @foreach ($ds_giang_day as $dsgd)
                                    <tr class="gradeC odd" align="center" role="row">
                                        <td class="sorting_1">{{$dsgd->Ma_lop_hoc}}</td>
										<td>{{$dsgd->Ten_lop_hoc}}</td>
                                        <td>{{$dsgd->Ma_giao_vien}}</td>
                                        <td>{{$dsgd->Ten_giao_vien}}</td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Phân công lại</a></td>
                                    </tr>
                                @endforeach    
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