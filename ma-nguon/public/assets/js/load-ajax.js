//Load cbx lớp học theo cbx chứng chỉ trang ĐĂNG KÝ HỌC VIÊN
function loadCbxLopHocTheoCbxChungChi(){
  $(document).ready(function(){
    var ma_chung_chi = $('#cbx_chung_chi').val();
    console.log(ma_chung_chi);
    $.get("dang-ky-hoc-vien/ajax-ma-chung-chi/"+ma_chung_chi,function(data){
      $("select[name='ma_lop_hoc']").html(data);
    })
  })
}

//Load table chi tiết lớp học theo cbx lớp học trang ĐĂNG KÝ HỌC VIÊN
function loadChiTietLopHoc(){
  $(document).ready(function(){
    var ma_lop_hoc = $('#cbx_lop_hoc').val();
    if (ma_lop_hoc == null){
      alert("Hãy chọn 1 lớp học");
    }
    else{
      $.get("dang-ky-hoc-vien/ajax-ma-lop-hoc/"+ma_lop_hoc,function(data){
        $("#chi_tiet_lop_hoc_load").html(data);
      })
    }
  })
}

//Load cbx lớp học theo chứng chỉ trang PHÂN CÔNG GIẢNG DẠY
function loadCbxLopHocTheoCbxChungChiPCGD(){
  $(document).ready(function(){
    var ma_chung_chi = $('#cbx_chung_chi').val();
    console.log(ma_chung_chi);
    $.get("phan-cong-giang-day/ajax-ma-chung-chi/"+ma_chung_chi,function(data){
      $("select[name='ma_lop_hoc']").html(data);
    })
  })
}

//load table chi tiết lớp học theo cbx lớp học trang PHÂN CÔNG GIẢNG DẠY
function loadChiTietLopHocPCGD(){
  $(document).ready(function(){
    var ma_lop_hoc = $('#cbx_lop_hoc').val();
    if (ma_lop_hoc == null){
      alert("Hãy chọn 1 lớp học");
    }
    else{
      $.get("phan-cong-giang-day/ajax-ma-lop-hoc/"+ma_lop_hoc,function(data){
        $("#chi_tiet_lop_hoc_load").html(data);
      })
    }
  })
}

//Load cbx giáo viên theo cbx chuyên ngành trang PHÂN CÔNG GIẢNG DẠY
function loadCbxGiaoVienTheoCbxChuyenNganhPCGD(){
  $(document).ready(function(){
    var ma_chuyen_nganh = $('#cbx_chuyen_nganh').val();
    console.log(ma_chuyen_nganh);
    $.get("phan-cong-giang-day/ajax-ma-chuyen-nganh/"+ma_chuyen_nganh,function(data){
      $("select[name='ma_giao_vien']").html(data);
    })
  })
}

//load table chi tiết giáo viên theo cbx giáo viên trang PHÂN CÔNG GIẢNG DẠY
function loadChiTietGiaoVienPCGD(){
  $(document).ready(function(){
    var ma_giao_vien = $('#cbx_giao_vien').val();
    if (ma_giao_vien == null){
      alert("Hãy chọn 1 giáo viên");
    }
    else{
      $.get("phan-cong-giang-day/ajax-ma-giao-vien/"+ma_giao_vien,function(data){
        $("#chi_tiet_giao_vien_load").html(data);
      })
    }
  })
}

//Load cbx giáo viên theo cbx chuyên ngành trang XEM LỊCH GIẢNG
function loadCbxGiaoVienTheoCbxChuyenNganhXLG(){
  $(document).ready(function(){
    var ma_chuyen_nganh = $('#cbx_chuyen_nganh').val();
    console.log(ma_chuyen_nganh);
    $.get("xem-lich-giang/ajax-ma-chuyen-nganh/"+ma_chuyen_nganh,function(data){
      $("select[name='ma_giao_vien']").html(data);
    })
  })
}

//load table chi tiết giáo viên theo cbx giáo viên trang XEM LỊCH GIẢNG
function loadChiTietGiaoVienXLG(){
  $(document).ready(function(){
    var ma_giao_vien = $('#cbx_giao_vien').val();
    if (ma_giao_vien == null){
      alert("Hãy chọn 1 giáo viên");
    }
    else{
      $.get("xem-lich-giang/ajax-ma-giao-vien/"+ma_giao_vien,function(data){
        $("#chi_tiet_giao_vien_load").html(data);
      })
    }
  })
}

//load table chi tiết giáo viên theo cbx giáo viên trang XEM LỊCH GIẢNG
function layDSHocVien(){
  $(document).ready(function(){
    var ma_lop_hoc_xem_ds = $('#ma_lop_hoc_xem_ds').val();
      $.get("xem-ds-hoc-vien/ajax-ma-lop-hoc/"+ma_lop_hoc_xem_ds,function(data){
        $("table[name='table_ds_hoc_vien']").html(data);
      })
  })
}