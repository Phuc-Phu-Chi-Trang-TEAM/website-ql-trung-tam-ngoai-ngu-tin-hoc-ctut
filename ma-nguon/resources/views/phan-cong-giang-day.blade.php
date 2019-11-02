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
                            <td widht="200"><label for="nn">Mã Giảng Viên </label></td>
                            <td width="400" ><input type="text" name="hoten" class="input1"/>
                                <input type="submit" name="xn" class="nut1" id="sp1" value="Hiển thị thông tin GV">
                                <!-- <span id="sp1">Hiển thị thông tin GV</span> -->
                          </div>
                          </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Tên Giáo Viên </label></td>
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
                            <td widht="200"><label for="nn">Học Vị </label></td>
                            <td width="400" ><input list="browsers" name="browser" class="browser1">
                                <datalist id="browsers">
                                    <option value="KTPM">
                                    <option value="KHMT">
                                    <option value="CĐT">
                                    <option value="QLCN">
                                    <option value="TOTOLINK">
                                </datalist>
                            </div>
                            </td>
                          </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Chuyên Ngành </label></td>
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
                            <td widht="200"><label for="nn">Mã Lớp Học </label></td>
                            <td width="400" ><input type="text" name="hoten" class="input1"/>
                                <input type="submit" name="xn" class="nut1" value="Hiển thị thông tin Lớp Học">
                          </div>
                          </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Tên Lớp </label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Khóa Học</label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Số Lượng</label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Buổi Học</label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Loại Chứng Chỉ</label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                          <td widht="200"><label for="nn">Ghi chú</label></td>
                          <td width="400" ><input type="password" name="mk" class="input1"/></div></td>
                        </div>
                    </tr>    
                    <tr>
                        <div class="tt">
                            <td colspan="2" align="center">
                                <input type="submit" name="xn" class="nut" value="Phân Công">
                                <input type="reset" name="huy" class="nut" value="Thực Hiện Lại"/>
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
                    <div class="title ui-widget-header ui-corner-all">Thông tin giảng viên</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"  role="grid" aria-describedby="dataTables-example_info" border="1" id="t1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 300px;">Mã Giảng Viên</th>
                                        <th class="sorting"  style="width: 300px;">Tên Giáo Viên</th>
                                        <th class="sorting"  style="width: 160px;">Ngày Sinh</th>
                                        <th class="sorting"  style="width: 160px;">Nơi Sinh</th>
                                        <th class="sorting"  style="width: 160px;">CMND</th>
                                        <th class="sorting"  style="width: 160px;">Học Vị</th>
                                        <th class="sorting"  style="width: 160px;">Chuyên Ngành</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>                           
                                <tr class="gradeC odd" align="center" role="row">
                                    <td class="sorting_1">1</td>
                                    <td>Nguyễn Văn A</td>						               
                                    <td>20/03/1978</td>
                                    <td>An Giang</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="icon-trash"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">2</td>
                                    <td>Trần Văn B</td>
                                    <td>24/12/1978</td>
                                    <td>Cần Thơ</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">3</td>
                                    <td>Lê Thị Cẩm C</td>
                                    <td>19/05/1978</td>
                                    <td>Đồng Tháp</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
            <!-- Kết thúc danh sách giảng viên -->


        <div class="group-box">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Danh sách lớp học</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"  role="grid" aria-describedby="dataTables-example_info" border="1" id="t1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 300px;">Mã Lớp học</th>
                                        <th class="sorting"  style="width: 300px;">Tên Lớp học</th>
                                        <th class="sorting"  style="width: 160px;">Khóa học</th>
                                        <th class="sorting"  style="width: 160px;">Số Lượng</th>
                                        <th class="sorting"  style="width: 160px;">Buổi Học</th>
                                        <th class="sorting"  style="width: 160px;">Loại Chứng Chỉ</th>
                                        <th class="sorting"  style="width: 160px;">Ghi chú</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>                           
                                <tr class="gradeC odd" align="center" role="row">
                                    <td class="sorting_1">1</td>
                                    <td>C202</td>						               
                                    <td>2019-2020</td>
                                    <td>40</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="icon-trash"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">2</td>
                                    <td>C201</td>
                                    <td>2019-2020</td>
                                    <td>69</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">3</td>
                                    <td>C301</td>
                                    <td>2019-2020</td>
                                    <td>96</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
            <!-- Kết thúc danh sách lớp học -->

        </div>			
    </div>
</div>	<!-- End of Main Content -->
@endsection;