@extends('master-layout');
@section('content')
<div id="mainContent">
    <div class="group-box">
        <div align="center">
        <div class="title ui-widget-header ui-corner-all">Quản lý chứng chỉ</div>
          <form action="#" method="post" enctype="">
            <div id="nen">
              <div id="dk">
                <div id="nd">
                  <table width="650px">
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Mã Chứng Chỉ </label></td>
                            <td width="400" ><input type="text" name="hoten" class="input1"/>
                          </div>
                          </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="tt">
                            <td widht="200"><label for="nn">Giá tiền </label></td>
                            <td width="400" ><input type="text" name="tdn" class="input1"/></div>						      
                            </td>
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
            <div class="group-box">
                <div align="center">
                    <div class="title ui-widget-header ui-corner-all">Danh sách phòng học</div>
                        <div class="col-sm-12 danhsach" style="font-size:16px;font-family:arial;">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" border="1">
                                <thead>
                                    <tr align="center" role="row">
                                        <th class="sorting_desc" style="width: 160px;">Mã Chứng Chỉ</th>
                                        <th class="sorting"  style="width: 160px;">Giá Tiền</th>
                                        <th class="sorting"  style="width: 309px;">Ghi Chú</th>
                                        <th class="sorting"  style="width: 160px;">Delete</th>
                                        <th class="sorting"  style="width: 126px;">Edit</th></tr>
                                </thead>
                            <tbody>                           
                                <tr class="gradeC odd" align="center" role="row">
                                    <td class="sorting_1">111001</td>
                                    <td>444,000VNĐ</td>
                                    <td>KTPM0116</td>
                                    <td class="center"><i class="icon-trash"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">222002</td>
                                    <td>222,000VNĐ</td>
                                    <td>None</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                                <tr class="gradeX even" align="center" role="row">
                                    <td class="sorting_1">333003</td>
                                    <td>666,000VNĐ</td>
                                    <td>HTTT0116</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                                </tr>
                             </tbody>
                            </table>
                        </div>
                 </div>
            </div>
    </div>      
    </div>
</div>	<!-- End of Main Content -->
@endsection;