<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class NguoiDungController extends Controller
{
    protected function layDanhSachNguoiDung(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_nguoi_dung = User::all();
            return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
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
        $nguoi_dung->username = $request->username;
        $nguoi_dung->password = bcrypt($request->password);
        $nguoi_dung->quyen = $request->quyen;
        $nguoi_dung->save();
    }
    
    protected function layThongTinNguoiDung($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_nguoi_dung = User::where('Ma_nguoi_dung',$id)->get();
            $ds_nguoi_dung = User::all();
            return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung,'thong_tin_nguoi_dung'=>$thong_tin_nguoi_dung,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinNguoiDungCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_nguoi_dung_xoa = User::where('Ma_nguoi_dung',$id)->get();
            $ds_nguoi_dung = User::all();
            return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung,'thong_tin_nguoi_dung_xoa'=>$thong_tin_nguoi_dung_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
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
        $nguoi_dung->username = $request->username;
        $nguoi_dung->password = bcrypt($request->password);
        $nguoi_dung->quyen = $request->quyen;
        $nguoi_dung->save();
    }

    protected function xoaNguoiDung($request){
        $nguoi_dung=User::where('Ma_nguoi_dung','=',$request->ma_nguoi_dung)->first();
        $nguoi_dung->delete();
    }

    public function hienThiDangNhap(){
        return view('dang-nhap');
    }

    public function hienThiTrangChu(){
        $username = session()->get('username');
        if (isset($username)){
            return view('trang-chu',['username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    public function dangNhap(Request $request){
        $this->validate($request,
                        ['ten_dang_nhap'=>'required',
                        'mat_khau'=>"required"],
                        
                        ['ten_dang_nhap.required'=>"Bạn chưa nhập tên đăng nhập",
                        'mat_khau.required'=>'Bạn chưa nhập mật khẩu']);

        if (Auth::attempt(['username'=>$request->ten_dang_nhap,'password'=>$request->mat_khau])){
            Session::put('username',$request->ten_dang_nhap);
            return redirect('trang-chu')->with("thongbao","Đăng nhập thành công");
        }
        else{
            return redirect('dang-nhap')->with("thongbao","Đăng nhập không thành công");
        }
    }

    public function dangXuat(){
        Session::flush('username');
        return redirect('dang-nhap')->with("thongbao","Đăng xuất thành công");
    }
}
