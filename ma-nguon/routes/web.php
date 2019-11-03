<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dang-nhap', function () {
    return view('dang-nhap');
});

Route::get('trang-chu', function () {
    return view('trang-chu');
});

Route::get('quan-ly-nguoi-dung', 'NguoiDungController@layDanhSachNguoiDung');

Route::get('quan-ly-phong-hoc', 'PhongHocController@layDanhSachPhongHoc');

Route::get('quan-ly-chung-chi', 'ChungChiController@layDanhSachChungChi');

Route::get('xem-lich-giang', function () {
    return view('xem-lich-giang');
});

Route::get('dang-ky-hoc-vien', 'HocVienController@layDanhSachHocVien');

Route::get('phan-cong-giang-day', 'GiangDayController@layDanhSachGiangDay');

Route::get('quan-ly-buoi-hoc', 'BuoiHocController@layDanhSachBuoiHoc');

Route::get('quan-ly-khoa-hoc', 'KhoaHocController@layDanhSachKhoaHoc');

Route::get('quan-ly-lop-hoc', 'LopHocController@layDanhSachLopHoc');

Route::get('quan-ly-giao-vien', 'GiaoVienController@layDanhSachGiaoVien');