<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiChuyenMucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiChuyenMuc')->insert([
        	['idChuyenMuc'=>'1','Ten' => 'Giáo Dục','TenKhongDau' => 'Giao-Duc'],
        	['idChuyenMuc'=>'1','Ten' => 'Nhịp Điệu Trẻ','TenKhongDau' => 'Nhip-Dieu-Tre'],
        	['idChuyenMuc'=>'1','Ten' => 'Du Lịch','TenKhongDau' => 'Du-Lich'],
        	['idChuyenMuc'=>'1','Ten' => 'Du Học','TenKhongDau' => 'Du-Hoc'],
        	['idChuyenMuc'=>'2','Ten' => 'Cuộc Sống Đó Đây','TenKhongDau' => 'Cuoc-Song-Do-Day'],
        	['idChuyenMuc'=>'2','Ten' => 'Ảnh','TenKhongDau' => 'Anh'],
        	['idChuyenMuc'=>'2','Ten' => 'Người Việt 5 Châu','TenKhongDau' => 'Nguoi-Viet-5-Chau'],
        	['idChuyenMuc'=>'2','Ten' => 'Phân Tích','TenKhongDau' => 'Phan-Tich'],
        	['idChuyenMuc'=>'3','Ten' => 'Chứng Khoán','TenKhongDau' => 'Chung-Khoan'],
        	['idChuyenMuc'=>'3','Ten' => 'Bất Động Sản','TenKhongDau' => 'Bat-Dong-San'],
        	['idChuyenMuc'=>'3','Ten' => 'Doanh Nhân','TenKhongDau' => 'Doanh-Nhan'],
        	['idChuyenMuc'=>'3','Ten' => 'Quốc Tế','TenKhongDau' => 'Quoc-Te'],
        	['idChuyenMuc'=>'3','Ten' => 'Mua Sắm','TenKhongDau' => 'Mua-Sam'],
        	['idChuyenMuc'=>'3','Ten' => 'Doanh Nghiệp Viết','TenKhongDau' => 'Doanh-Nghiep-Viet'],
        	['idChuyenMuc'=>'4','Ten' => 'Hoa Hậu','TenKhongDau' => 'Hoa-Hau'],
        	['idChuyenMuc'=>'4','Ten' => 'Nghệ Sỹ','TenKhongDau' => 'Nghe-Sy'],
        	['idChuyenMuc'=>'4','Ten' => 'Âm Nhạc','TenKhongDau' => 'Am-Nhac'],
        	['idChuyenMuc'=>'4','Ten' => 'Thời Trang','TenKhongDau' => 'Thoi-Trang'],
        	['idChuyenMuc'=>'4','Ten' => 'Điện Ảnh','TenKhongDau' => 'Dien-Anh'],
        	['idChuyenMuc'=>'4','Ten' => 'Mỹ Thuật','TenKhongDau' => 'My-Thuat'],
        	['idChuyenMuc'=>'5','Ten' => 'Bóng Đá','TenKhongDau' => 'Bong-Da'],
        	['idChuyenMuc'=>'5','Ten' => 'Tennis','TenKhongDau' => 'Tennis'],
        	['idChuyenMuc'=>'5','Ten' => 'Chân Dung','TenKhongDau' => 'Chan-Dung'],
        	['idChuyenMuc'=>'5','Ten' => 'Ảnh','TenKhongDau' => 'Anh-TT'],
        	['idChuyenMuc'=>'6','Ten' => 'Hình Sự','TenKhongDau' => 'Hinh-Su']
    	]);
    }
}
