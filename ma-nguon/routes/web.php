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
Route::get('quan-ly-nguoi-dung/{id}', 'NguoiDungController@layThongTinNguoiDung');
Route::get('quan-ly-nguoi-dung/delete/{id}', 'NguoiDungController@layThongTinNguoiDungCanXoa');
Route::post('quan-ly-nguoi-dung','NguoiDungController@batSuKienClickButton');


// Routes quản lý phòng học
Route::get('quan-ly-phong-hoc', 'PhongHocController@layDanhSachPhongHoc');
Route::get('quan-ly-phong-hoc/{id}', 'PhongHocController@layThongTinPhongHoc');
Route::get('quan-ly-phong-hoc/delete/{id}', 'PhongHocController@layThongTinPhongHocCanXoa');
Route::post('quan-ly-phong-hoc','PhongHocController@batSuKienClickButton');

//Routes quản lý chứng chỉ
Route::get('quan-ly-chung-chi', 'ChungChiController@layDanhSachChungChi');
Route::get('quan-ly-chung-chi/{id}', 'ChungChiController@layThongTinChungChi');
Route::get('quan-ly-chung-chi/delete/{id}', 'ChungChiController@layThongTinChungChiCanXoa');
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
Route::get('quan-ly-buoi-hoc/{id}', 'BuoiHocController@layThongTinBuoiHoc');
Route::get('quan-ly-buoi-hoc/delete/{id}', 'BuoiHocController@layThongTinBuoiHocCanXoa');
Route::post('quan-ly-buoi-hoc','BuoiHocController@batSuKienClickButton');

//Routes quản lý khóa học
Route::get('quan-ly-khoa-hoc', 'KhoaHocController@layDanhSachKhoaHoc');
Route::get('quan-ly-khoa-hoc/{id}', 'KhoaHocController@layThongTinKhoaHoc');
Route::get('quan-ly-khoa-hoc/delete/{id}', 'KhoaHocController@layThongTinKhoaHocCanXoa');
Route::post('quan-ly-khoa-hoc','KhoaHocController@batSuKienClickButton');

//Routes quản lý lớp học
Route::get('quan-ly-lop-hoc', 'LopHocController@layDanhSachLopHoc');
Route::get('quan-ly-lop-hoc/{id}', 'LopHocController@layThongTinLopHoc');
Route::get('quan-ly-lop-hoc/xem-chi-tiet/{id}', 'LopHocController@chiTietLopHoc');
Route::get('quan-ly-lop-hoc/delete/{id}', 'LopHocController@layThongTinLopHocCanXoa');
Route::post('quan-ly-lop-hoc','LopHocController@batSuKienClickButton');

//Routes quản lý giáo viên
Route::get('quan-ly-giao-vien', 'GiaoVienController@layDanhSachGiaoVien');
Route::get('quan-ly-giao-vien/{id}', 'GiaoVienController@layThongTinGiaoVien');
Route::get('quan-ly-giao-vien/xem-chi-tiet/{id}', 'GiaoVienController@chiTietGiaoVien');
Route::get('quan-ly-giao-vien/delete/{id}', 'GiaoVienController@layThongTinGiaoVienCanXoa');
Route::post('quan-ly-giao-vien','GiaoVienController@batSuKienClickButton');