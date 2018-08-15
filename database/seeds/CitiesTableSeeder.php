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
        $provinces[1] = [
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

        $provinces[2] = [
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

        $provinces[3] = [
            'Quận Hồng Bàng',
            'Quận Lê Chân',
            'Quận Ngô Quyền',
            'Quận Kiến An',
            'Quận Hải An',
            'Quận Đồ Sơn',
            'Huyện An Lão',
            'Huyện Kiến Thuỵ',
            'Huyện Thủy Nguyên',
            'Huyện An Dương',
            'Huyện Tiên Lãng',
            'Huyện Vĩnh Bảo',
            'Huyện Cát Hải',
            'Huyện Bạch Long Vĩ',
            'Quận Dương Kinh',
        ];

        $provinces[4] = [
            'Quận Hải Châu',
            'Quận Thanh Khê',
            'Quận Sơn Trà',
            'Quận Ngũ Hành Sơn',
            'Quận Liên Chiểu',
            'Huyện Hòa Vang',
            'Quận Cẩm Lệ',
            'Huyện Hoàng Sa'
        ];

        $provinces[5] = [
            'Quận Ninh Kiều',
            'Quận Bình Thuỷ',
            'Quận Cái Răng',
            'Quận Ô Môn',
            'Huyện Phong Điền',
            'Huyện Cờ Đỏ',
            'Huyện Vĩnh Thạnh',
            'Huyện Thốt Nốt'
        ];

        $provinces[6] = [
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

        $provinces[7] = [
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

        $provinces[8] = [
            'Thành phố Vĩnh Yên',
            'Huyện Tam Dương',
            'Huyện Lập Thạch',
            'Huyện Vĩnh Tường',
            'Huyện Yên Lạc',
            'Huyện Bình Xuyên',
            'Thị xã Phúc Yên',
            'Huyện Tam Đảo'
        ];

        $provinces[9] = [
            'Thành phố Vĩnh Long',
            'Huyện Long Hồ',
            'Huyện Mang Thít',
            'Huyện Bình Tân',
            'Thị xã Bình Minh',
            'Huyện Trà Ôn',
            'Huyện Vũng Liêm',
            'Huyện Tam Bình',
        ];

        $provinces[10] = [
            'Thành phố Tuyên Quang',
            'Huyện Sơn Dương',
            'Huyện Yên Sơn',
            'Huyện Hàm Yên',
            'Huyện Chiêm Hóa',
            'Huyện Na Hang',
            'Huyện Lâm Bình'
        ];

        $provinces[11] = [
            'Thành phố Trà Vinh',
            'Thị xã Duyên Hải',
            'Huyện Châu thành',
            'Huyện Cầu ngang',
            'Huyện Càng Long',
            'Huyện Duyên Hải',
            'Huyện Tiểu Cần',
            'Huyện Cầu Kè',
            'Huyện Trà Cú'
        ];

        $provinces[12] = [
            'Thành phố Mỹ Tho',
            'Thị xã Gò Công',
            'Thị xã Cai Lậy',
            'Huyện Cai Lậy',
            'Huyện Cái Bè',
            'Huyện Tân Phước',
            'Huyện Châu Thành',
            'Huyện Chợ Gạo',
            'Huyện Gò Công Tây',
            'Huyện Gò Công Đông',
            'Huyện Tân Phú Đông'
        ];

        $provinces[13] = [
            'Thành phố Huế ',
            'Huyện A Lưới',
            'Thị xã Hương Thủy',
            'Thị xã Hương Trà',
            'Huyện Nam Đông',
            'Huyện Phong Điền',
            'Huyện Phú Lộc',
            'Huyện Phú Vang',
            'Huyện Quảng Điền'
        ];

        $provinces[14] = [
            'Thành phố Thanh Hóa',
            'Thị xã Sầm Sơn',
            'Huyện Quảng Xương',
            'Huyện Hậu Lộc',
            'Huyện Nga Sơn',
            'Huyện Triệu Sơn',
            'Huyện Tĩnh Gia',
            'Huyện Ngọc Lặc',
            'Huyện Thạch Thành',
            'Huyện Thọ Xuân',
            'Huyện Như Xuân',
            'Huyện Lang Chánh',
            'Huyện Quan Hóa',
            'Huyện Mường Lát',
            'Thị xã Bỉm Sơn',
            'Huyện Đông Sơn',
            'Huyện Hoằng Hóa',
            'Huyện Hà Trung',
            'Huyện Thiệu Hóa',
            'Huyện Yên Định',
            'Huyện Nông Cống',
            'Huyện Cẩm Thủy',
            'Huyện Vĩnh Lộc',
            'Huyện Như Thanh',
            'Huyện Thường Xuân',
            'Huyện Bá Thước',
            'Huyện Quan Sơn'
        ];

        $provinces[15] = [
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

        $provinces[16] = [
            'Huyện Đông Hưng',
            'Huyện Hưng Hà',
            'Huyện Kiến Xương',
            'Thành phố Thái Bình',
            'Huyện Thái Thụy',
            'Huyện Tiền Hải',
            'Huyện Vũ Thư',
            'Huyện Quỳnh Phụ'
        ];

        $provinces[17] = [
            'Thành phố Tây Ninh',
            'Huyện Tân Biên',
            'Huyện Tân Châu',
            'Huyện Dương Minh Châu',
            'Huyện Châu Thành',
            'Huyện Hoà Thành',
            'Huyện Bến Cầu',
            'Huyện Gò Dầu',
            'Huyện Trảng Bàng'
        ];

        $provinces[18] = [
            'Thành phố Sơn La',
            'Huyện Quỳnh Nhai',
            'Huyện Mường La',
            'Huyện Thuận Châu',
            'Huyện Bắc Yên',
            'Huyện Phù Yên',
            'Huyện Mai Sơn',
            'Huyện Yên Châu',
            'Huyện Sông Mã',
            'Huyện Mộc Châu',
            'Huyện Sốp Cộp',
            'Huyện Vân Hồ'
        ];

        $provinces[19] = [
            'Thành phố Sóc Trăng',
            'Huyện Kế Sách',
            'Huyện Mỹ Tú',
            'Huyện Mỹ Xuyên',
            'Huyện Thạnh Trị',
            'Huyện Long Phú',
            'Thị xã Vĩnh Châu',
            'Huyện Cù Lao Dung',
            'Thị xã Ngã Năm',
            'Huyện Châu Thành',
            'Huyện Trần Đề'
        ];

        $provinces[20] = [
            'Thành phố Đông Hà',
            'Thị xã Quảng Trị',
            'Huyện Vĩnh Linh',
            'Huyện Gio Linh',
            'Huyện Cam Lộ',
            'Huyện Triệu Phong',
            'Huyện Hải Lăng',
            'Huyện Hướng Hoá',
            'Huyện Đakrông',
            'Huyện đảo Cồn Cỏ'
        ];

        $provinces[21] = [
            'Thành phố Hạ Long',
            'Thành phố Cẩm Phả',
            'Thành phố Uông Bí',
            'Thành phố Móng Cái',
            'Huyện Bình Liêu',
            'Huyện Đầm Hà',
            'Huyện Hải Hà',
            'Huyện Tiên Yên',
            'Huyện Ba Chẽ',
            'Thị xã Đông Triều',
            'Thị xã Quảng Yên',
            'Huyện Hoành Bồ',
            'Huyện Vân Đồn',
            'Huyện Cô Tô'
        ];

        $provinces[22] = [
            'Huyện Bình Sơn',
            'Huyện Sơn Tịnh',
            'Thành phố Quảng Ngãi',
            'Huyện Tư Nghĩa',
            'Huyện Nghĩa Hành',
            'Huyện Mộ Đức',
            'Huyện Đức Phổ',
            'Huyện Ba Tơ',
            'Huyện Minh Long',
            'Huyện Sơn Hà',
            'Huyện Sơn Tây',
            'Huyện Trà Bồng',
            'Huyện Tây Trà',
            'Huyện Lý Sơn'
        ];

        $provinces[23] = [
            'Thành phố Tam Kỳ',
            'Thành phố Hội An',
            'Huyện Duy Xuyên',
            'Thị xã Điện Bàn',
            'Huyện Đại Lộc',
            'Huyện Quế Sơn',
            'Huyện Hiệp Đức',
            'Huyện Thăng Bình',
            'Huyện Núi Thành',
            'Huyện Tiên Phước',
            'Huyện Bắc Trà My',
            'Huyện Đông Giang',
            'Huyện Nam Giang',
            'Huyện Phước Sơn',
            'Huyện Nam Trà My',
            'Huyện Tây Giang',
            'Huyện Phú Ninh',
            'Huyện Nông Sơn'
        ];

        $provinces[24] = [
            'Thành phố Đồng Hới',
            'Huyện Tuyên Hoá',
            'Huyện Minh Hoá',
            'Huyện Quảng Trạch',
            'Huyện Bố Trạch',
            'Huyện Quảng Ninh',
            'Huyện Lệ Thuỷ',
            'Thị xã Ba Đồn'
        ];

        $provinces[25] = [
            'Thành Phố Việt Trì',
            'Thị xã Phú Thọ',
            'Huyện Đoan Hùng',
            'Huyện Thanh Ba',
            'Huyện Hạ Hoà',
            'Huyện Cẩm Khê',
            'Huyện Yên Lập',
            'Huyện Thanh Sơn',
            'Huyện Phù Ninh',
            'Huyện Lâm Thao',
            'Huyện Tam Nông',
            'Huyện Thanh Thuỷ',
            'Huyện Tân Sơn'
        ];

        $provinces[26] = [
            'Thành phố Phan Rang - Tháp Chàm',
            'Huyện Ninh Sơn',
            'Huyện Ninh Phước',
            'Huyện Bác Ái',
            'Huyện Thuận Bắc',
            'Huyện Thuận Nam'
        ];

        $provinces[27] = [
            'Thành phố Ninh Bình',
            'Thành phố Tam Điệp',
            'Huyện Nho Quan',
            'Huyện Gia Viễn',
            'Huyện Hoa Lư',
            'Huyện Yên Mô',
            'Huyện Kim Sơn',
            'Huyện Yên Khánh'
        ];

        $provinces[28] = [
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

        $provinces[29] = [
            'Thành phố Nam Định',
            'Huyện Mỹ Lộc',
            'Huyện Xuân Trường',
            'Huyện Giao Thuỷ',
            'Huyện Ý Yên',
            'Huyện Vụ Bản',
            'Huyện Nam Trực',
            'Huyện Trực Ninh',
            'Huyện Nghĩa Hưng',
            'Huyện Hải Hậu'
        ];

        $provinces[30] = [
            'Thành phố Tân An',
            'Huyện Vĩnh Hưng',
            'Huyện Mộc Hóa',
            'Huyện Tân Thạnh',
            'Huyện Thạnh Hoá',
            'Huyện Đức Huệ',
            'Huyện Đức Hoà',
            'Huyện Bến Lức',
            'Huyện Thủ Thừa',
            'Huyện Châu Thành',
            'Huyện Tân Trụ',
            'Huyện Cần Đước',
            'Huyện Cần Giuộc',
            'Huyện Tân Hưng',
            'Thị xã Kiến Tường'
        ];

        $provinces[31] = [
            'Huyện Bảo Thắng',
            'Huyện Bảo Yên',
            'Huyện Bát Xát',
            'Huyện Bắc Hà',
            'Thành phố Lào Cai',
            'Huyện Mường Khương',
            'Huyện Sa Pa',
            'Huyện Si Ma Cai',
            'Huyện Văn Bàn'
        ];
        
        $provinces[32] = [
            'Thành Phố Lạng Sơn',
            'Huyện Tràng Định',
            'Huyện Bình Gia',
            'Huyện Văn Lãng',
            'Huyện Bắc Sơn',
            'Huyện Văn Quan',
            'Huyện Cao Lộc',
            'Huyện Lộc Bình',
            'Huyện Chi Lăng',
            'Huyện Đình Lập',
            'Huyện Hữu Lũng'
        ];

        $provinces[33] = [
            'Thành phố Đà Lạt',
            'Thành phố Bảo Lộc',
            'Huyện Đức Trọng',
            'Huyện Di Linh',
            'Huyện Đơn Dương',
            'Huyện Lạc Dương',
            'Huyện Đạ Huoai',
            'Huyện Đạ Tẻh',
            'Huyện Cát Tiên',
            'Huyện Lâm Hà',
            'Huyện Bảo Lâm',
            'Huyện Đam Rông'
        ];

        $provinces[34] = [
            'Thành Phố Lai Châu',
            'Huyện Tam Đường',
            'Huyện Phong Thổ',
            'Huyện Sìn Hồ',
            'Huyện Mường Tè',
            'Huyện Than Uyên',
            'Huyện Tân Uyên',
            'Huyện Nậm Nhùn'
        ];

        $provinces[35] = [
            'Thành phố Kon Tum',
            'Huyện Đăk Glei',
            'Huyện Ngọc Hồi',
            'Huyện Đăk Tô',
            'Huyện Sa Thầy',
            'Huyện Kon Plông',
            'Huyện Đắk Hà',
            'Huyện Kon Rẫy',
            'Huyện Tu Mơ Rông'
        ];

        $provinces[36] = [
            'Thành phố Rạch Giá',
            'Thị xã Hà Tiên',
            'Huyện Kiên Lương',
            'Huyện Hòn Đất',
            'Huyện Tân Hiệp',
            'Huyện Châu Thành',
            'Huyện Giồng Riềng',
            'Huyện Gò Quao',
            'Huyện An Biên',
            'Huyện An Minh',
            'Huyện Vĩnh Thuận',
            'Huyện Phú Quốc',
            'Huyện Kiên Hải',
            'Huyện U Minh Thượng',
            'Huyện Giang Thành'
        ];

        $provinces[37] = [
            'Thành phố Nha Trang',
            'Huyện Vạn Ninh',
            'Thị xã Ninh Hoà',
            'Huyện Diên Khánh',
            'Huyện Khánh Vĩnh',
            'Thành phố Cam Ranh',
            'Huyện Khánh Sơn',
            'Huyện Cam Lâm'
        ];

        $provinces[38] =[
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

        $provinces[39] = [
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

        $provinces[40] = [
            'Thành phố Vị Thanh',
            'Huyện Vị Thủy',
            'Huyện Long Mỹ',
            'Huyện Phụng Hiệp',
            'Huyện Châu Thành',
            'Huyện Châu Thành A',
            'Thị xã Ngã Bảy',
            'Thị xã Long Mỹ'
        ];

        $provinces[41] = [
            'Thành phố Hải Dương',
            'Thị xã Chí Linh',
            'Huyện Nam Sách',
            'Huyện Kinh Môn',
            'Huyện Gia Lộc',
            'Huyện Tứ Kỳ',
            'Huyện Thanh Miện',
            'Huyện Ninh Giang',
            'Huyện Cẩm Giàng',
            'Huyện Thanh Hà',
            'Huyện Kim Thành',
            'Huyện Bình Giang'
        ];

        $provinces[42] = [
            'Thành phố Hà Tĩnh',
            'Thị xã Hồng Lĩnh',
            'Huyện Hương Sơn',
            'Huyện Đức Thọ',
            'Huyện Nghi Xuân',
            'Huyện Can Lộc',
            'Huyện Hương Khê',
            'Huyện Thạch Hà',
            'Huyện Cẩm Xuyên',
            'Huyện Kỳ Anh',
            'Huyện Vũ Quang',
            'Huyện Lộc Hà',
            'Thị xã Kỳ Anh'
        ];

        $provinces[43] = [
            'Thị xã Phủ Lý',
            'Huyện Duy Tiên',
            'Huyện Kim Bảng',
            'Huyện Lý Nhân',
            'Huỵện Thanh Liêm',
            'Huyện Bình Lục'
        ];

        $provinces[44] = [
            'Thành Phố Hà Giang',
            'Huyện Đồng Văn',
            'Huyện Mèo Vạc',
            'Huyện Yên Minh',
            'Huyện Quản Bạ',
            'Huyện Vị Xuyên',
            'Huyện Bắc Mê',
            'Huyện Hoàng Su Phì',
            'Huyện Xín Mần',
            'Huyện Bắc Quang',
            'Huyện Quang Bình'
        ];

        $provinces[45] = [
            'Thành phố Pleiku',
            'Huyện Chư Păh',
            'Huyện Mang Yang',
            'Huyện KBang',
            'Thị xã An Khê',
            'Huyện Kông Chro',
            'Huyện Đức Cơ',
            'Huyện Chư Prông',
            'Huyện Chư Sê',
            'Thị xã Ayun Pa',
            'Huyện Krông Pa',
            'Huyện Ia Grai',
            'Huyện Đak Đoa',
            'Huyện Ia Pa',
            'Huyện Đak Pơ',
            'Huyện Phú Thiện',
            'Huyện Chư Pưh'
        ];

        $provinces[46] = [
            'Huyện Châu Thành',
            'Huyện Lai Vung',
            'Huyện Lấp Vò',
            'Thành phố Sa Đéc',
            'Thành phố Cao Lãnh',
            'Huyện Cao Lãnh',
            'Huyện Tháp Mười',
            'Huyện Tam Nông',
            'Huyện Thanh Bình',
            'Thị xã Hồng Ngự',
            'Huyện Hồng Ngự',
            'Huyện Tân Hồng'
        ];

        $provinces[47] = [
            'Thành phố Biên Hòa',
            'Huyện Vĩnh Cửu',
            'Huyện Tân Phú',
            'Huyện Định Quán',
            'Huyện Thống Nhất',
            'Thị Xã Long Khánh',
            'Huyện Xuân Lộc',
            'Huyện Long Thành',
            'Huyện Nhơn Trạch',
            'Huyện Trảng Bom',
            'Huyện Cẩm Mỹ'
        ];

        $provinces[48] = [
            'Thành phố Điện Biên Phủ',
            'Thị xã Mường Lay',
            'Huyện Điện Biên',
            'Huyện Tuần Giáo',
            'Huyện Mường Chà',
            'Huyện Tủa Chùa',
            'Huyện Điện Biên Đông',
            'Huyện Mường Nhé',
            'Huyện Mường Ảng',
            'Huyện Nậm Pồ'
        ];

        $provinces[49] = [
            'Thị xã Gia Nghĩa',
            'Huyện Đăk RLấp',
            'Huyện Đăk Mil',
            'Huyện Cư Jút',
            'Huyện Đăk Song',
            'Huyện Krông Nô',
            'Huyện Đăk Glong',
            'Huyện Tuy Đức'
        ];

        $provinces[50] = [
            'Thành phố Buôn Ma Thuột',
            'Huyện Ea H\'Leo',
            'Huyện Krông Buk',
            'Huyện Krông Năng',
            'Huyện Ea Súp',
            'Huyện Cư M\'gar',
            'Huyện Krông Pắk',
            'Huyện Ea Kar',
            'Huyện M\'Drăk',
            'Huyện Krông Ana',
            'Huyện Krông Bông',
            'Huyện Lắk',
            'Huyện Buôn Đôn',
            'Huyện Cư Kuin',
            'Huyện Thị xã Buôn Hồ'
        ];

        $provinces[51] = [
            'Thành Phố Cao Bằng',
            'Huyện Bảo Lạc',
            'Huyện Thông Nông',
            'Huyện Hà Quảng',
            'Huyện Trà Lĩnh',
            'Huyện Trùng Khánh',
            'Huyện Nguyên Bình',
            'Huyện Hoà An',
            'Huyện Quảng Uyên',
            'Huyện Thạch An',
            'Huyện Hạ Lang',
            'Huyện Bảo Lâm',
            'Huyện Phục Hoà'
        ];

        $provinces[52] = [
            'Thành phố Cà Mau',
            'Huyện Thới Bình',
            'Huyện U Minh',
            'Huyện Trần Văn Thời',
            'Huyện Cái Nước',
            'Huyện Đầm Dơi',
            'Huyện Ngọc Hiển',
            'Huyện Năm Căn',
            'Huyện Phú Tân'
        ];

        $provinces[53] = [
            'Thành phố Phan Thiết',
            'Huyện Tuy Phong',
            'Huyện Bắc Bình',
            'Huyện Hàm Thuận Bắc',
            'Huyện Hàm Thuận Nam',
            'Huyện Hàm Tân',
            'Huyện Đức Linh',
            'Huyện Tánh Linh',
            'Huyện Đảo Phú Quý',
            'Thị xã La Gi'
        ];

        $provinces[54] = [
            'Thị xã Đồng Xoài',
            'Huyện Đồng Phú',
            'Huyện Chơn Thành',
            'Thị xã Bình Long',
            'Huyện Lộc Ninh',
            'Huyện Bù Đốp',
            'Thị xã Phước Long',
            'Huyện Bù Đăng',
            'Huyện Hớn Quản',
            'Huyện Bù Gia Mập',
            'Huyện Phú Riềng'
        ];

        $provinces[55] = [
            'Thành phố Thủ Dầu Một',
            'Thị xã Bến Cát',
            'Thị xã Tân Uyên',
            'Thị xã Thuận An',
            'Thị xã Dĩ An',
            'Huyện Phú Giáo',
            'Huyện Dầu Tiếng',
            'Huyện Bắc Tân Uyên',
            'Huyện Bàu Bàng'
        ];

        $provinces[56] = [
            'Thành phố Quy Nhơn',
            'Huyện An Lão',
            'Huyện Hoài Ân',
            'Huyện Hoài Nhơn',
            'Huyện Phù Mỹ',
            'Huyện Phù Cát',
            'Huyện Vĩnh Thạnh',
            'Huyện Tây Sơn',
            'Huyện Vân Canh',
            'Thị xã An Nhơn',
            'Huyện Tuy Phước'
        ];

        $provinces[57] = [
            'Thành phố Bến Tre',
            'Huyện Châu Thành',
            'Huyện Chợ Lách',
            'Huyện Mỏ Cày Bắc',
            'Huyện Giồng Trôm',
            'Huyện Bình Đại',
            'Huyện Ba Tri',
            'Huyện Thạnh Phú',
            'Huyện Mỏ Cày Nam'
        ];

        $provinces[58] = [
            'Thành phố Bắc Ninh',
            'Huyện Yên Phong',
            'Huyện Quế Võ',
            'Huyện Tiên Du',
            'Huyện Từ Sơn',
            'Huyện Thuận Thành',
            'Huyện Gia Bình',
            'Huyện Lương Tài'
        ];

        $provinces[59] = [
            'Thành phố Bạc Liêu',
            'Huyện Vĩnh Lợi',
            'Huyện Hồng Dân',
            'Thị xã Giá Rai',
            'Huyện Phước Long',
            'Huyện Đông Hải',
            'Huyện Hòa Bình'
        ];

        $provinces[60] = [
            'Thành Phố Bắc Kạn',
            'Huyện Chợ Đồn',
            'Huyện Bạch Thông',
            'Huyện Na Rì',
            'Huyện Ngân Sơn',
            'Huyện Ba Bể',
            'Huyện Chợ Mới',
            'Huyện Pác Nặm'
        ];

        $provinces[61] = [
            'Thành phố Bắc Giang',
            'Huyện Yên Thế',
            'Huyện Lục Ngạn',
            'Huyện Sơn Động',
            'Huyện Lục Nam',
            'Huyện Tân Yên',
            'Huyện Hiệp Hòa',
            'Huyện Lạng Giang',
            'Huyện Việt Yên',
            'Huyện Yên Dũng'
        ];

        $provinces[62] = [
            'Thành phố Vũng Tàu',
            'Thành phố Bà Rịa',
            'Huyện Xuyên Mộc',
            'Huyện Long Điền',
            'Huyện Côn Đảo',
            'Huyện Tân Thành',
            'Huyện Châu Đức',
            'Huyện Đất Đỏ'
        ];

        $provinces[63] = [
            'Thành phố Long Xuyên',
            'Thành phố Châu Đốc',
            'Huyện An Phú',
            'Thị xã Tân Châu',
            'Huyện Phú Tân',
            'Huyện Tịnh Biên',
            'Huyện Tri Tôn',
            'Huyện Châu Phú',
            'Huyện Chợ Mới',
            'Huyện Châu Thành',
            'Huyện Thoại Sơn'
        ];

        for ($i = 1; $i <= 63; $i++) {
            foreach ($provinces[$i] as $province) {
                Province::create([
                    'name' => $province,
                    'city_id' => $i
                ]);
            }
        }
    }
}
