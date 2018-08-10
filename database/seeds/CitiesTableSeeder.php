<?php

use Illuminate\Database\Seeder;
use App\Province;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hcm = [
            'Quận 1',
            'Quận 12',
            'Quận Thủ Đức',
            'Quận 9',
            'Quận Gò Vấp',
            'Quận Bình Thạnh',
            'Quận Tân Bình',
            'Quận Tân Phú',
            'Quận Phú Nhuận',
            'Quận 2',
            'Quận 3',
            'Quận 10',
            'Quận 11',
            'Quận 4',
            'Quận 5',
            'Quận 6',
            'Quận 8',
            'Quận Bình Tân',
            'Quận 7',
            'Huyện Củ Chi',
            'Huyện Hóc Môn',
            'Huyện Bình Chánh',
            'Huyện Nhà Bè',
            'Huyện Cần Giờ'
        ];

        $hanoi = [
            'Quận Ba Đình',
            'Quận Hoàn Kiếm',
            'Quận Hai Bà Trưng',
            'Quận Đống Đa',
            'Quận Tây Hồ',
            'Quận Cầu Giấy',
            'Quận Thanh Xuân',
            'Quận Hoàng Mai',
            'Quận Long Biên',
            'Huyện Từ Liêm',
            'Huyện Thanh Trì',
            'Huyện Gia Lâm',
            'Huyện Đông Anh',
            'Huyện Sóc Sơn',
            'Quận Hà Đông',
            'Thị xã Sơn Tây',
            'Huyện Ba Vì',
            'Huyện Phúc Thọ',
            'Huyện Thạch Thất',
            'Huyện Quốc Oai',
            'Huyện Chương Mỹ',
            'Huyện Đan Phượng',
            'Huyện Hoài Đức',
            'Huyện Thanh Oai',
            'Huyện Mỹ Đức',
            'Huyện Ứng Hoà',
            'Huyện Thường Tín',
            'Huyện Phú Xuyên',
            'Huyện Mê Linh'
        ];

        $hanam = [
            'Thị xã Phủ Lý',
            'Huyện Duy Tiên',
            'Huyện Kim Bảng',
            'Huyện Lý Nhân',
            'Huỵện Thanh Liêm',
            'Huyện Bình Lục'
        ];

        $thainguyen = [
            'Thành phố Thái Nguyên',
            'Thị xã Sông Công',
            'Huyện Định Hoá',
            'Huyện Phú Lương',
            'Huyện Võ Nhai',
            'Huyện Đại Từ',
            'Huyện Đồng Hỷ',
            'Huyện Phú Bình',
            'Huyện Phổ Yên'
        ];

        $phuyen = [
            'Huyện Đồng Xuân', 
            'Huyện Đồng Hòa',
            'Huyện Sông Hinh',
            'Huyện Sơn Hòa',
            'Huyện Phú Hòa',
            'Huyện Tây Hòa',
            'Huyện Tuy An',
            'Thị xã Sông Cầu',
            'Thành phố Tuy Hòa'
        ];

        $yenbai = [
            'Thành phố Yên Bái',
            'Thị xã Nghĩa Lộ',
            'Huyện Yên Bình',
            'Huyện Trấn Yên',
            'Huyện Văn Yên',
            'Huyện Lục Yên',
            'Huyện Văn Chấn',
            'Huyện Trạm Tấu',
            'Huyện Mù Cang Chải'
        ];

        $hungyen =[
            'Thị xã Hưng Yên',
            'Huyện Kim Động',
            'Huyện Ân Thi',
            'Huyện Khoái Châu',
            'Huyện Yên Mỹ',
            'Huyện Tiên Lữ',
            'Huyện Phù Cừ',
            'Huyện Mỹ Hào',
            'Huyện Văn Lâm',
            'Huyện Văn Giang'
        ];

        $bacninh = [
            'Thành phố Bắc Ninh',
            'Huyện Yên Phong',
            'Huyện Quế Võ',
            'Huyện Tiên Du',
            'Huyện Từ Sơn',
            'Huyện Thuận Thành',
            'Huyện Gia Bình',
            'Huyện Lương Tài'
        ];

        $nghean = [
            'Thành phố Vinh',
            'Thị xã Cửa Lò',
            'Huyện Quỳ Châu',
            'Huyện Quỳ Hợp',
            'Huyện Nghĩa Đàn',
            'Huyện Quỳnh Lưu',
            'Huyện Kỳ Sơn',
            'Huyện Tương Dương',
            'Huyện Con Cuông',
            'Huyện Tân Kỳ',
            'Huyện Yên Thành',
            'Huyện Diễn Châu',
            'Huyện Anh Sơn',
            'Huyện Đô Lương',
            'Huyện Thanh Chương',
            'Huyện Nghi Lộc',
            'Huyện Nam Đàn',
            'Huyện Hưng Nguyên',
            'Huyện Quế Phong'
        ];

        $hoabinh = [
            'Thành phố Hoà Bình',
            'Huyện Đà Bắc',
            'Huyện Mai Châu',
            'Huyện Tân Lạc',
            'Huyện Lạc Sơn',
            'Huyện Kỳ Sơn',
            'Huyện Lương Sơn',
            'Huyện Kim Bôi',
            'Huyện Lạc Thuỷ',
            'Huyện Yên Thuỷ',
            'Huyện Cao Phong'
        ];

        foreach ($hcm as $hcm) {
            Province::create([
                'name' => $hcm,
                'city_id' => 1
            ]);
        }

        foreach ($hanoi as $hn) {
            Province::create([
                'name' => $hn,
                'city_id' => 2
            ]);
        }

        foreach ($hanam as $hnam) {
            Province::create([
                'name' => $hnam,
                'city_id' => 43
            ]);
        }

        foreach ($thainguyen as $tn) {
            Province::create([
                'name' => $tn,
                'city_id' => 15
            ]);
        }

        foreach ($phuyen as $py) {
            Province::create([
                'name' => $py,
                'city_id' => 6
            ]);
        }

        foreach ($yenbai as $yb) {
            Province::create([
                'name' => $yb,
                'city_id' => 7
            ]);
        }

        foreach ($hungyen as $hy) {
            Province::create([
                'name' => $hy,
                'city_id' => 38
            ]);
        }

        foreach ($bacninh as $bn) {
            Province::create([
                'name' => $bn,
                'city_id' => 58
            ]);
        }

        foreach ($nghean as $na) {
            Province::create([
                'name' => $na,
                'city_id' => 28
            ]);
        }

        foreach ($hoabinh as $hb) {
            Province::create([
                'name' => $hb,
                'city_id' => 39
            ]);
        }
    }
}
