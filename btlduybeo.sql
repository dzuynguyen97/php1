-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2021 lúc 10:22 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dinhquangdao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hd` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ma_sp` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `giasp` int(11) UNSIGNED NOT NULL,
  `thanh_tien` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`ma_hd`, `ma_sp`, `so_luong`, `giasp`, `thanh_tien`) VALUES
('1', 'SP011', 3, 18000000, 54000000),
('2', 'SP003', 1, 22000000, 22000000),
('2', 'SP004', 1, 20000000, 20000000),
('2', 'SP010', 2, 16000000, 32000000),
('2', 'SP011', 1, 10000000, 10000000),
('3', 'SP002', 1, 18000000, 18000000),
('4', 'SP001', 2, 16000000, 32000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_sp` varchar(6) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `giasp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngay_mua` datetime NOT NULL DEFAULT current_timestamp(),
  `tong_tien` bigint(20) UNSIGNED NOT NULL,
  `da_ban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `user`, `dia_chi`, `sdt`, `ngay_mua`, `tong_tien`, `da_ban`) VALUES
('1', 'slick', 'huong son', '83213712', '2021-04-16 15:28:22', 54000000, NULL),
('2', 'slick', 'ha noi', '09038213', '2021-04-17 14:27:07', 84000000, NULL),
('3', 'ngoc', 'ha noi', '0712646172', '2021-04-17 14:28:31', 18000000, NULL),
('4', 'ngoc', 'ha noi', '83213712', '2021-04-17 14:29:03', 32000000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `user` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phan_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`user`, `password`, `ho_ten`, `phan_quyen`) VALUES
('abc', 'abc', 'abc', 1),
('admin1', 'admin', 'admin', 2),
('admin2', 'admin2', 'Quản trị viên', 2),
('dao1299', 'dao1299', 'dao', 1),
('guest', 'guest', '1232131', 1),
('ngoc', 'ngoc', 'le thi ngoc', 1),
('pppp', '', 'name', 1),
('slick', 'slick', 'Đinh Quang Đạo', 1),
('thanh', '123', 'thanh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_dien_thoai`
--

CREATE TABLE `loai_dien_thoai` (
  `ma_loai` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `seri` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phien_ban` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dung_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_dien_thoai`
--

INSERT INTO `loai_dien_thoai` (`ma_loai`, `seri`, `phien_ban`, `dung_luong`) VALUES
('ML001', '12', 'Iphone 12 Mini', 64),
('ML002', '12', 'Iphone 12 Mini', 128),
('ML003', '12', 'Iphone 12 Mini', 256),
('ML004', '12', 'Iphone 12', 64),
('ML005', '12', 'Iphone 12 ', 128),
('ML006', '12', 'Iphone 12', 256),
('ML007', '12', 'Iphone 12 Pro Max', 128),
('ML008', '12', 'Iphone 12 Pro Max', 256),
('ML009', '12', 'Iphone 12 Pro Max', 512),
('ML010', '11', 'Iphone 11', 64),
('ML011', '11', 'Iphone 11', 128),
('ML012', '11', 'Iphone 11', 256),
('ML013', '11', 'Iphone 11 Pro', 64),
('ML014', '11', 'Iphone 11 Pro', 256),
('ML015', '11', 'Iphone 11 Pro Max', 64),
('ML016', '11', 'Iphone 11 Pro Max', 256),
('ML017', 'X', 'Iphone X ', 64),
('ML018', 'X', 'Iphone X', 256),
('ML019', 'X', 'Iphone XS', 64),
('ML020', 'X', 'Iphone XS', 256),
('ML021', 'X', 'Iphone XS Max', 64),
('ML022', 'X', 'Iphone XS Max', 256);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` varchar(6) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ten_sp` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ma_loai` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `da_ban` int(11) NOT NULL,
  `gia_sp` int(11) UNSIGNED NOT NULL,
  `hinh_anh_1` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `hinh_anh_2` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `hinh_anh_3` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noi_dung_1` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noi_dung_2` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noi_dung_3` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `ma_loai`, `da_ban`, `gia_sp`, `hinh_anh_1`, `hinh_anh_2`, `hinh_anh_3`, `noi_dung_1`, `noi_dung_2`, `noi_dung_3`) VALUES
('SP001', 'iPhone 12 Mini 64GB', 'ML001', 5, 16000000, '.\\img\\12mini\\64\\1.jpg', '.\\img\\12mini\\64\\2.jpg', '.\\img\\12mini\\64\\3.jpg', 'Điện thoại iPhone 12 phiên bản mini là một trong những phiên bản điện thoại siêu phẩm của Apple, ở dòng máy này viền máy không còn được thiết kế bo cong các cạnh, mà thay vào đó là phần cạnh máy được vát phẳng vô cùng mạnh mẽ và cá tính.\r\n\r\nMàn hình kiểu dáng tai thỏ quen thuộc, với phần khuyết được tinh gọn hơn mang đến cảm giác màn hình lớn hơn dù iPhone 12 mini có kích cỡ màn hình chỉ 5.4 inch.\r\nMàn hình kích cỡ 5.4 inch là điểm thuận lợi bởi máy khá nhỏ gọn, có thể dễ dàng đặt trong túi áo, quần hơn so với 6.1 inch trên điện thoại iPhone 12 Pro hay 6.7 inch trên 12 Pro Max.\r\n\r\nMàn hình của iPhone 12 mini có độ phân giải 2340×1080, từng chi tiết, chuyển động trên màn hình đều hiện lên rõ nét, tươi sáng và không gặp phải tình trạng nhòe, giật hình.', 'Điểm nhấn của dòng điện thoại lần này nằm ở camera, camera của điện thoại iPhone 12 mini với camera kép 12MP nhờ đó hình ảnh sẽ được ghi lại rõ nét, không bể hình khi phóng to.\r\n\r\nCamera sau cảm biến chính 64MP được trang bị máy quét LiDar\r\niPhone 12 mini cũng tương tự các phiên bản iPhone 12 khác khi máy được trang bị con chip Apple A14. Nhờ đó, điện thoại cho khả năng xử lý nhanh – mượt mà.', 'Tuy dòng điện thoại lần này sẽ không được đi kèm với bộ sạc, nhưng bù lại, chiếc điện thoại iPhone 2020 mini này có dung lượng pin tương đối lớn, dung lượng pin tuy không thuộc hàng “khủng” nhưng vẫn cho thời lượng sử dụng lên đên 17 giờ xem video, 50 giờ nghe nhạc.'),
('SP002', 'iPhone 12 Mini 128GB', 'ML002', 21, 18000000, '.\\img\\12mini\\128\\1.jpg', '.\\img\\12mini\\128\\2.jpg', '.\\img\\12mini\\128\\3.jpg', 'Điện thoại iPhone 12 phiên bản mini là một trong những phiên bản điện thoại siêu phẩm của Apple, ở dòng máy này viền máy không còn được thiết kế bo cong các cạnh, mà thay vào đó là phần cạnh máy được vát phẳng vô cùng mạnh mẽ và cá tính.\r\n\r\nMàn hình kiểu dáng tai thỏ quen thuộc, với phần khuyết được tinh gọn hơn mang đến cảm giác màn hình lớn hơn dù iPhone 12 mini có kích cỡ màn hình chỉ 5.4 inch.', 'Điểm nhấn của dòng điện thoại lần này nằm ở camera, camera của điện thoại iPhone 12 mini với camera kép 12MP nhờ đó hình ảnh sẽ được ghi lại rõ nét, không bể hình khi phóng to.\r\n\r\nCamera sau cảm biến chính 64MP được trang bị máy quét LiDar', 'Ngoài ra, iP 12 mini còn được trang bị tính năng sạc nhanh 20W, nhờ có điểm này, người dùng có thể nhanh chóng sạc đầy chiếc điện thoại của mình, để tiếp tục công việc mà không bị gián đoạn quá lâu.\r\n\r\nKhông chỉ thế, tính năng sạc nhanh này không chỉ được áp dụng với bộ sạc có dây mà đối với cả sạc không dây. Kể cả khi bạn dùng sạc không dây thì tính năng sạc nhanh 20W vẫn được áp dụng như thường.'),
('SP003', 'iPhone 12 Mini 256GB', 'ML003', 2, 22000000, '.\\img\\12mini\\256\\1.jpg', '.\\img\\12mini\\256\\2.jpg', '.\\img\\12mini\\256\\3.jpg', 'Điện thoại iPhone 12 phiên bản mini là một trong những phiên bản điện thoại siêu phẩm của Apple, ở dòng máy này viền máy không còn được thiết kế bo cong các cạnh, mà thay vào đó là phần cạnh máy được vát phẳng vô cùng mạnh mẽ và cá tính.\r\n\r\nMàn hình kiểu dáng tai thỏ quen thuộc, với phần khuyết được tinh gọn hơn mang đến cảm giác màn hình lớn hơn dù iPhone 12 mini có kích cỡ màn hình chỉ 5.4 inch.', 'Màn hình kích cỡ 5.4 inch là điểm thuận lợi bởi máy khá nhỏ gọn, có thể dễ dàng đặt trong túi áo, quần hơn so với 6.1 inch trên điện thoại iPhone 12 Pro hay 6.7 inch trên 12 Pro Max.\r\n\r\nMàn hình của iPhone 12 mini có độ phân giải 2340×1080, từng chi tiết, chuyển động trên màn hình đều hiện lên rõ nét, tươi sáng và không gặp phải tình trạng nhòe, giật hình.', 'Ngoài ra, iP 12 mini còn được trang bị tính năng sạc nhanh 20W, nhờ có điểm này, người dùng có thể nhanh chóng sạc đầy chiếc điện thoại của mình, để tiếp tục công việc mà không bị gián đoạn quá lâu.\r\n\r\nKhông chỉ thế, tính năng sạc nhanh này không chỉ được áp dụng với bộ sạc có dây mà đối với cả sạc không dây. Kể cả khi bạn dùng sạc không dây thì tính năng sạc nhanh 20W vẫn được áp dụng như thường.'),
('SP004', 'iPhone 12 64GB', 'ML004', 20, 20000000, '.\\img\\12\\64\\1.jpg', '.\\img\\12\\64\\2.jpg', '.\\img\\12\\64\\3.jpg', 'Apple đã quyết định giữ nguyên thiết kế notch “tai thỏ” quen thuộc cho màn hình iPhone 12, nhưng phần notch đã được tinh giản nhỏ gọn lại nhằm tạo thêm tỷ lệ hiển thị hình ảnh trên màn hình. Về kích thước, màn hình của máy rộng 6.1 inch, độ phân giải 2532x 1170pixels.', 'Đặc biệt, Apple đã thay thế công nghệ LCD bằng công nghệ Super Retina OLED. Cùng với tính năng Dolby Vision và True-tone, iPhone 12 sẽ hiển thị hình ảnh sắc nét, mượt mà & có màu rực rỡ hơn các đời iPhone trước.\r\n\r\nMàn hình Super Retina OLED rộng 6.1 inch, thân máy nguyên khối cứng cáp & bền bỉ', 'Toàn thân máy được chế tác từ chất liệu nguyên khối cứng cáp, với khung máy làm từ thép không gỉ và hai mặt trước & sau được phủ kính cường lực Gorilla Glass. iPhone 12 cũng có khả năng chống nước và chống bụi theo tiêu chuẩn IP68 và hỗ trợ cả Apple Pay, đáp ứng nhu cầu sử dụng cần thiết của người dùng.'),
('SP005', 'iPhone 12 128GB', 'ML005', 10, 22000000, '.\\img\\12\\128\\1.jpg', '.\\img\\12\\128\\2.jpg', '.\\img\\12\\128\\3.jpg', 'Apple đã quyết định giữ nguyên thiết kế notch “tai thỏ” quen thuộc cho màn hình iPhone 12, nhưng phần notch đã được tinh giản nhỏ gọn lại nhằm tạo thêm tỷ lệ hiển thị hình ảnh trên màn hình. Về kích thước, màn hình của máy rộng 6.1 inch, độ phân giải 2532x 1170pixels.', 'Điện thoại iPhone 12 cũng được nâng cấp về dung lượng pin so với người tiền nhiệm iPhone 11. Cụ thể, máy sẽ mang đến cho người dùng hơn 17 giờ xem video, hơn và lên đến 65 giờ nghe nhạc liên tục.\r\n\r\nMột chiếc iPhone cao cấp phục vụ mọi công việc sẽ không thể thiếu tính năng sạc nhanh. “Siêu phẩm” điện thoại iPhone cũng được trang bị tính năng sạc nhanh Power Delivery 2.0 sẽ đảm bảo thiết bị có ngay 50% thời lượng pin chỉ trong 30 phút. iPhone 12 cũng có thêm tính năng sạc không dây Qi, cho phép chiếc máy tiếp nạp năng lượng trên đế sạc không dây hữu ích & tiện lợi.', 'Bởi vì chip Apple A13 Bionic trước đó được đánh giá là mạnh nhất trong các thế hệ chip Apple, ta có thể mong chờ hiệu năng vượt trội đến từ Apple A14 Bionic trên iPhone. Đặc biệt, chip Apple A14 còn hỗ trợ cả mạng 5G trên điện thoại iPhone, giúp người dùng kết nối internet với tốc độ cao nhất.'),
('SP006', 'iPhone 12 256GB', 'ML006', 12, 24000000, '.\\img\\12\\256\\1.jpg', '.\\img\\12\\256\\2.jpg', '.\\img\\12\\256\\3.jpg', 'Apple đã quyết định giữ nguyên thiết kế notch “tai thỏ” quen thuộc cho màn hình iPhone 12, nhưng phần notch đã được tinh giản nhỏ gọn lại nhằm tạo thêm tỷ lệ hiển thị hình ảnh trên màn hình. Về kích thước, màn hình của máy rộng 6.1 inch, độ phân giải 2532x 1170pixels.', 'Đặc biệt, Apple đã thay thế công nghệ LCD bằng công nghệ Super Retina OLED. Cùng với tính năng Dolby Vision và True-tone, iPhone 12 sẽ hiển thị hình ảnh sắc nét, mượt mà & có màu rực rỡ hơn các đời iPhone trước.\r\n\r\nMàn hình Super Retina OLED rộng 6.1 inch, thân máy nguyên khối cứng cáp & bền bỉ\r\n\r\n \r\n\r\nToàn thân máy được chế tác từ chất liệu nguyên khối cứng cáp, với khung máy làm từ thép không gỉ và hai mặt trước & sau được phủ kính cường lực Gorilla Glass. iPhone 12 cũng có khả năng chống nước và chống bụi theo tiêu chuẩn IP68 và hỗ trợ cả Apple Pay, đáp ứng nhu cầu sử dụng cần thiết của người dùng.', 'iPhone 12 được trang bị cụm camera hai ống kính ở mặt sau, với hai ống kính có cùng độ phân giải 12MP. Cụm camera sau không chỉ có tính năng chống rung OIS, chụp góc siêu rộng và panorama, mà còn hỗ trợ quay video với định dạng lên đến 4K 60fps hoặc 1080p 240fps cùng âm thanh stereo sống động.'),
('SP007', 'iPhone 12 Pro Max 128GB', 'ML007', 12, 29000000, '.\\img\\12pm\\128\\1.jpg', '.\\img\\12pm\\128\\2.jpg', '.\\img\\12pm\\128\\3.jpg', 'Năm nay, công nghệ màn hình trên 12 Pro Max cũng được đổi mới và trang bị tốt hơn cùng kích thước lên đến 6.7 inch, lớn hơn nhiều so với điện thoại iPhone 12 Mini. Với công nghệ màn hình OLED cho khả năng hiển thị hình ảnh lên đến 2778 x 1284 pixels. Bên cạnh đó, màn hình này còn cho độ sáng tối đa cao nhất lên đến 800 nits, luôn đảm bảo cho bạn một độ sáng cao và dễ nhìn nhất ngoài nắng', 'Một điểm đổi mới nữa trên màn hình của chiếc điện thoại iPhone 12 năm nay là việc chúng được thiết kế với khung viền vuông vức, viền thép không gỉ mang đến vẻ đẹp sang trọng cho điện thoại. Máy cũng được trang bị nhiều phiên bản màu sắc đặc biệt cho người dùng lựa chọn.', 'Về trang bị phần cứng bên trong thì iPhone 12 Pro Max có một thanh RAM lên đến 6GB. Điều này cho thấy rằng Apple ngày đang lắng nghe người dùng nhiều hơn khi trang bị một dung lượng RAM lớn hơn để việc đa nhiệm ngày càng được cải thiện hơn. Việc thanh ram lớn giúp cho bạn trải nghiệm các tựa game và đa nhiệm mượt mà hơn'),
('SP008', 'iPhone 12 Pro Max 256GB', 'ML008', 12, 32000000, '.\\img\\12pm\\256\\1.jpg', '.\\img\\12pm\\256\\2.jpg', '.\\img\\12pm\\256\\3.jpg', 'Năm nay, công nghệ màn hình trên 12 Pro Max cũng được đổi mới và trang bị tốt hơn cùng kích thước lên đến 6.7 inch, lớn hơn nhiều so với điện thoại iPhone 12 Mini. Với công nghệ màn hình OLED cho khả năng hiển thị hình ảnh lên đến 2778 x 1284 pixels. Bên cạnh đó, màn hình này còn cho độ sáng tối đa cao nhất lên đến 800 nits, luôn đảm bảo cho bạn một độ sáng cao và dễ nhìn nhất ngoài nắng', 'Một điểm đổi mới nữa trên màn hình của chiếc điện thoại iPhone 12 năm nay là việc chúng được thiết kế với khung viền vuông vức, viền thép không gỉ mang đến vẻ đẹp sang trọng cho điện thoại. Máy cũng được trang bị nhiều phiên bản màu sắc đặc biệt cho người dùng lựa chọn.', 'Về trang bị phần cứng bên trong thì iPhone 12 Pro Max có một thanh RAM lên đến 6GB. Điều này cho thấy rằng Apple ngày đang lắng nghe người dùng nhiều hơn khi trang bị một dung lượng RAM lớn hơn để việc đa nhiệm ngày càng được cải thiện hơn. Việc thanh ram lớn giúp cho bạn trải nghiệm các tựa game và đa nhiệm mượt mà hơn'),
('SP009', 'iPhone 12 Pro Max 512GB', 'ML009', 23, 39000000, '.\\img\\12pm\\512\\1.jpg', '.\\img\\12pm\\512\\2.jpg', '.\\img\\12pm\\512\\3.jpg', 'Năm nay, công nghệ màn hình trên 12 Pro Max cũng được đổi mới và trang bị tốt hơn cùng kích thước lên đến 6.7 inch, lớn hơn nhiều so với điện thoại iPhone 12 Mini. Với công nghệ màn hình OLED cho khả năng hiển thị hình ảnh lên đến 2778 x 1284 pixels. Bên cạnh đó, màn hình này còn cho độ sáng tối đa cao nhất lên đến 800 nits, luôn đảm bảo cho bạn một độ sáng cao và dễ nhìn nhất ngoài nắng', 'Một điểm đổi mới nữa trên màn hình của chiếc điện thoại iPhone 12 năm nay là việc chúng được thiết kế với khung viền vuông vức, viền thép không gỉ mang đến vẻ đẹp sang trọng cho điện thoại. Máy cũng được trang bị nhiều phiên bản màu sắc đặc biệt cho người dùng lựa chọn.', 'Về trang bị phần cứng bên trong thì iPhone 12 Pro Max có một thanh RAM lên đến 6GB. Điều này cho thấy rằng Apple ngày đang lắng nghe người dùng nhiều hơn khi trang bị một dung lượng RAM lớn hơn để việc đa nhiệm ngày càng được cải thiện hơn. Việc thanh ram lớn giúp cho bạn trải nghiệm các tựa game và đa nhiệm mượt mà hơn'),
('SP010', 'iPhone 11 64GB', 'ML010', 75, 16000000, '.\\img\\11\\64\\1.jpg', '.\\img\\11\\64\\2.jpg', '.\\img\\11\\64\\3.jpg', 'Apple vừa tung ra iPhone 11 nâng cấp cho iPhone XR năm ngoái, nâng cấp lên 2 camera sau trong cụm hình vuông và có 6 màu mới trong đó có xanh lục và tím. Điểm khác biệt đáng chú ý là logo Apple được đặt ở chính giữa mặt sau của máy.\r\n\r\niPhone 11 vẫn trang bị màn hình LCD 6.1 inch mà Apple gọi là Liquid Retina và phần khung viền nhôm. Đúng như dự đoán, mặt sau logo Apple đã được đưa v ề chính giữa và không còn sự xuất hiện của chữ “iPhone”. Độ phân giải giải tương tự như trên iPhone XR 1792×828 pixel. Mật độ điểm ảnh của máy là 326 PPI', 'iPhone 11 được trang bị 2 Camera sau, cả 2 đều có độ phân giải 12MP, camera thứ 2 gọi là Ultra Wide với góc siêu rộng cho chúng ta có trải nghiệm tốt hơn trong việc chụp phong cảnh. Chế độ Ultra Wide có thêm tuỳ chọn trong phần giao diện camera. Khi chụp một bức ảnh bao gồm 7 tấm khác nhau để cho ra một tấm tốt nhất và tất nhiên có hỗ trợ Machine Learning. Camera trước cũng được cải tiến 12MP có hỗ trợ quay phim 4K và Slow Motion (120 fps) để cho ra những video ấn tượng. Điều này sẽ thích hợp với những bạn nữ hay chụp selfie hoặc vlogger, chúng ta không còn lo lắng việc camera trước có chất lượng kém nữa.', 'iPhone 11 có khả năng chống nước ở độ sâu 2m với thời gian khoảng 30 phút.  Nhiều người dùng YouTube đã đưa tính năng này vào thử nghiệm và cho đến nay nó vẫn hoạt động hoàn hảo như lời quảng cáo của Apple. Với sự tiến bộ nhanh chóng của công nghệ, một số blogger công nghệ dự đoán rằng Apple có thể triển khai một loại đầu đọc dấu vân tay mới (có thể tích hợp vào màn hình iPhone như trên một số điện thoại Android hiện nay). Tuy nhiên, Kuo – nhà phân tích tại TF International Securities lại không nghĩ rằng khả năng này sẽ xảy ra.'),
('SP011', 'iPhone 11 128GB', 'ML011', 64, 10000000, '.\\img\\11\\128\\1.jpg', '.\\img\\11\\128\\2.jpg', '.\\img\\11\\128\\3.jpg', 'Apple vừa tung ra iPhone 11 nâng cấp cho iPhone XR năm ngoái, nâng cấp lên 2 camera sau trong cụm hình vuông và có 6 màu mới trong đó có xanh lục và tím. Điểm khác biệt đáng chú ý là logo Apple được đặt ở chính giữa mặt sau của máy.\r\n\r\niPhone 11 vẫn trang bị màn hình LCD 6.1 inch mà Apple gọi là Liquid Retina và phần khung viền nhôm. Đúng như dự đoán, mặt sau logo Apple đã được đưa v ề chính giữa và không còn sự xuất hiện của chữ “iPhone”. Độ phân giải giải tương tự như trên iPhone XR 1792×828 pixel. Mật độ điểm ảnh của máy là 326 PPI', 'iPhone 11 được trang bị 2 Camera sau, cả 2 đều có độ phân giải 12MP, camera thứ 2 gọi là Ultra Wide với góc siêu rộng cho chúng ta có trải nghiệm tốt hơn trong việc chụp phong cảnh. Chế độ Ultra Wide có thêm tuỳ chọn trong phần giao diện camera. Khi chụp một bức ảnh bao gồm 7 tấm khác nhau để cho ra một tấm tốt nhất và tất nhiên có hỗ trợ Machine Learning. Camera trước cũng được cải tiến 12MP có hỗ trợ quay phim 4K và Slow Motion (120 fps) để cho ra những video ấn tượng. Điều này sẽ thích hợp với những bạn nữ hay chụp selfie hoặc vlogger, chúng ta không còn lo lắng việc camera trước có chất lượng kém nữa.', 'iPhone 11 có khả năng chống nước ở độ sâu 2m với thời gian khoảng 30 phút.  Nhiều người dùng YouTube đã đưa tính năng này vào thử nghiệm và cho đến nay nó vẫn hoạt động hoàn hảo như lời quảng cáo của Apple. Với sự tiến bộ nhanh chóng của công nghệ, một số blogger công nghệ dự đoán rằng Apple có thể triển khai một loại đầu đọc dấu vân tay mới (có thể tích hợp vào màn hình iPhone như trên một số điện thoại Android hiện nay). Tuy nhiên, Kuo – nhà phân tích tại TF International Securities lại không nghĩ rằng khả năng này sẽ xảy ra.'),
('SP012', 'iPhone 11 256GB', 'ML012', 90, 20000000, '.\\img\\11\\256\\1.jpg', '.\\img\\11\\256\\2.jpg', '.\\img\\11\\256\\3.jpg', 'Apple vừa tung ra iPhone 11 nâng cấp cho iPhone XR năm ngoái, nâng cấp lên 2 camera sau trong cụm hình vuông và có 6 màu mới trong đó có xanh lục và tím. Điểm khác biệt đáng chú ý là logo Apple được đặt ở chính giữa mặt sau của máy.\r\n\r\niPhone 11 vẫn trang bị màn hình LCD 6.1 inch mà Apple gọi là Liquid Retina và phần khung viền nhôm. Đúng như dự đoán, mặt sau logo Apple đã được đưa v ề chính giữa và không còn sự xuất hiện của chữ “iPhone”. Độ phân giải giải tương tự như trên iPhone XR 1792×828 pixel. Mật độ điểm ảnh của máy là 326 PPI', 'iPhone 11 được trang bị 2 Camera sau, cả 2 đều có độ phân giải 12MP, camera thứ 2 gọi là Ultra Wide với góc siêu rộng cho chúng ta có trải nghiệm tốt hơn trong việc chụp phong cảnh. Chế độ Ultra Wide có thêm tuỳ chọn trong phần giao diện camera. Khi chụp một bức ảnh bao gồm 7 tấm khác nhau để cho ra một tấm tốt nhất và tất nhiên có hỗ trợ Machine Learning. Camera trước cũng được cải tiến 12MP có hỗ trợ quay phim 4K và Slow Motion (120 fps) để cho ra những video ấn tượng. Điều này sẽ thích hợp với những bạn nữ hay chụp selfie hoặc vlogger, chúng ta không còn lo lắng việc camera trước có chất lượng kém nữa.', 'iPhone 11 có khả năng chống nước ở độ sâu 2m với thời gian khoảng 30 phút.  Nhiều người dùng YouTube đã đưa tính năng này vào thử nghiệm và cho đến nay nó vẫn hoạt động hoàn hảo như lời quảng cáo của Apple. Với sự tiến bộ nhanh chóng của công nghệ, một số blogger công nghệ dự đoán rằng Apple có thể triển khai một loại đầu đọc dấu vân tay mới (có thể tích hợp vào màn hình iPhone như trên một số điện thoại Android hiện nay). Tuy nhiên, Kuo – nhà phân tích tại TF International Securities lại không nghĩ rằng khả năng này sẽ xảy ra.'),
('SP013', 'iPhone 11 Pro 64GB', 'ML013', 75, 19000000, '.\\img\\11p\\64\\1.jpg', '.\\img\\11p\\64\\2.jpg', '.\\img\\11p\\64\\3.jpg', 'Điểm đầu tiên iPhone 11 Pro tạo ấn tượng với mình là cụm 3 camera được nằm trong khung vuông, khác biệt hoàn toàn so với thiết kế camera trên iPhone X. Tuy nhiên, cụm camera của iPhone 11 Pro sẽ mỏng hơn so với iPhone X. Nếu bạn không thích thiết kế cụm camera khung vuông thì chắc chắn bạn sẽ không thể ưng ý sản phẩm nào trong bộ ba siêu phẩm iPhone 11, iPhone 11 Pro và iPhone 11 Pro Max của Apple.\r\niPhone 11 Pro được Apple trang bị khung thép không gỉ, cùng mặt lưng là kính cường lực giúp tăng độ bền cho máy. Một điểm hạn chế nhỏ của mặt lưng kính cường lực là khả năng bám vân tay. Tuy nhiên, cũng chính nhờ mặt lưng là kính cường lực bạn sẽ dễ dàng trong việc vệ sinh máy, hạn chế các bám bụi bẩn khi bạn sử dụng trong thời gian dài.', 'Màn hình của iPhone 11 Pro cũ có kích thước 5,8inh, với độ phân giải là 2.436 x 1.125 pixels và vẫn giữ nguyên thiết kế màn hình “tai thỏ”. Đặc biệt, iPhone 11 Pro được Apple trang bị tấm nền OLED, cao cấp hơn hẳn tấm nên LCD ở iPhone 11. Màn hình OLED cho hiển thị sắc nét, có chiều sâu, giúp bạn có những giây phút trải nghiệm tuyệt vời cho người dùng IOS.\r\nNếu trước đây bạn chưa từng dùng bất kì một chiếc iPhone nào có màn hình \"tai thỏ\" thì mới đầu có thể bạn sẽ cảm thấy hơi khó chịu với thiết kế màn hình này. Tuy nhiên, sau khoảng 2 ngày sử dụng bạn sẽ quen với thiết kế này ngay thôi.', 'Tại thời điểm ra mắt, iPhone 11 Pro tự hào cùng iPhone 11 và iPhone 11 Pro Max khi chạy hệ điều hành IOS 13. Nếu bạn đang băn khoăn “Liệu iPhone 11 Pro cũ có lên được IOS 14” thì bạn hoàn toàn yên tâm nhé. Với con chip Apple A13 - mạnh nhất hiện nay thì IOS 14 không thể làm khó iPhone 11 Pro cho dù bạn có mua iPhone 11 Pro cũ đi chăng nữa.\r\nNhắc đến hiệu năng thì không phải tự nhiên người ta lại ví iPhone 11 Pro mạnh ngang máy tính. Bởi Apple trang bị con chip A13 mạnh mẽ, được các chuyên gia đánh giá vượt mặt cả Kirin 980 hay Snapdragon 855 của Qualcomm.\r\nSau 1 thời gian sử dụng, mình thấy các tác vụ game mobile nặng và HOT nhất hiện nay thì iPhone 11 Pro cũ đều cho những trải nghiệm mượt mà, hầu như không có độ trễ khi thao tác. '),
('SP014', 'iPhone 11 Pro 256GB', 'ML014', 90, 21000000, '.\\img\\11p\\256\\1.jpg', '.\\img\\11p\\256\\2.jpg', '.\\img\\11p\\256\\3.jpg', 'Điểm đầu tiên iPhone 11 Pro tạo ấn tượng với mình là cụm 3 camera được nằm trong khung vuông, khác biệt hoàn toàn so với thiết kế camera trên iPhone X. Tuy nhiên, cụm camera của iPhone 11 Pro sẽ mỏng hơn so với iPhone X. Nếu bạn không thích thiết kế cụm camera khung vuông thì chắc chắn bạn sẽ không thể ưng ý sản phẩm nào trong bộ ba siêu phẩm iPhone 11, iPhone 11 Pro và iPhone 11 Pro Max của Apple.\r\niPhone 11 Pro được Apple trang bị khung thép không gỉ, cùng mặt lưng là kính cường lực giúp tăng độ bền cho máy. Một điểm hạn chế nhỏ của mặt lưng kính cường lực là khả năng bám vân tay. Tuy nhiên, cũng chính nhờ mặt lưng là kính cường lực bạn sẽ dễ dàng trong việc vệ sinh máy, hạn chế các bám bụi bẩn khi bạn sử dụng trong thời gian dài.', '', 'Tại thời điểm ra mắt, iPhone 11 Pro tự hào cùng iPhone 11 và iPhone 11 Pro Max khi chạy hệ điều hành IOS 13. Nếu bạn đang băn khoăn “Liệu iPhone 11 Pro cũ có lên được IOS 14” thì bạn hoàn toàn yên tâm nhé. Với con chip Apple A13 - mạnh nhất hiện nay thì IOS 14 không thể làm khó iPhone 11 Pro cho dù bạn có mua iPhone 11 Pro cũ đi chăng nữa.\r\nNhắc đến hiệu năng thì không phải tự nhiên người ta lại ví iPhone 11 Pro mạnh ngang máy tính. Bởi Apple trang bị con chip A13 mạnh mẽ, được các chuyên gia đánh giá vượt mặt cả Kirin 980 hay Snapdragon 855 của Qualcomm.\r\nSau 1 thời gian sử dụng, mình thấy các tác vụ game mobile nặng và HOT nhất hiện nay thì iPhone 11 Pro cũ đều cho những trải nghiệm mượt mà, hầu như không có độ trễ khi thao tác. '),
('SP015', 'iPhone 11 Pro Max 64GB', 'ML015', 37, 21000000, '.\\img\\11pm\\64\\1.jpg', '.\\img\\11pm\\64\\2.jpg', '.\\img\\11pm\\64\\3.jpg', 'Phần mặt trước của iPhone 11 Pro Max, Apple đã không thay đổi mà sử dụng lại thiết kế tương đồng với phiên bản tiền nhiệm là iPhone Xs Max. Thiết bị này vẫn có Notch tai thỏ chứa camera và cảm biến với phần cạnh viền màn hình khá dày và diện tích màn hình hiển thị cũng chiếm 85%. \r\nTuy nhiên, phần khác biệt lớn nhất làm nên phiên bản cao cấp này hoàn toàn nằm ở mặt sau: mặt lưng được hoàn thiện từ kính cường lực mờ có thể hạn chế được tối đa tình trạng để lại dấu vân tay và phần cụm camera vuông. Đặc biệt hơn, phần viền ống kính đã được gia công một cách tỉ mỉ để tạo nên những nét cắt vô cùng sắc bén. ', 'Màn hình của iPhone 11 Pro Max chính là một trong những điểm đáng tiền nhất. Với kích thước 6.5 inch cùng tấm nền OLED được tinh chỉnh chi tiết bởi Apple, có thể hỗ trợ được công nghệ True Tone giúp điều chỉnh cân bằng trắng sao cho phù hợp nhất với điều kiện ánh sáng xung quanh. \r\nĐây là màn hình được Apple công bố với tỉ lệ tương phản 2.000.000 : 1 có hỗ trợ DCI - P3 và True Tone. Super Retina XDR được trang bị trên iPhone 11 Pro Max sẽ giúp máy hiển thị được gam màu rộng, độ sáng cao, tiết kiệm điện năng lên đến 15% so với thế hệ tiền nhiệm. Không chỉ vậy, ở iPhone 11 Pro Max này cũng được Apple tích hợp phủ thêm lớp Oleophobic hạn chế bám mồ hôi, vân tay cho mặt trước. ', 'Apple đã điều chỉnh hình họa với nền tảng mới, những biểu tượng âm lượng và thông báo tắt cuộc gọi cũng được làm tròn hơn. Face ID cũng được cải thiện đáng kể. Công nghệ Haptic Engine mới sẽ được dựa trên thời gian ẩn và giữ icon để hiện lên những menu chức năng khác nhau thay vì dùng lực ấn như 3D Touch. \r\nNhìn chung, sức mạnh của iPhone 11 Pro Max khá ổn, trong đó chất lượng âm thanh là tuyệt vời nhất ngay cả khi bạn sử dụng những ứng dụng phát nhạc trực tuyến. '),
('SP016', 'iPhone 11 Pro Max 256GB', 'ML016', 56, 23000000, '.\\img\\11pm\\256\\1.jpg', '.\\img\\11pm\\256\\2.jpg', '.\\img\\11pm\\256\\3.jpg', 'Phần mặt trước của iPhone 11 Pro Max, Apple đã không thay đổi mà sử dụng lại thiết kế tương đồng với phiên bản tiền nhiệm là iPhone Xs Max. Thiết bị này vẫn có Notch tai thỏ chứa camera và cảm biến với phần cạnh viền màn hình khá dày và diện tích màn hình hiển thị cũng chiếm 85%. \r\nTuy nhiên, phần khác biệt lớn nhất làm nên phiên bản cao cấp này hoàn toàn nằm ở mặt sau: mặt lưng được hoàn thiện từ kính cường lực mờ có thể hạn chế được tối đa tình trạng để lại dấu vân tay và phần cụm camera vuông. Đặc biệt hơn, phần viền ống kính đã được gia công một cách tỉ mỉ để tạo nên những nét cắt vô cùng sắc bén. ', 'Màn hình của iPhone 11 Pro Max chính là một trong những điểm đáng tiền nhất. Với kích thước 6.5 inch cùng tấm nền OLED được tinh chỉnh chi tiết bởi Apple, có thể hỗ trợ được công nghệ True Tone giúp điều chỉnh cân bằng trắng sao cho phù hợp nhất với điều kiện ánh sáng xung quanh. \r\nĐây là màn hình được Apple công bố với tỉ lệ tương phản 2.000.000 : 1 có hỗ trợ DCI - P3 và True Tone. Super Retina XDR được trang bị trên iPhone 11 Pro Max sẽ giúp máy hiển thị được gam màu rộng, độ sáng cao, tiết kiệm điện năng lên đến 15% so với thế hệ tiền nhiệm. Không chỉ vậy, ở iPhone 11 Pro Max này cũng được Apple tích hợp phủ thêm lớp Oleophobic hạn chế bám mồ hôi, vân tay cho mặt trước. ', 'Apple đã điều chỉnh hình họa với nền tảng mới, những biểu tượng âm lượng và thông báo tắt cuộc gọi cũng được làm tròn hơn. Face ID cũng được cải thiện đáng kể. Công nghệ Haptic Engine mới sẽ được dựa trên thời gian ẩn và giữ icon để hiện lên những menu chức năng khác nhau thay vì dùng lực ấn như 3D Touch. \r\nNhìn chung, sức mạnh của iPhone 11 Pro Max khá ổn, trong đó chất lượng âm thanh là tuyệt vời nhất ngay cả khi bạn sử dụng những ứng dụng phát nhạc trực tuyến. '),
('SP017', 'iPhone X 64GB', 'ML017', 75, 10000000, '.\\img\\x\\64\\1.jpg', '.\\img\\x\\64\\2.jpg', '.\\img\\x\\64\\3.jpg', 'Kể từ iPhone 6 cho đến iPhone 8, 4 năm liền, Apple luôn giữ nguyên thiết kế nút Home ở cạnh dưới, cạnh phía trên dày chứ camera và loa thoại. Chỉ duy nhất đến iPhone 8, thay vì sử dụng mặt lưng kim loại thì Apple đã sử dụng kính cường lực.\r\nTuy nhiên, đến iPhone X Apple đã tạo ra một “cuộc cách mạng” cho các thiết bị của mình về mặt thiết kế. Máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ, màn hình của iPhone X gần như tràn viền giúp diện tích hiển thị mặt trước cực lớn. Điều này đã giúp những khách hàng ưa thích màn hình lớn có thể tự tin lựa chọn iPhone X mà không cần phải phân vân với các dòng smartphone khác. ', 'Một điểm nhỏ mà mình không ưng ở thiết kế màn hình của em này chính là thiết kế camera “ăn” vào màn hình (hay còn gọi là thiết kế màn hình “tai thỏ”). Mới đầu khi cầm vào điện thoại phần màn hình “tai thỏ” khiến mình cảm thấy hơi khó chịu vì tự nhiên cả một phần màn hình rộng lại có một vệt đen khiến mình có cảm giác như bị thiếu cái gì đó mỗi khi xem phim hay chơi game.\r\nGiống như iPhone 8, ở iPhone X Apple giữ nguyên thiết kế mặt lưng kính cường lực, cùng với đó là hỗ trợ sạc không dây. Với phần mặt lưng kính mặc dù đã được phủ lớp chống bám vân tay nhưng với mặt lưng kính thì đó là điều không thể. Tuy nhiên, bạn hoàn toàn có thể dễ dàng lau chùi, vệ sinh mặt lưng máy chỉ với vài thao tác dễ dàng. ', 'Trong quá trình trải nghiệm thì mình thấy mặt lưng kính của em này cũng giống với nhược điểm của mặt lưng kính trên iPhone 8 là rất dễ bị xước dăm. Do đó, để giữ cho chiếc điện thoại của mình luôn được mới thì bạn hãy sắm cho em nó một chiếc ốp lưng hoặc dán skin bạn nhé.\r\nCụm camera kép được đặt dọc ở mặt sau khác hoàn toàn so với các sản phẩm trước đó của Apple.\r\nThiết kế của chiếc iPhone X hoàn toàn thu hút mình ngay từ khi cầm vào máy lần đầu tiên. Chiếc iPhone X xứng đáng được coi là bước ngoặt của Apple.'),
('SP018', 'iPhone X 256GB', 'ML018', 90, 11000000, '.\\img\\x\\256\\1.jpg', '.\\img\\x\\256\\2.jpg', '.\\img\\x\\256\\3.jpg', 'Kể từ iPhone 6 cho đến iPhone 8, 4 năm liền, Apple luôn giữ nguyên thiết kế nút Home ở cạnh dưới, cạnh phía trên dày chứ camera và loa thoại. Chỉ duy nhất đến iPhone 8, thay vì sử dụng mặt lưng kim loại thì Apple đã sử dụng kính cường lực.\r\nTuy nhiên, đến iPhone X Apple đã tạo ra một “cuộc cách mạng” cho các thiết bị của mình về mặt thiết kế. Máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ, màn hình của iPhone X gần như tràn viền giúp diện tích hiển thị mặt trước cực lớn. Điều này đã giúp những khách hàng ưa thích màn hình lớn có thể tự tin lựa chọn iPhone X mà không cần phải phân vân với các dòng smartphone khác. ', 'Một điểm nhỏ mà mình không ưng ở thiết kế màn hình của em này chính là thiết kế camera “ăn” vào màn hình (hay còn gọi là thiết kế màn hình “tai thỏ”). Mới đầu khi cầm vào điện thoại phần màn hình “tai thỏ” khiến mình cảm thấy hơi khó chịu vì tự nhiên cả một phần màn hình rộng lại có một vệt đen khiến mình có cảm giác như bị thiếu cái gì đó mỗi khi xem phim hay chơi game.\r\nGiống như iPhone 8, ở iPhone X Apple giữ nguyên thiết kế mặt lưng kính cường lực, cùng với đó là hỗ trợ sạc không dây. Với phần mặt lưng kính mặc dù đã được phủ lớp chống bám vân tay nhưng với mặt lưng kính thì đó là điều không thể. Tuy nhiên, bạn hoàn toàn có thể dễ dàng lau chùi, vệ sinh mặt lưng máy chỉ với vài thao tác dễ dàng. ', 'Trong quá trình trải nghiệm thì mình thấy mặt lưng kính của em này cũng giống với nhược điểm của mặt lưng kính trên iPhone 8 là rất dễ bị xước dăm. Do đó, để giữ cho chiếc điện thoại của mình luôn được mới thì bạn hãy sắm cho em nó một chiếc ốp lưng hoặc dán skin bạn nhé.\r\nCụm camera kép được đặt dọc ở mặt sau khác hoàn toàn so với các sản phẩm trước đó của Apple.\r\nThiết kế của chiếc iPhone X hoàn toàn thu hút mình ngay từ khi cầm vào máy lần đầu tiên. Chiếc iPhone X xứng đáng được coi là bước ngoặt của Apple.'),
('SP019', 'iPhone XS 64GB', 'ML019', 75, 12000000, '.\\img\\xs\\64\\1.jpg', '.\\img\\xs\\64\\2.jpg', '.\\img\\xs\\64\\3.jpg', 'Cũng vẫn là thiết kế khung viền kim loại cùng với 2 mặt kính, iPhone XS mang đến cho người dùng cảm giác cầm nắm rất dễ chịu. Phần mặt kính trước sau đều được bo cong 2.5D ôm sát vào khung viền. Thiết kế nhỏ gọn này của XS rất thuận tiện để bạn có thể bỏ chúng trong túi quần và dễ dàng khi lấy ra. Đây cũng là một trong những yếu tố cao cấp mà mọi sản phẩm của Apple đều muốn hướng đến. \r\nNếu trước đây, thế hệ iPhone XR hay iPhone 8 plus được thiết kế cạnh viền bằng nhôm thì đến với iPhone XS phần cạnh viền đã được thiết kế bằng thép không gỉ. Nó mang đến khả năng chịu lực tốt hơn so với viền nhôm, từ đó cũng có khả năng bảo vệ điện thoại của bạn được tốt hơn. ', 'So với “đàn anh” iPhone X thì iPhone XS được chăm chút hơn về khả năng hiển thị khá nhiều. Ở iPhone XS được trang bị hàng loạt những công nghệ cao cấp như màn hình OLED tai thỏ 5.8 inch với độ phân giải 2K. Chúng mang đến cho người dùng những trải nghiệm tuyệt vời khi xem phim hay lướt web với dải màu rộng và độ chi tiết cực cao. Hơn nữa, màn hình của XS còn hỗ trợ công nghệ HDR10 cùng tần số quét 120Hz giúp hình ảnh trở nên sống động và chuyển động được mượt mà hơn. Bạn có thể dùng ở trong nhà hay ngoài trời đều phù hợp cả. \r\nNgoài ra, có một điểm cộng dành cho iPhone XS đó là vẫn giữ được tính năng 3D Touch mang đến sự thuận tiện cho người dùng. ', 'iPhone XS được trang bị chip xử lí Apple A12 Bionic mới với khả năng xử lí vượt trội hơn hẳn. Bạn có thể lướt web, facebook hay chơi game nhẹ máy đều chạy vô cùng mượt mà. Tuy nhiên, đối với một số game như Liên Quân Mobile hay PUBG thì có lẽ XS cũ không phải là lựa chọn tốt nhất. Vì kích thước màn không được lớn nên quá trình thao tác sẽ không được thuận tiện gây ra cảm giác khó chịu. \r\nVới bộ nhớ RAM 4GB và 64GB / 256GB cho bộ nhớ trong, người dùng sẽ có nhiều không gian lưu trữ dữ liệu hơn, và đặc biệt với một chiếc máy có cấu hình mạnh như iPhone XS. Khi có một bộ nhớ lớn, bạn có thể tải và sử dụng được cùng lúc nhiều ứng dụng mà không gặp bất cứ hạn chế gì. '),
('SP020', 'iPhone XS 256GB', 'ML020', 90, 14000000, '.\\img\\xs\\256\\1.jpg', '.\\img\\xs\\256\\2.jpg', '.\\img\\xs\\256\\3.jpg', 'Cũng vẫn là thiết kế khung viền kim loại cùng với 2 mặt kính, iPhone XS mang đến cho người dùng cảm giác cầm nắm rất dễ chịu. Phần mặt kính trước sau đều được bo cong 2.5D ôm sát vào khung viền. Thiết kế nhỏ gọn này của XS rất thuận tiện để bạn có thể bỏ chúng trong túi quần và dễ dàng khi lấy ra. Đây cũng là một trong những yếu tố cao cấp mà mọi sản phẩm của Apple đều muốn hướng đến. \r\nNếu trước đây, thế hệ iPhone XR hay iPhone 8 plus được thiết kế cạnh viền bằng nhôm thì đến với iPhone XS phần cạnh viền đã được thiết kế bằng thép không gỉ. Nó mang đến khả năng chịu lực tốt hơn so với viền nhôm, từ đó cũng có khả năng bảo vệ điện thoại của bạn được tốt hơn. ', 'So với “đàn anh” iPhone X thì iPhone XS được chăm chút hơn về khả năng hiển thị khá nhiều. Ở iPhone XS được trang bị hàng loạt những công nghệ cao cấp như màn hình OLED tai thỏ 5.8 inch với độ phân giải 2K. Chúng mang đến cho người dùng những trải nghiệm tuyệt vời khi xem phim hay lướt web với dải màu rộng và độ chi tiết cực cao. Hơn nữa, màn hình của XS còn hỗ trợ công nghệ HDR10 cùng tần số quét 120Hz giúp hình ảnh trở nên sống động và chuyển động được mượt mà hơn. Bạn có thể dùng ở trong nhà hay ngoài trời đều phù hợp cả. \r\nNgoài ra, có một điểm cộng dành cho iPhone XS đó là vẫn giữ được tính năng 3D Touch mang đến sự thuận tiện cho người dùng. ', 'iPhone XS được trang bị chip xử lí Apple A12 Bionic mới với khả năng xử lí vượt trội hơn hẳn. Bạn có thể lướt web, facebook hay chơi game nhẹ máy đều chạy vô cùng mượt mà. Tuy nhiên, đối với một số game như Liên Quân Mobile hay PUBG thì có lẽ XS cũ không phải là lựa chọn tốt nhất. Vì kích thước màn không được lớn nên quá trình thao tác sẽ không được thuận tiện gây ra cảm giác khó chịu. \r\nVới bộ nhớ RAM 4GB và 64GB / 256GB cho bộ nhớ trong, người dùng sẽ có nhiều không gian lưu trữ dữ liệu hơn, và đặc biệt với một chiếc máy có cấu hình mạnh như iPhone XS. Khi có một bộ nhớ lớn, bạn có thể tải và sử dụng được cùng lúc nhiều ứng dụng mà không gặp bất cứ hạn chế gì. '),
('SP021', 'iPhone XS Max 64GB', 'ML021', 75, 15000000, '.\\img\\xsm\\64\\1.jpg', '.\\img\\xsm\\64\\2.jpg', '.\\img\\xsm\\64\\3.jpg', 'Được ra mắt vào tháng 9/2019, đã 1 năm trôi qua nhưng về cơ bản, chiếc iPhone Xs Max với các chức năng và linh kiện điện thoại đều không có quá nhiều sự thay đổi so với iPhone Xs. Thiết kế màn hình tai thỏ vẫn được giữ nguyên, tính năng mở khóa bằng Face ID hoặc hệ thống điều khiển cử chỉ… Thực sự đây cũng không phải là điều quá khó hiểu khi mà những tính năng này vẫn đang rất được ưa chuộng và được cả các dòng điện thoại Android ứng dụng. \r\nTheo đánh giá chi tiết về chiếc điện thoại iPhone Xs Max thì trong phiên bản lần này, phần cứng của máy đã được nâng cấp lên mạnh mẽ hơn rất nhiều . Ngay cả phần cảm biến camera cũng đã xử lí được nhanh hơn giúp bạn có được những bức ảnh chân dung đẹp chỉ trong nháy mắt. Và nếu cùng cầm trên tay 3 chiếc điện thoại iPhoneX,  Xs và Xs Max bạn sẽ nhận thấy được sự khác nhau về kích thước màn hình nữa. Đặc biệt, dòng iPhone Xs Max này còn sử dụng được 2 SIM vật lí, có khả năng chống nước…', 'Đúng là rất đáng tự hào bởi Apple chưa bao giờ khiến người dùng phải thất vọng về cấu hình cũng như hiệu năng và khả năng tiết kiệm năng lượng. Cấu hình iPhone Xs Max được trang bị con chip A12 Bionic với CPU 6 nhân bao gồm 2 nhân hiệu năng cao và 4 nhân tiết kiệm điện. 2 nhân hiệu năng cao của A12 Bionic sẽ nhanh hơn đến 15% so với A11 Bionic trong khi chúng tiêu tốn ít hơn đến 40% năng lượng tiêu thụ và 4 nhân nhân tiết kiệm điện đến hơn 50%. \r\nVới mức tiêu thụ như thế này, bạn hoàn toàn có thể trải nghiệm mọi tác vụ một cách vô cùng trơn tru và nhanh chóng. Có thể chơi được các tựa game nặng một cách mượt mà mà không bị giật lag hay không có độ trễ. iPhone Xs Max quả thực vô cùng xứng đáng với danh hiệu chiếc smartphone siêu cao cấp. ', 'iPhone Xs Max được thiết kế bộ camera kép  với mặt lưng 12MP được xếp dọc, đặt lệch về phía góc trái rất gọn gàng và đẹp mắt. Việc Apple bổ sung thêm ống kính tele cho máy giúp bạn có thể dễ dàng chụp lại những bức ảnh sắc nét từ một khoảng cách với tầm nhìn xa hơn. Kết hợp cùng với cảm biến chính để cho hiệu quả xóa phông ấn tượng. Mặt trước của camera được thiết kế camera đơn với độ phân giải 7MP, f/2.2 cho bạn có thể selfie những bức ảnh đẹp mắt và chân thật nhất. '),
('SP022', 'iPhone XS Max chính hãng VN/A 512GB', 'ML022', 189, 17000000, '.\\img\\xsm\\512\\1.jpg', '.\\img\\xsm\\512\\2.jpg', '.\\img\\xsm\\512\\3.jpg', 'Được ra mắt vào tháng 9/2019, đã 1 năm trôi qua nhưng về cơ bản, chiếc iPhone Xs Max với các chức năng và linh kiện điện thoại đều không có quá nhiều sự thay đổi so với iPhone Xs. Thiết kế màn hình tai thỏ vẫn được giữ nguyên, tính năng mở khóa bằng Face ID hoặc hệ thống điều khiển cử chỉ… Thực sự đây cũng không phải là điều quá khó hiểu khi mà những tính năng này vẫn đang rất được ưa chuộng và được cả các dòng điện thoại Android ứng dụng. \r\nTheo đánh giá chi tiết về chiếc điện thoại iPhone Xs Max thì trong phiên bản lần này, phần cứng của máy đã được nâng cấp lên mạnh mẽ hơn rất nhiều . Ngay cả phần cảm biến camera cũng đã xử lí được nhanh hơn giúp bạn có được những bức ảnh chân dung đẹp chỉ trong nháy mắt. Và nếu cùng cầm trên tay 3 chiếc điện thoại iPhoneX,  Xs và Xs Max bạn sẽ nhận thấy được sự khác nhau về kích thước màn hình nữa. Đặc biệt, dòng iPhone Xs Max này còn sử dụng được 2 SIM vật lí, có khả năng chống nước…', 'Đúng là rất đáng tự hào bởi Apple chưa bao giờ khiến người dùng phải thất vọng về cấu hình cũng như hiệu năng và khả năng tiết kiệm năng lượng. Cấu hình iPhone Xs Max được trang bị con chip A12 Bionic với CPU 6 nhân bao gồm 2 nhân hiệu năng cao và 4 nhân tiết kiệm điện. 2 nhân hiệu năng cao của A12 Bionic sẽ nhanh hơn đến 15% so với A11 Bionic trong khi chúng tiêu tốn ít hơn đến 40% năng lượng tiêu thụ và 4 nhân nhân tiết kiệm điện đến hơn 50%. \r\nVới mức tiêu thụ như thế này, bạn hoàn toàn có thể trải nghiệm mọi tác vụ một cách vô cùng trơn tru và nhanh chóng. Có thể chơi được các tựa game nặng một cách mượt mà mà không bị giật lag hay không có độ trễ. iPhone Xs Max quả thực vô cùng xứng đáng với danh hiệu chiếc smartphone siêu cao cấp. ', 'iPhone Xs Max được thiết kế bộ camera kép  với mặt lưng 12MP được xếp dọc, đặt lệch về phía góc trái rất gọn gàng và đẹp mắt. Việc Apple bổ sung thêm ống kính tele cho máy giúp bạn có thể dễ dàng chụp lại những bức ảnh sắc nét từ một khoảng cách với tầm nhìn xa hơn. Kết hợp cùng với cảm biến chính để cho hiệu quả xóa phông ấn tượng. Mặt trước của camera được thiết kế camera đơn với độ phân giải 7MP, f/2.2 cho bạn có thể selfie những bức ảnh đẹp mắt và chân thật nhất. ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `mahd` (`ma_hd`),
  ADD KEY `masp1` (`ma_sp`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD UNIQUE KEY `ma_sp` (`ma_sp`,`user`),
  ADD KEY `user` (`user`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`user`);

--
-- Chỉ mục cho bảng `loai_dien_thoai`
--
ALTER TABLE `loai_dien_thoai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ml` (`ma_loai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `mahd` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `masp1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `maSPtomaSP` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `info` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `ml` FOREIGN KEY (`ma_loai`) REFERENCES `loai_dien_thoai` (`ma_loai`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
