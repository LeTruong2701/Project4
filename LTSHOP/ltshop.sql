-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2022 lúc 11:23 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills_ban`
--

CREATE TABLE `bills_ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kh` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `status` varchar(20) NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills_ban`
--

INSERT INTO `bills_ban` (`id`, `id_kh`, `date_order`, `tong_tien`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(20, 32, '2019-05-06', 20000, 'on', '1', NULL, '2019-05-05 18:19:04', '2019-05-05 18:19:04'),
(22, 34, '2019-05-09', 35000, 'on', '1', NULL, '2019-05-09 01:27:05', '2019-05-09 01:27:05'),
(15, 27, '2019-04-19', 17000, 'on', '1', NULL, '2019-04-22 08:17:54', '2019-04-18 22:48:32'),
(16, 28, NULL, 70000, 'on', '0', 'cz', '2022-04-25 22:00:09', '2022-04-25 22:00:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills_nhap`
--

CREATE TABLE `bills_nhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ncc` int(11) DEFAULT NULL,
  `id_nhanvien` int(10) NOT NULL,
  `date_order` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL COMMENT 'tổng tiền',
  `thanh_toan` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills_nhap`
--

INSERT INTO `bills_nhap` (`id`, `id_ncc`, `id_nhanvien`, `date_order`, `tong_tien`, `thanh_toan`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-04-15', 1500000, 'on', NULL, '2019-04-15 06:35:40', '2019-04-15 05:39:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail_ban`
--

CREATE TABLE `bill_detail_ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill_ban` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `sl` int(11) NOT NULL COMMENT 'số lượng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail_ban`
--

INSERT INTO `bill_detail_ban` (`id`, `id_bill_ban`, `id_sp`, `sl`, `created_at`, `updated_at`) VALUES
(12, 16, 6, 1, '2019-04-18 22:50:19', '2019-04-18 22:50:19'),
(11, 15, 4, 1, '2019-04-18 22:48:32', '2019-04-18 22:48:32'),
(13, 16, 7, 2, '2019-04-18 22:50:19', '2019-04-18 22:50:19'),
(19, 22, 2, 1, '2019-05-09 01:27:05', '2019-05-09 01:27:05'),
(17, 20, 6, 1, '2019-05-05 18:19:04', '2019-05-05 18:19:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail_nhap`
--

CREATE TABLE `bill_detail_nhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill_nhap` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `sl` int(11) NOT NULL COMMENT 'số lượng',
  `don_vi` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail_nhap`
--

INSERT INTO `bill_detail_nhap` (`id`, `id_bill_nhap`, `id_sp`, `sl`, `don_vi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 'kg', '2019-04-15 06:35:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `email`, `dia_chi`, `sdt`, `note`, `created_at`, `updated_at`) VALUES
(28, 'Đoàn Thùy Linh', 'doanlinh1098@gmail.com', 'Bình Nguyên-Đa Lộc-Ân Thi-Hưng Yên', '0983017991', NULL, '2019-04-18 22:50:19', '2019-04-18 22:50:19'),
(32, 'Đoàn Văn Việt', 'tuan@gmail.com', 'Đa Lộc-Ân Thi-Hưng Yên', '0983756482', NULL, '2019-05-05 18:19:04', '2019-05-05 18:19:04'),
(34, 'Đoàn Linh', 'doanlinh@gmail.com', 'Đa Lộc- Ân Thi-Hưng Yên', '01628470872', NULL, '2019-05-09 01:27:05', '2019-05-09 01:27:05'),
(36, 'Vũ Văn Minh', 'vuminh@gmail.com', 'Khoái Châu-Hưng Yên', '09836276132', 'khong', '2022-04-26 23:28:42', '2022-04-26 23:28:42'),
(37, 'Lê Thanh Tùng', 'letung@gmail.com', 'Chí Linh-Hải Dương', '0987462523', 'khong', '2022-04-26 23:29:30', '2022-04-26 23:29:30'),
(38, 'Đỗ Đức Việt', 'ducviet@gmail.com', 'Hải Phòng', '03874958741', NULL, '2022-04-26 23:30:04', '2022-04-26 23:30:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `id_sp`, `sl`) VALUES
(1, 1, 12),
(2, 2, 23),
(3, 3, 23),
(4, 4, 23),
(5, 5, 34),
(6, 6, 34),
(7, 7, 56),
(8, 8, 25),
(9, 9, 45),
(10, 10, 27),
(11, 11, 43),
(12, 12, 44),
(13, 13, 29),
(14, 14, 55),
(15, 15, 58),
(16, 31, 77),
(17, 32, 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenloai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delet` int(11) NOT NULL COMMENT '0:hien,1:an',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`id`, `tenloai`, `Delet`, `created_at`, `updated_at`) VALUES
(14, 'quanao', 0, NULL, NULL),
(16, 'giay', 0, '2022-04-10 10:40:22', NULL),
(17, 'phukien', 0, '2022-04-10 10:40:53', NULL),
(18, 'dungcu', 0, '2022-04-10 10:41:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_new` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_new`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '5 Động tác giãn cơ khi chạy bộ cần thiết cho người mới bắt đầu', '1.  Căng cơ tứ đầu đùi – giãn cơ khi chạy bộ Cơ tứ đầu (đùi trước) là cơ hoạt động mạnh khi bạn đang chạy, vì vậy điều quan trọng là bạn phải kéo căng chúng.   Hướng dẫn:   Đứng thẳng, nhấc bàn chân bị chuột rút lên phía sau và dùng tay nắm lấy bàn chân của bạn ở bên đó. Nhẹ nhàng kéo gót chân về phía mông, tạo cảm giác cơ tứ đầu căng ra. Giữ chân còn lại của bạn thẳng và cố gắng giữ đầu gối của bạn càng gần nhau càng tốt. Giữ tư thế trong vòng 15 đến 30 giây. Đổi chân và lặp lại các bước ở chân còn lại.', 'tintucgianco.jpg', '2022-04-26 08:06:26', '2022-04-26 08:06:26'),
(2, 'Top 7 giày chạy bộ Reebok giúp tăng thành tích luyện tập', 'Giày chạy bộ Reebok vẫn luôn được các tín độ thể thao chuyên nghiệp lựa chọn.  Công nghệ mà những đôi Reebok mang lại gần như là một đôi giày chạm ngưỡng của sự hào hảo cho các runner.  Cùng HODU Sport khám phá 7 phiên bản giày chạy bộ Reebok siêu nhẹ được runner ưa chuộng.', 'tintucgiayrebook.jpg', '2022-04-26 08:08:45', '2022-04-26 08:08:45'),
(3, '[Bí quyết] Tập squat đúng cách tăng vòng 3 siêu nhanh', 'Squat là một trong những bài tập phổ biến, dễ thực hiện để tăng kích thước vòng ba nhưng thường bị tập sai kỹ thuật, dẫn đến hiệu quả kém.  Để có được hiệu quả tới từng phần cơ thể bạn phải tập đúng cách. Vậy đâu là kỹ thuật squat đúng? Cùng HODU Sport tìm hiểu.', 'tintuctapsquat.jpeg', '2022-04-26 08:10:13', '2022-04-26 08:10:13'),
(4, '[Tổng hợp] 10 Bài tập Plank cho cơ bụng “6 múi” săn chắc', 'Plank là bài tập có tác dụng lên phần bụng hiệu quả, giúp các chàng trai vận động tập cơ bụng một cách hiệu quả. Những người mới tập cũng có thể thực hiện 10 bài tập plank cho cơ bụng 6 múi dễ dàng ngay tại nhà.  Sau đây là các bài tập Plank hiệu quả giúp chàng có cơ bụng “6 múi hoàn hảo”.', 'tintuctapplank.png', '2022-04-26 08:11:27', '2022-04-26 08:11:27'),
(5, '[Sức khoẻ tập luyện] Top 7 thực phẩm nguy hiểm ảnh hưởng đến việc tập luyện', 'Việc bổ sung dinh dưỡng khi tập luyện thể thao là điều hết sức cần thiết. Rất nhiều người quan tâm tới chế độ dinh dưỡng của mình hơn cả việc tăng thời gian tập luyện.   Bạn đã biết các thực phẩm cần tránh khi để có một cơ thể khoẻ mạnh và hỗ trợ tốt việc luyện tập chưa?   Cùng khám phá top 7 thực phẩm mà bạn nên hạn chế/ giảm hẳn trong chế độ ăn uống của mình', 'tintucthucpham.png', '2022-04-26 08:12:37', '2022-04-26 08:12:37'),
(6, 'Nên hay không nên mang giày khi tập thể dục trong nhà?', 'Hiện nay, hầu như không có phòng tập nào cho phép bạn mang chân trần khi bước vào. Tuy nhiên cũng nhiều tranh cãi của việc có nên mang giày khi tập thể dục hay không?   Lý do các phòng tập trong nhà bắt buộc bạn phải mang giày tập ngoài lý do thẩm mỹ thì vấn đề chấn thương do không mang giày cũng ảnh hưởng đến cơ thể của bạn.  Đặc biệt, trong phòng tập, chiếc máy chạy bộ là thiết bị mà bạn không được phép bước lên khi không mang giày.', 'tintucdigiaytrongnha.jpeg', '2022-04-26 08:14:03', '2022-04-26 08:14:03'),
(7, '[Kinh nghiệm] Lưu ý khi đạp xe vào buổi sáng An toàn và Hiệu quả', 'Buổi sáng là thời điểm thích hợp để tập luyện thể dục thể thao, đạp xe cũng không phải là môn thể thao ngoại lệ.   Tuy nhiên, đạp xe buổi sáng nếu không chuẩn bị kỹ cũng có thể dẫn đến một vào rủi ro và chấn thương cho người tập.   Cùng Hodu sport khám phá những lưu ý khi đạp xe vào buổi sáng giúp đảm bảo an toàn và mang lại hiệu quả tốt nhất!', 'tintucluuydixe.jpg', '2022-04-26 08:14:45', '2022-04-26 08:14:45'),
(8, 'Bất ngờ 10 lợi ích đạp xe mỗi ngày', 'Đạp xe hàng ngày đang là xu hướng luyện tập được ưa chuộng hiện nay. Việc đạp xe với thời gian hợp lý mang lại nhiều lợi ích tuyệt vời cho cơ thể của bạn. Bài viết này hãy cùng nhau tìm hiểu 10 lợi ích đạp xe mỗi ngày bạn có thể chưa biết.', 'tintucloiichdixe.jpg', '2022-04-26 08:15:37', '2022-04-26 08:15:37'),
(9, '[Kinh nghiệm] Cách chọn giày chạy bộ cho người mới bắt đầu', 'Bạn mới bắt đầu với việc thực hành chạy bộ với đôi giày thể thao có sẵn trong tủ.  Chạy một thời gian bạn thấy đau chân, phồng rộp, đế mòn. Lúc này bạn nhận ra cần chọn một đôi giày dòng chuyên chạy bộ để hỗ trợ tốt nhất cho việc chạy bộ hàng ngày của mình.', 'tintuccachchongiay.jpg', '2022-04-26 08:16:36', '2022-04-26 08:16:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `ten_nhanvien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capbac` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten_nhanvien`, `gioitinh`, `ngaysinh`, `quequan`, `sdt`, `email`, `capbac`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Thùy', 'Nữ', '1989-10-04', 'Nguyễn Xá-Nhân Hòa-Mỹ Hào-Hưng Yên', '0986253821', 'thuynguyen@gmail.com', '1', '2019-04-04 14:45:32', '0000-00-00 00:00:00'),
(3, 'Nguyễn Đức Bảo', 'Nam', '2000-04-03', 'Khoái Châu', '0984767433', 'nguyenbao@gmail.com', '2', '2022-04-26 15:48:14', '2022-04-26 08:48:14'),
(4, 'Hoàng Đại Dương', 'Nam', '2000-01-02', 'Hải Phòng', '09876476323', 'hoangduong@gmail.com', '1', '2022-04-26 15:48:48', '2022-04-26 08:48:48'),
(8, 'Phạm Việt Đức', 'Nam', '2001-08-01', 'Hà Nội', '0378647629', 'pvduc@gmail.com', '2', '2022-04-27 06:25:13', '2022-04-26 23:25:13'),
(9, 'Lê Văn Kiên', 'Nam', '2002-01-04', 'Hải Dương', '0987583728', 'lvkien@gmail.com', '1', '2022-04-26 23:25:53', '2022-04-26 23:25:53'),
(10, 'Nguyễn Quang Đạt', 'Nam', '1999-07-05', 'Hà Nội', '07648372812', 'nqdat@gmail.com', '2', '2022-04-26 23:27:17', '2022-04-26 23:27:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten_ncc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi_ncc` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Delet` int(11) NOT NULL COMMENT '0:hien,1:an',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten_ncc`, `diachi_ncc`, `email`, `sdt`, `Delet`, `created_at`, `updated_at`) VALUES
(1, 'CÔNG TY CỔ PHẦN ĐẦU TƯ EXP VIỆT NAM', 'Nhà D21, dãy D, khu tập thể sư đoàn 361, P. Xuân Đỉnh, Q. Bắc Từ Liêm, Hà Nội', 'thucphamexp@gmail.com', '024 3750294', 0, '2019-04-04 14:48:55', '0000-00-00 00:00:00'),
(2, 'Công Ty TNHH Chế Biến Nông Sản Thực Phẩm Thiên Hà', 'Lầu 10, Toà Nhà Vinaconex, 47 Điện Biên Phủ, P. Đa Kao, Q. 1, Tp. Hồ Chí Minh (TPHCM)', 'nancy@galaxy-vn.com', '(028) 39103066', 0, '2019-04-04 14:48:55', '0000-00-00 00:00:00'),
(3, 'Nông Sản Galaxy Agro - Công Ty TNHH Galaxy Agroe', 'Số 14/16, Đường 990, Khu Phố 4, Phường Phú Hữu, Quận 9, Tp. Hồ Chí Minh (TPHCM)', 'nancy@galaxy-vn.com', '(028) 39103066', 0, '2022-04-25 21:29:49', '2022-04-25 21:29:49'),
(4, 'Công ty QTY', 'Phố 4, Quận 7 Tp.Hồ Chí Minh', 'QTY@gmail.com', '09648359821', 0, '2019-05-09 03:40:05', '2019-05-08 20:40:05'),
(5, 'Cong ty abc', 'hihehe', 'amd@gmail.com', '12312342', 0, '2022-04-25 21:30:40', '2022-04-25 21:30:40'),
(6, 'a', 'c', 'ac', 'q', 2, '2022-04-26 23:59:14', '2022-04-26 23:59:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id_phan_hoi` int(11) NOT NULL,
  `id_tk` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `level` int(10) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_hoi`
--

INSERT INTO `phan_hoi` (`id_phan_hoi`, `id_tk`, `id_sp`, `level`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'Nếu mua nhiều có được chiết khấu không vậy?', '2019-04-15 05:27:42', '0000-00-00 00:00:00'),
(2, 1, 7, 5, 'Mình đã mua hoa quả đúng chất lượng.', '2019-04-15 05:27:43', '0000-00-00 00:00:00'),
(3, 1, 2, 3, 'Ngon.Ngon', '2019-04-15 05:27:43', '0000-00-00 00:00:00'),
(4, 1, 1, 0, 'Quả này đẻ', '2019-04-15 05:27:43', '2019-04-10 02:20:29'),
(5, 1, 1, 0, 'uk', '2019-04-15 05:27:43', '2019-04-10 02:21:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quang_cao`
--

CREATE TABLE `quang_cao` (
  `id` int(11) NOT NULL,
  `tittle` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_loai_sp` int(10) UNSIGNED DEFAULT NULL,
  `id_ncc` int(11) NOT NULL,
  `mota_sp` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `gia_km` float DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `don_vi_tinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delet` int(11) NOT NULL DEFAULT 0 COMMENT '0:hien, 1:an',
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `id_loai_sp`, `id_ncc`, `mota_sp`, `unit_price`, `gia_km`, `so_luong`, `image`, `don_vi_tinh`, `Delet`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Áo Hoodie Adidas Pinwheel FU1531', 14, 2, '<p>Áo Hoodie Adidas chính hãng Trainer Pinwheel là lựa chọn cho những người thích sự tối giản. \r\n\r\nChiếc áo hoodie adidas này có thiết kế basic với mũ phía sau, túi kangaroo phía trước là items hầu như không thể thiếu trong mọi tủ đồ. Điểm nhấn của chiếc áo đến từ logo Trefoil tạo thành hình chong chóng. \r\n\r\nÁo hoodie adidas trainer pinwheel được làm từ lông cừu chải mềm giúp giữ ấm cơ thể và tạo sự thoải mái cho người mặc. </p>\r\n<p>Thông số kỹ thuật\r\nPhù hợp mang thường xuyên \r\n\r\nDây rút mũ trùm \r\n\r\n78% lông cừu cotton, 22% polyester tái chế \r\n\r\nCó mũ trùm đầu, túi kangaroo \r\n\r\nCổ tay có gân và viền \r\n\r\nLogo Trefoil mặt trước và sau \r\n\r\nMàu sắc: Off White / Tech Indigo\r\n\r\nMã sản phẩm: FU1531\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô\r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 1500000, 900000, 24, 'hoodiePinwheel_trang.jpg', 'kg', 1, 0, NULL, '2019-05-08 00:25:19'),
(2, 'Áo khoác Adidas đen', 14, 2, '<p>Áo khoác nam Adidas chính hãng ID Windbreaker FT 2783 là lựa chọn cho buổi sáng đi làm nhẹ nhàng, dạo phố hoặc một buổi tập ngoài trời. \r\n\r\nChiếc áo khoác gió adidas chính hãng này giúp bạn che chắn cho bản thân, đặc biệt là mái tóc của mình trong những ngày mưa nhẹ hạt. \r\n\r\nVải dệt thoáng khí và tấm lưới phía sau giúp bạn không bị quá nóng. Phần thân được thiết kế với dây viên có thể điều chỉnh được theo kích thước mong muốn. Đây là items áo khoác adidas nam được nhiều bạn trẻ săn đón vì sự linh hoạt và đơn giản của nó. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên \r\n\r\nĐầy đủ khóa kéo và mũ trùm đầu \r\n\r\n87% nylon, 13% vải dệt trơn \r\n\r\nTúi zip bên hông \r\n\r\nBảng thông gió lưới ở mặt sau \r\n\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm:\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô\r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 2300000, 1700000, 14, 'aokhoacadidas_den.jpg', 'ao', 1, 1, NULL, '2019-05-09 01:27:05'),
(3, 'Áo thun Jodan đen', 14, 1, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 25000, NULL, 15, 'jodan_den.jpg', 'ao', 0, 0, NULL, '2019-05-08 20:39:07'),
(4, 'Quần nam Nike đen', 14, 3, '<p>Quần thể thao Adidas Trắng 3 Sọc DZ8767 giúp bạn luôn cảm thấy mát mẻ và khô thoáng. \r\n\r\nQuần dài thể thao adidas được làm từ chất liệu polyester thoáng khí và nhanh khô. Kiểu dáng ôm vừa vặn xuống chân, chi tiết đường gân thúc đẩy hoạt động của chân. Khóa kéo ở cổ chân thuận tiện cho việc mang hoặc cởi giày. \r\n\r\nVới một chiếc quần thể thao màu trắng bạn có thể sử dụng trong hoạt động tập luyện cũng như phối hợp với outfit dạo phố năng động.  \r\n\r\nThông số kỹ thuật\r\nDáng ôm vừa vặn được cắt ôm sát cơ thể\r\n\r\n100% polyester \r\n\r\nClimacool thông gió; Đường may túi bên hông; Drawcord trên eo đàn hồi; Gân chèn trên chân dưới\r\n\r\nLưới chèn ở hai bên; Khóa kéo mắt cá chân\r\n\r\nMàu sản phẩm: Trắng chủ đạo + Đen\r\n\r\nMã sản phẩm: DZ8767\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 1300000, 850000, 23, 'quannike_den.jpg', 'quan', 0, 0, NULL, '2022-04-16 06:16:42'),
(5, 'Giày chạy bộ ReeBook1', 16, 3, '<p>Dưa hấu l&agrave; một tr&aacute;i c&acirc;y lớn, c&oacute; nguồn gốc từ miền nam Ch&acirc;u Phi, c&ugrave;ng họ h&agrave;ng với b&iacute; ng&ocirc; v&agrave; dưa chuột. Dưa hấu chủ yếu được sản xuất bằng nước uống v&agrave; c&aacute;c chất dinh dưỡng, nhưng lại chứa rất &iacute;t calo.</p>\r\n\r\n<p>Với những người chơi thể thao, Reebok là cái tên rất được ưa chuộng. Thương hiệu này còn được đánh giá cao bởi những đôi giày thể thao đầy sáng tạo. Giày Reebok chính hãng Liquifect 180 2.0 SPT FW7989 được lựa chọn là một trong những mẫu giày thể thao Reebok được yêu thích nhất với giới yêu thể thao đặc biệt là những người yêu thích phòng tập.\r\n\r\nVới thiết kế độc lạ với logo in nổi trên chất liệu vải dệt cao cấp thoáng mát, mềm nhẹ giúp đi lại dễ chịu. Đệm lót mền từ gót đến mũi chân. Đế ngoài bằng cao su có độ bám cao và nhẹ, với các nút tròn tạo khi rãnh giúp bước chân di chuyển nhanh hơn. Thiết kế đế độc đáo với công nghệ injected polyurethane foam, nhẹ, êm có độ bám cao giúp bước chân di chuyển nhanh hơn.\r\n\r\nCó chất liệu Sandwich mesh chất vải gồm 2 lớp Mesh ghép chồng lên nhau. Thông qua kết cấu này sẽ giúp thoát khí đôi chân nhanh và linh hoạt hơn, tạo sự thoáng mát cho chân thích hợp cho các bài tập nặng, linh hoạt.\r\n\r\nThông Số Kỹ Thuật\r\nDệt may phía trên với các lớp phủ liền mạch\r\n\r\nĐược thiết kế cho: Chạy hoặc mặc thường ngày\r\n\r\nFloatride Fuel cung cấp trải nghiệm đệm nâng cao, phục hồi cao\r\n\r\nĐế ngoài bằng cao su bền để có thêm độ bám\r\n\r\nMã sản phẩm: FW7989\r\n\r\nBảo quản: \r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nSử dụng túi giặt bảo quản khi dùng với máy giặt\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 2800000, 2500000, 12, 'giayRebokk.jpg', 'giay', 0, 0, NULL, '2022-04-27 00:59:18'),
(6, 'Giày AdidasUltraboost EG0712', 16, 3, '<p>Giày chạy bộ Adidas chính hãng Ultraboost 20 EG0712 - khả năng nâng đỡ lực chính xác. Mạnh mẽ kiểm soát lực khi chạm đất, thoải mái êm nhẹ trong từng bước chạy. \r\n\r\nUltraboost 20 EG0712 chuyên dành cho chạy bộ bởi các đường may được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Thân giày làm bằng vải dệt công nghệ adidas Primeknit ôm trọn bàn chân với thiết kế nâng đỡ để hỗ trợ chuyển động. Đế giữa công nghệ Boost đàn hồi cho khả năng hoàn trả năng lượng đáng kinh ngạc.\r\n\r\nCác chi tiết của giày đều đắt giá. Tổng thể màu sắc và thiết kế toát lên được sự sang trọng và năng động. Mẫu giày rất phù hợp với quần thể thao, jeans hoặc chất kaki.\r\n\r\nThông số kỹ thuật\r\nVừa vặn như một đôi tất\r\n\r\nCó dây buộc\r\n\r\nVị trí sợi quang được thiết kế riêng có khóa vừa vặn\r\n\r\nThiết kế ôm chân cố định với công nghệ Tailored Fibre Placement\r\n\r\nGiày chạy hiệu năng cao\r\n\r\nĐế giữa công nghệ Boost đàn hồi\r\n\r\nTrọng lượng: 10,9 ounce (cỡ US 9)\r\n\r\nChênh lệch độ cao đế giữa: 10 mm (gót giày 22 mm / mũi giày 12 mm)\r\n\r\nĐế ngoài công nghệ Stretchweb làm từ cao su Continental™\r\n\r\nMàu sản phẩm: Cloud White / Scarlet / Royal Blue\r\n\r\nMã sản phẩm: EG0712\r\n\r\nBảo quản\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nSử dụng túi giặt bảo quản khi dùng với máy giặt\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 4300000, 3850000, 7, 'ultraboot_den.jpg', 'giay', 0, 1, NULL, '2019-05-05 18:19:04'),
(7, 'Giày Nike Zoom Division', 16, 2, '<p>Giày chạy bộ nike Zoom Division CK2946-100 - Giày thể thao giản dị thoải mái xu hướng đệm khí.\r\n\r\nHệ thống Zoom Air đàn hồi ở bàn chân trước kết hợp với bọt xếp chồng đôi ở gót chân để mang đến một chuyến đi khó quên. Mẫu giày có mối nối bên ngoài và thiết kế liền mạch làm cho các đường vòng cung mượt mà, uyển chuyển và năng động. Vải lưới có thể tăng độ thoáng khí. \r\n\r\nMẫu giày chạy bộ nike chính hãng Zoom Division CK2946-100 “đơn giản nhưng không hề tầm thường\" bởi nó sử dụng được cho bất kỳ trường hợp nào. Có thể đi học, đi làm, tiệc tùng cuối tuần hay buổi cà phê nhẹ nhàng. \r\n\r\nThông số kỹ thuật\r\nGiày phong cách cổ thấp\r\n\r\nGiày ôm sát vừa vặn\r\n\r\nPhần trên lấy cảm hứng từ Nike Air Streak Lite\r\n\r\nCác lớp phủ được khâu và da không có đường may đầy những đường cong tự nhiên, năng động\r\n\r\nĐệm siêu mềm với cổ áo đệm quanh mắt cá chân tạo cảm giác nhẹ nhàng và thoải mái\r\n\r\nĐế cao su cho lực kéo\r\n\r\nMàu sản phẩm: White/Black/Royal\r\n\r\nMã sản phẩm: CK2946-100.\r\n\r\nBảo quản\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nSử dụng túi giặt bảo quản khi dùng với máy giặt\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 2650000, 2300000, 6, 'nike_trang.jpg', 'giay', 0, 1, NULL, NULL),
(8, 'Giày Ultraboost DNA FW4898 ', 16, 3, 'Ultraboost DNA FW4898 - Giày chạy bộ Adidas chính hãng biểu tượng thời trang hiện đại nâng tầm mọi ánh nhìn. Mẫu giày là sự kết hợp giữa hiệu năng chạy bộ tối đa và sự thoải mái, êm nhẹ cho người dùng. \r\n\r\nGiày có phần đan phía trên mang tính co giãn, có thể thay đổi theo khuôn chân khi luyện tập. Đế giữa tăng cường và đế ngoài linh hoạt giúp bước chân linh hoạt. Đệm đáp ứng giúp bạn cảm thấy tràn đầy năng lượng. Đặc biệt kiểu dáng và phong cách của đôi adidas Ultraboost DNA này cho thấy tính tiện dụng của nó khi bạn có thể mang trong bất kỳ hoàn cảnh nào.\r\n\r\nQuần jeans, sơ mi, áo thun, chân váy cá tính, đồ thể thao và Ultraboost DNA FW4898. Tất cả sẽ là sự kết hợp hoàn hảo.\r\n\r\nThông số kỹ thuật\r\nÔm sát vừa vặn như đi tất\r\n\r\nCó dây buộc\r\n\r\nThân giày bằng vải dệt công nghệ adidas Primeknit\r\n\r\nGiày chạy hiệu suất cao\r\n\r\nĐế giữa công nghệ Boost đàn hồi\r\n\r\nTrọng lượng: 312 g (cỡ Anh 9)\r\n\r\nChênh lệch độ cao đế giữa: 10mm (gót: 29 mm, bàn chân trước: 19 mm)\r\n\r\nCông nghệ Torsion System tạo độ ổn định\r\n\r\nMàu sản phẩm: Grey Five / Silver Metallic / Grey Three\r\n\r\nMã sản phẩm: FW4898\r\n\r\nBảo quản\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nSử dụng túi giặt bảo quản khi dùng với máy giặt\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc', 1800000, 1350000, 15, 'adidas_den.jpg', 'giay', 0, 1, NULL, NULL),
(9, 'Balo chống nước Waterproof', 18, 2, 'Thiết kế đóng mở bằng cách gấp miệng giúp chống nước tuyệt đối, thích hợp đựng cả các thiết bị điện tử như máy ảnh, có ngăn macbook 13\'3 inch, Túi lưới nhỏ bên để đựng passport và các vật nhỏ bên trong.\r\n\r\nNệm lưng, giúp thoải mái và không bị đau khi mang balo trong thời gian dài, đồng thời hạn chế lực va đập giữa lưng và đồ vật bên trong, Quoai đeo và nệm lưng đuọc thiết kế lỗ thoáng khí,. Quai đeo trợ lực, thiết kế cần thiết khi đi đường dài, giúp balo ôm sát vào người, k bị lắc lư khi di chuyển.\r\n\r\nTúi zipper lớn ở mặt trước, chống nước IPX6, chống nước mưa ở mức độ vừa phải, nơi đựng các vật phẩm hữu ích cần sử dụng nhiều trong chuyến đi,( móc khoá, bật lửa, dao, hộ chiếu, ví tiền.) Túi lưới tiện lợi bên hông, đựng bình nước hoặc đồ vật ướt.\r\n\r\nLưu ý: Balo T.O.U có tính kháng nước cực mạnh, gần như là 100%., tuy nhiên không phải tuyệt đối trong trường hợp ngâm lâu dưới nước. Bên cạnh đó, T.O.U không nên nhấn chìm lâu trong nước, đặc biệt khi chứa các vật phẩm có giá trị và đồ điện tử bên trong', 900000, 630000, 12, 'balochongnuoc_den.jpg', 'cai', 0, 0, NULL, '2019-05-05 05:53:41'),
(10, 'Balo Cầu lông', 18, 2, 'Mẫu balo chính hãng kamito được thiết kế riêng cho bộ môn cầu lông với rất nhiều ngăn: ngăn phụ kiện, ngăn chứa quần áo, ngăn chứa giày riêng biệt và đặc biệt là ngăn để vợt riêng chống shock tốt, có ngàm cố định vợt.\r\n\r\nBalo Cầu Lông Chính Hãng Kamito 3 Màu Xanh Đỏ Vàng Cao Cấp\r\nCó ngăn laptop riêng biệt, sử dụng kết hợp đi làm và chơi thể thao.\r\n\r\n* Sản xuất từ chất liệu vải dù caro bền bỉ, chắc chắn, mang lại trải nghiệm ấn tượng cho người sử dụng.\r\n\r\n* Thiết kế nhỏ gọn nhưng không gian bên trong vô cùng rộng rãi, giúp bạn thoải mái mang theo nhiều vật dụng. * 3 lựa chọn màu sắc trẻ trung, năng động, đậm chất thể thao\r\n\r\nChính Sách Bảo Hành Hãng Kamito\r\n– Đổi mới:  7 ngày kể từ ngày mua hàng ghi trên phiếu bảo hành nếu lỗi.\r\n\r\n– Sửa chữa: 90 ngày kể từ ngày mua hàng ghi trên phiếu bảo hành.\r\n\r\n– Bảo hành sản phẩm trong trường hợp bong keo, gãy, nứt đế giày do lỗi nhà sản xuất.', 690000, 650000, 32, 'balocaulong.png', 'cai', 0, 0, NULL, NULL),
(11, 'Tất Kamito trắng', 18, 2, 'Mẫu tất vớ mỏng cổ vừa chính hãng kamito màu trắng logo đỏ chính hãng kamito tại Minh Hải Sport giá đẹp\r\n\r\nTất Vớ Kamito Người Lớn Mỏng Viền Đỏ Xanh\r\n100% Spandex\r\nChống trơn\r\nChống dão\r\nChống mùi\r\nGiới Thiệu Tất Vớ Kamito Người Lớn Mỏng Viền Đỏ Xanh\r\nTất mỏng Kamito dệt kim với chất liệu Cotton cao cấp giúp người đi luôn cảm thấy khô thoáng, không bị bí và không tạo mùi khó chịu khi đi thời gian dài.\r\n\r\nTất mỏng Kamito được thiết kế với cổ tất có đường viền màu xanh/ đỏ và những đường kẻ ngang tạo nên điểm nhấn ấn tượng cho tổng thể thiết kế.\r\n\r\nCổ tất và bề mặt tất mỏng Kamito được làm từ chất liệu Spandex co giãn rất tốt, độ bền cao, luôn ôm sát và không bị dão sau thời gian dài sử dụng.\r\n\r\nTất mỏng Kamito thích hợp cho những người đi mong muốn có cảm giác thật chân, nhẹ nhàng trong từng bước di chuyển.', 18000, NULL, 24, 'tatkamito_trang.jpg', 'cai', 0, 0, NULL, NULL),
(12, 'Bóng Galaxy', 18, 2, 'Bóng Đá FIFA Quality UHV 2.05 Galaxy Số 5\r\nBóng đá số 5 UHV 2.05 Galaxy là bóng UHV 2.05. Sự khác biệt nhất lớn nhất của bóng đá Galaxy này chính là thiết kế của bóng. Đó chính là sự pha trộn giữa màu xanh lá mát mắt cùng màu đen huyền bí và màu vàng của nắng, tạo sự phấn khích cho người chơi.\r\nUHV 2.05 Galaxy là bóng thi đấu và tập luyện chính thức tại các giải thi đấu dưới giải thi đấu vô địch quốc gia.\r\nBóng đạt tiêu chuẩn FIFA INSPECTED / FIFA QUALITY\r\nBóng được làm từ chất liệu da PU cao cấp.\r\nCấu tạo nhiều lớp, ruột làm bằng cao su cao cấp, giữ hơi tốt.\r\nBóng có phù hợp với nhiều loại sân như sân cỏ thường, sân cỏ nhân tạo…\r\nHƯỚNG DẪN SỬ DỤNG:\r\n– Chọn kim tốt, không cong, không thô nhám.\r\n\r\n– Kim bơm phải được nhúng ướt trước khi cho vào lỗ bơm.\r\n\r\n– Cắm kim thẳng, vuông góc.\r\n\r\n– Bóng số 5: bơm áp suất tối đa 0,8 kg/cm2, chu vi 68,5-69,5 cm', 25000, NULL, 23, 'bonggalaxy.jpg', 'quả', 0, 1, NULL, '2019-04-11 05:04:55'),
(15, 'QUẦN ĐÙI TẬP GYM NAM Đen', 14, 3, '<p>Chắc hẳn sẽ có nhiều bạn tự đặt ra câu hỏi này cho mình rằng: tại sao phải chọn Quần Đùi Tập Gym khi tập. Thay vì tận dụng những bộ quần áo thoải mái khác có sẵn ở nhà? Bởi Quần Đùi Tập Gym Nam Navy có thiết kế cũng như chất liệu thích hợp nhất để tập thể dục.Nếu một chiếc quần gym bó bạn cần chứa cả thế giới điện thoại bên cạnh. Chắc chắn chiếc quần này sẽ là tâm điểm cho bạn. Sở hữu tính năng tích hợp chiếc túi thần kì bên bắp đùi. Bạn có thể đựng những đồ vật cần thiết bên cạnh mình.Tuy nhiên nếu không cẩn thận, đôi khi bạn sẽ gặp tình huống “lộ hàng” nếu ống quần không đủ dài hay quá rộng. Để khắc phục điều này, quần thể thao nam ngắn nam 2 lớp có túi trong. Gymfashion sẽ giúp bạn an tâm khi tập Quần short tập gym nam Navy phù hợp cho những bài tập cường độ cao trong thời tiết nóng bức. Quần có dáng ôm sát tránh gây vướng khi tập luyện với dụng cụ giúp bạn tập luyện không giới hạn với các bài tập đòi hỏi sự linh hoạt của các nhóm cơ. Với đặc tính này, quần tập gym cần có độ đàn hồi tốt để người mặc thoải mái khi tập luyện. Tránh các chi tiết nhỏ nhặt như đường may gây cảm giác khó chịu.</p>', 265000, NULL, 25, 'quanduinavy_den.jpg', 'quan', 0, 0, '2019-04-06 03:00:48', '2019-04-06 13:00:36'),
(31, 'ÁO KHOÁC TẬP GYM NAM TAY NGẮN XÁM', 14, 1, 'a', 260000, 250000, 15, 'aokhoacgym_xam.jpg', 'ao', 0, 1, '2019-04-15 02:46:52', '2019-04-15 02:46:52'),
(34, 'ÁO KHOÁC TẬP GYM NAM TAY NGẮN XANH', 14, 1, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 260000, NULL, 12, 'aokhoacgym_xanhluc.jpg', 'ao', 1, 1, '2019-04-22 00:41:04', '2019-05-08 19:32:47'),
(35, 'ÁO HOODIE TẬP GYM NAM TAY NGẮN XANH BÍCH MÃ', 14, 3, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 260000, NULL, 20, 'aokhoacgym_xanh.jpg', 'ao', 0, 1, '2019-05-05 06:21:03', '2019-05-05 06:29:01'),
(36, 'ÁO PHÔNG TẬP GYM CHUYÊN DỤNG NAVY', 14, 1, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 250000, NULL, 15, 'aophonggym_den.jpg', 'ao', 0, 1, '2019-05-05 06:23:08', '2019-05-05 06:27:11'),
(37, 'ÁO PHÔNG TẬP GYM CHUYÊN DỤNG Trắng', 14, 3, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 250000, NULL, 27, 'aophonggym_trang.jpg', 'ao', 0, 1, '2019-05-05 06:26:17', '2019-05-05 06:26:17'),
(38, 'ÁO PHÔNG TẬP GYM NAM NAVY B323', 14, 3, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 170000, NULL, 26, 'aophonggym_vayson.jpg', 'ao', 0, 1, '2019-05-05 06:28:35', '2019-05-05 06:28:35'),
(39, 'ÁO THUN TẬP GYM CHUYÊN DỤNG Đen BB583', 14, 1, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 50000, NULL, 16, 'aophonggym_xam.jpg', 'ao', 0, 1, '2019-05-08 18:45:28', '2019-05-09 00:34:24'),
(40, 'Áo phông gym V1 đen', 14, 2, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 190000, NULL, 20, 'aophonggym1_den.jpg', 'ao', 1, 1, '2019-05-09 00:33:58', '2019-05-09 00:35:33'),
(41, 'Áo phông gym V1 trắng', 14, 2, NULL, 190000, NULL, 11, 'aophonggym1_trang.jpg', 'ao', 0, 1, '2019-05-09 01:28:03', '2019-05-09 01:28:03'),
(42, 'Áo phông gym v1 Xám', 14, 3, NULL, 110000, NULL, 30, 'aophonggym1_xam.jpg', 'ao', 0, 1, '2019-05-09 01:28:03', '2019-05-09 01:28:03'),
(43, 'Áo phông TB28', 14, 2, NULL, 220000, NULL, 20, 'aophonggymvayson_trang.jpg', 'ao', 0, 1, '2019-05-09 01:28:03', '2019-05-09 01:28:03'),
(44, 'Áo thun ba lỗ đen', 14, 2, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 180000, 160000, 11, 'aothun3lo_den.jpg', 'ao', 0, 0, NULL, NULL),
(45, 'Áo thun ba lỗ xám', 14, 2, '<p>Áo thun Nike chính hãng Jordan Sport DNA CN3331-010 chiếc áo thun ngắn tay mềm mại với họa tiết dòng chữ Air Jordan của nhà Nike được in nổi dọc theo ngực và tay áo. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike Air Jordan phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày. \r\n\r\nÁo phông Nike chính hãng có thể kết hợp cùng nhiều items khác tạo nên những outfit cực phóng khoáng hiện đại. Jeans, short, jogger,..cùng đôi sneaker phong cách đường phố là lựa chọn phù hợp. \r\n\r\nThông số kỹ thuật\r\nPhù hợp mang thường xuyên\r\n\r\nGân cổ tròn, tay ngắn\r\n\r\n100% cotton \r\n\r\nHọa tiết mặt trước\r\n\r\nMàu sắc: Black/Neptune Green\r\n\r\nMã sản phẩm: CU9571-011\r\n\r\nBảo quản\r\nSấy khô ở nhiệt độ thấp \r\n\r\nKhông giặt khô, là ủi \r\n\r\nSử dụng nước dưới 35 độ để giặt sản phẩm\r\n\r\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\r\n\r\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 180000, 160000, 15, 'aothun3lo_xam.jpg', 'ao', 0, 0, NULL, '2022-04-26 07:25:49'),
(48, 'Giày Nike Forgrey', 16, 2, 'sản phẩm giày tuyệt vời', 1800000, 1600000, 8, 'giaynikeFogGrey.jpg', 'giay', 0, 0, NULL, NULL),
(49, 'Giày Adidas 20-20fx Blue', 16, 1, 'Giày Adidas 20-20fx Blue mang đến cho bạn cảm giác thoải mái dễ chịu', 2900000, 2750000, 6, 'giayadidas20-20fx_blue.jpg', 'giay', 0, 0, NULL, NULL),
(50, 'Giày Adidas 20-20fx Red', 16, 2, 'Giày Adidas 20-20fx Red mang lại cảm giác mềm mại', 2900000, NULL, 5, 'giayadidas20-20fx_red.jpg', 'giay', 0, 0, '2022-04-27 01:21:28', '2022-04-27 01:21:28'),
(51, 'Giày Puma Blue 2GXR', 16, 2, '<p>Giày Puma Blue 2GXR - khả năng nâng đỡ lực chính xác. Mạnh mẽ kiểm soát lực khi chạm đất, thoải mái êm nhẹ trong từng bước chạy. \n\nUltraboost 20 EG0712 chuyên dành cho chạy bộ bởi các đường may được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Thân giày làm bằng vải dệt công nghệ adidas Primeknit ôm trọn bàn chân với thiết kế nâng đỡ để hỗ trợ chuyển động. Đế giữa công nghệ Boost đàn hồi cho khả năng hoàn trả năng lượng đáng kinh ngạc.\n\nCác chi tiết của giày đều đắt giá. Tổng thể màu sắc và thiết kế toát lên được sự sang trọng và năng động. Mẫu giày rất phù hợp với quần thể thao, jeans hoặc chất kaki.\n\nThông số kỹ thuật\nVừa vặn như một đôi tất\n\nCó dây buộc\n\nVị trí sợi quang được thiết kế riêng có khóa vừa vặn\n\nThiết kế ôm chân cố định với công nghệ Tailored Fibre Placement\n\nGiày chạy hiệu năng cao\n\nĐế giữa công nghệ Boost đàn hồi\n\nTrọng lượng: 10,9 ounce (cỡ US 9)\n\nChênh lệch độ cao đế giữa: 10 mm (gót giày 22 mm / mũi giày 12 mm)\n\nĐế ngoài công nghệ Stretchweb làm từ cao su Continental™\n\nMàu sản phẩm: Cloud White / Scarlet / Royal Blue\n\nMã sản phẩm: EG0712\n\nBảo quản\nSử dụng nước dưới 35 độ để giặt sản phẩm\n\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\n\nSử dụng túi giặt bảo quản khi dùng với máy giặt\n\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 1500000, NULL, 4, 'giaypuma_xanh.jpg', 'giay', 0, 0, '2022-04-27 01:23:17', '2022-04-27 01:23:17'),
(52, 'Giày New Balance MX45', 16, 1, '<p>Giày New Balance MX45 - khả năng nâng đỡ lực chính xác. Mạnh mẽ kiểm soát lực khi chạm đất, thoải mái êm nhẹ trong từng bước chạy. \n\nUltraboost 20 EG0712 chuyên dành cho chạy bộ bởi các đường may được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Thân giày làm bằng vải dệt công nghệ adidas Primeknit ôm trọn bàn chân với thiết kế nâng đỡ để hỗ trợ chuyển động. Đế giữa công nghệ Boost đàn hồi cho khả năng hoàn trả năng lượng đáng kinh ngạc.\n\nCác chi tiết của giày đều đắt giá. Tổng thể màu sắc và thiết kế toát lên được sự sang trọng và năng động. Mẫu giày rất phù hợp với quần thể thao, jeans hoặc chất kaki.\n\nThông số kỹ thuật\nVừa vặn như một đôi tất\n\nCó dây buộc\n\nVị trí sợi quang được thiết kế riêng có khóa vừa vặn\n\nThiết kế ôm chân cố định với công nghệ Tailored Fibre Placement\n\nGiày chạy hiệu năng cao\n\nĐế giữa công nghệ Boost đàn hồi\n\nTrọng lượng: 10,9 ounce (cỡ US 9)\n\nChênh lệch độ cao đế giữa: 10 mm (gót giày 22 mm / mũi giày 12 mm)\n\nĐế ngoài công nghệ Stretchweb làm từ cao su Continental™\n\nMàu sản phẩm: Cloud White / Scarlet / Royal Blue\n\nMã sản phẩm: EG0712\n\nBảo quản\nSử dụng nước dưới 35 độ để giặt sản phẩm\n\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\n\nSử dụng túi giặt bảo quản khi dùng với máy giặt\n\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 1600000, NULL, 8, 'giaynewbalance.jpg', 'giay', 0, 0, '2022-04-27 01:24:50', '2022-04-27 01:24:50'),
(53, 'Giày Adidas Ozweego', 16, 1, '<p>Giày Adidas Ozweego - khả năng nâng đỡ lực chính xác. Mạnh mẽ kiểm soát lực khi chạm đất, thoải mái êm nhẹ trong từng bước chạy. \n\nUltraboost 20 EG0712 chuyên dành cho chạy bộ bởi các đường may được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Thân giày làm bằng vải dệt công nghệ adidas Primeknit ôm trọn bàn chân với thiết kế nâng đỡ để hỗ trợ chuyển động. Đế giữa công nghệ Boost đàn hồi cho khả năng hoàn trả năng lượng đáng kinh ngạc.\n\nCác chi tiết của giày đều đắt giá. Tổng thể màu sắc và thiết kế toát lên được sự sang trọng và năng động. Mẫu giày rất phù hợp với quần thể thao, jeans hoặc chất kaki.\n\nThông số kỹ thuật\nVừa vặn như một đôi tất\n\nCó dây buộc\n\nVị trí sợi quang được thiết kế riêng có khóa vừa vặn\n\nThiết kế ôm chân cố định với công nghệ Tailored Fibre Placement\n\nGiày chạy hiệu năng cao\n\nĐế giữa công nghệ Boost đàn hồi\n\nTrọng lượng: 10,9 ounce (cỡ US 9)\n\nChênh lệch độ cao đế giữa: 10 mm (gót giày 22 mm / mũi giày 12 mm)\n\nĐế ngoài công nghệ Stretchweb làm từ cao su Continental™\n\nMàu sản phẩm: Cloud White / Scarlet / Royal Blue\n\nMã sản phẩm: EG0712\n\nBảo quản\nSử dụng nước dưới 35 độ để giặt sản phẩm\n\nKhông sử dụng thuốc tẩy hoặc bột giặt có độ tẩy cao\n\nSử dụng túi giặt bảo quản khi dùng với máy giặt\n\nTránh phơi dưới ánh nắng trực tiếp để bảo quản màu sắc</p>', 1300000, NULL, 11, 'giayadidasOzweego.jpg', 'giay', 0, 0, '2022-04-27 01:28:23', '2022-04-27 01:28:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(10) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `link`, `image`) VALUES
(1, '', 'image-14.jpg'),
(2, '', 'image-33.jpg'),
(3, '', 'image-13.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `users_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delet` int(11) NOT NULL COMMENT '0:hien,1:an',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `users_name`, `email`, `password`, `phone`, `address`, `image`, `Delet`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đoàn Linh', 'DoanLinh', 'doanlinh@gmail.com', '$2y$10$qwkACRebVrq1PxDhpFQTUeof.5.Qr1lVayiJrXx8NgfLYdoWQH4m6', '01628470872', 'Đa Lộc- Ân Thi-Hưng Yên', '', 0, NULL, '2019-04-14 22:16:56', '2019-04-14 22:16:56'),
(5, 'DoanThiLinh', 'LinhD', 'vinh@gmail.com', '$2y$10$9nFyWml4BRW1seMuzicLqOz9/EP5BeHSi9j.TxR.vdR.GEVB6VaIi', '983715373', 'Ân Thi', '', 1, NULL, '2019-05-09 06:50:25', '2019-05-08 23:50:25'),
(7, 'Đoàn Thị Thùy Linh', 'LinhDoan', 'doanlinh101998@gmail.com', '$2y$10$TE8Q0ak2lz3W7.pWUQMW7.Li5O7KkGFwlI/ci8McxtPtKpLkWybbK', '0983017992', 'Đa Lộc -Ân Thi-Hưng Yên', '', 0, NULL, '2019-04-22 01:52:34', '2019-04-22 01:52:34'),
(8, 'Đoàn Thị Linh', 'Linh', 'doanlinh1098@gmail.com', '$2y$10$E2tUqHVotdoL8T9d2DhBlepbHod5zuTTVYVafvLl1caMG2t67NYrS', '0983017991', 'Bình Nguyên-Đa Lộc-Ân Thi-Hưng Yên', '', 0, 'bWKdka3a0UR3Qu8Iu2wGYZrqafQnlzhk9O82dcsUlILBO0vIXS0zvog62m51', '2019-05-08 08:36:19', '2019-05-04 22:23:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills_ban`
--
ALTER TABLE `bills_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills_nhap`
--
ALTER TABLE `bills_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_detail_ban`
--
ALTER TABLE `bill_detail_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_detail_nhap`
--
ALTER TABLE `bill_detail_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenloai` (`tenloai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id_phan_hoi`);

--
-- Chỉ mục cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `full_name` (`full_name`),
  ADD UNIQUE KEY `users_name` (`users_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills_ban`
--
ALTER TABLE `bills_ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `bills_nhap`
--
ALTER TABLE `bills_nhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill_detail_ban`
--
ALTER TABLE `bill_detail_ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `bill_detail_nhap`
--
ALTER TABLE `bill_detail_nhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id_phan_hoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
