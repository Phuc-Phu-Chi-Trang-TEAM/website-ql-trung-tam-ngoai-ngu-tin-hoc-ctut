function loadCbxLopHocTheoCbxChungChi(){
  $(document).ready(function(){
    var ma_chung_chi = $('#cbx_chung_chi').val();
    console.log(ma_chung_chi);
    $.get("dang-ky-hoc-vien/ajax-ma-chung-chi/"+ma_chung_chi,function(data){
      $("select[name='ma_lop_hoc']").html(data);
    })
  })
}

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