<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NguoiDungController extends Controller
{
    protected function layDanhSachNguoiDung(){
        $ds_nguoi_dung = User::all();
        return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung]);
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themNguoiDung($request);
            return redirect('quan-ly-nguoi-dung')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinNguoiDung($request);
            return redirect('quan-ly-nguoi-dung')->with('thongbao','Cập nhật thông tin người dùng thành công');
        }
        if ($request->btn_xoa){
            $this->xoaNguoiDung($request);
            return redirect('quan-ly-nguoi-dung')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-nguoi-dung')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themNguoiDung($request){
        $this->validate(
            $request,
            ['ten_dang_nhap'=>'required|min:4|max:10','mat_khau'=>'required|min:6|max:16','quyen'=>'required'],

            ['ten_dang_nhap.required'=>"Bạn chưa nhập tên đăng nhập",
            'mat_khau.required'=>"Bạn chưa nhập mật khẩu",
            'quyen.required'=>"Bạn chưa chọn quyền",
            'ten_dang_nhap.min'=>"Tên đăng nhập phải có độ dài từ 4-10 ký tự",
            'ten_dang_nhap.max'=>"Tên đăng nhập phải có độ dài từ 4-10 ký tự",
            'mat_khau.min'=>"Mật khẩu phải có độ dài từ 6-16 ký tự",
            'mat_khau.max'=>"Mật khẩu phải có độ dài từ 6-16 ký tự"]
        );

        $nguoi_dung = new User;
        $nguoi_dung->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoi_dung->mat_khau = bcrypt($request->mat_khau);
        $nguoi_dung->quyen = $request->quyen;
        $nguoi_dung->save();
    }
    
    protected function layThongTinNguoiDung($id){
        $thong_tin_nguoi_dung = User::where('Ma_nguoi_dung',$id)->get();
        $ds_nguoi_dung = User::all();
        return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung,'thong_tin_nguoi_dung'=>$thong_tin_nguoi_dung]);
    }

    protected function layThongTinNguoiDungCanXoa($id){
        $thong_tin_nguoi_dung_xoa = User::where('Ma_nguoi_dung',$id)->get();
        $ds_nguoi_dung = User::all();
        return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung,'thong_tin_nguoi_dung_xoa'=>$thong_tin_nguoi_dung_xoa]);
    }

    protected function capNhatThongTinNguoiDung($request){
        $this->validate(
            $request,
            ['ten_dang_nhap'=>'required|min:4|max:10','mat_khau'=>'required|min:6|max:16','quyen'=>'required'],

            ['ten_dang_nhap.required'=>"Bạn chưa nhập tên đăng nhập",
            'mat_khau.required'=>"Bạn chưa nhập mật khẩu",
            'quyen.required'=>"Bạn chưa chọn quyền",
            'ten_dang_nhap.min'=>"Tên đăng nhập phải có độ dài từ 4-10 ký tự",
            'ten_dang_nhap.max'=>"Tên đăng nhập phải có độ dài từ 4-10 ký tự",
            'mat_khau.min'=>"Mật khẩu phải có độ dài từ 6-16 ký tự",
            'mat_khau.max'=>"Mật khẩu phải có độ dài từ 6-16 ký tự"]
        );

        $nguoi_dung=User::where('Ma_nguoi_dung','=',$request->ma_nguoi_dung)->first();
        $nguoi_dung->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoi_dung->mat_khau = bcrypt($request->mat_khau);
        $nguoi_dung->quyen = $request->quyen;
        $nguoi_dung->save();
    }

    protected function xoaNguoiDung($request){
        $nguoi_dung=User::where('Ma_nguoi_dung','=',$request->ma_nguoi_dung)->first();
        $nguoi_dung->delete();
    }
}
