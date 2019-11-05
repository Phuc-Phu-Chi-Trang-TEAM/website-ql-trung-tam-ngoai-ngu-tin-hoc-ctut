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

//Routes đăng nhập
Route::get('dang-nhap', function () {
    return view('dang-nhap');
});

//Routes trang chủ
Route::get('trang-chu', function () {
    return view('trang-chu');
});

//Routes quản lý người dùng
Route::get('quan-ly-nguoi-dung', 'NguoiDungController@layDanhSachNguoiDung');

// Routes quản lý phòng học
Route::get('quan-ly-phong-hoc', 'PhongHocController@layDanhSachPhongHoc');
Route::get('quan-ly-phong-hoc/{id}', 'PhongHocController@layThongTinPhongHoc');
Route::post('quan-ly-phong-hoc','PhongHocController@batSuKienClickButton');

//Routes quản lý chứng chỉ
Route::get('quan-ly-chung-chi', 'ChungChiController@layDanhSachChungChi');
Route::get('quan-ly-chung-chi/{id}', 'ChungChiController@layThongTinChungChi');
Route::post('quan-ly-chung-chi','ChungChiController@batSuKienClickButton');

//Routes xem lịch giảng
Route::get('xem-lich-giang', function () {
    return view('xem-lich-giang');
});

//Routes đăng ký học viên
Route::get('dang-ky-hoc-vien', 'HocVienController@layDanhSachHocVien');

//Routes phân công giảng dạy
Route::get('phan-cong-giang-day', 'GiangDayController@layDanhSachGiangDay');

//Routes quản lý buổi học
Route::get('quan-ly-buoi-hoc', 'BuoiHocController@layDanhSachBuoiHoc');

//Routes quản lý khóa học
Route::get('quan-ly-khoa-hoc', 'KhoaHocController@layDanhSachKhoaHoc');

//Routes quản lý lớp học
Route::get('quan-ly-lop-hoc', 'LopHocController@layDanhSachLopHoc');

//Routes quản lý giáo viên
Route::get('quan-ly-giao-vien', 'GiaoVienController@layDanhSachGiaoVien');