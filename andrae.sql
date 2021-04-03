-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 05:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andrae`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` int(11) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `book_cover` longtext NOT NULL,
  `book` longtext NOT NULL,
  `description` longtext NOT NULL,
  `price` int(200) NOT NULL,
  `free` int(11) NOT NULL,
  `ispublished` varchar(200) NOT NULL,
  `published_date` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `createddate` varchar(200) NOT NULL,
  `staus` varchar(200) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `bookname`, `book_cover`, `book`, `description`, `price`, `free`, `ispublished`, `published_date`, `author`, `publisher`, `category`, `createddate`, `staus`, `added_by`, `phone`) VALUES
(9, 'harry potter', 'admin/pages/forms/uploads/download.jpg', 'admin/pages/forms/uploads/booksbeginners_python_cheat_sheet_pcc_all.pdf', 'dfg dfgv', 10, 1, '0', '20/03/20', 'deva', 'tmg', 'Science fiction', '2021/03/14', 'HIDE', 'devahari.k@gmail.com', ''),
(10, 'dummies', 'admin/pages/forms/uploads/download (1).jpg', 'admin/pages/forms/uploads/booksabc.pdf', 'rdac asvh ', 15, 0, '0', '20/03/20', 'deva', 'tmg', 'Thriller', '2021/03/16', 'HIDE', 'devahari.k@gmail.com', ''),
(16, 'dummies', 'admin/pages/forms/uploads/1616113891Dummy.jpg@@admin/pages/forms/uploads/1616113891120-min.jpg@@admin/pages/forms/uploads/img-1.png', '', 'hgvhgv', 95, 0, '', '20/03/20', 'deva', 'tmg', 'Romance', '2021/03/19', 'HIDE', 'devahari.k@gmail.com', ''),
(28, 'The Alchemist', 'admin/pages/forms/uploads/1616925116Books.jpg', '', 'sdfcs sdrfgv', 0, 0, '', '25/03/2021', 'Paulo Coelho', 'gcvgh', 'Thriller', '2021/03/28', 'HIDE', 'devahari.k@gmail.com', ''),
(29, 'everything', 'uploads/146c0b36-4d4e-45b4-82fd-fedcedb9c5b7.png', '', 'sdr ddfhb', 100, 0, '', '20/03/2021', 'deva', 'tmg', 'Thriller', '2021/03/28', 'ACTIVE', 'ADMIN', ''),
(30, 'dfg', 'uploads/Dummy - Copy.jpg', '', 'fdgvbd', 100, 0, '', '29/03/2021', 'fg', 'tmg', 'Science fiction', '2021/03/28', 'HIDE', 'ADMIN', ''),
(31, 'dummies', 'admin/pages/forms/uploads/1617058235download.jpg', '', 'fxgh', 34, 0, '', '20/03/2021', 'deva', 'tmg', 'Romance', '2021/03/30', 'HIDE', 'devahari.k@gmail.com', ''),
(32, 'harry potter', 'admin/pages/forms/uploads/1617058471download.jpg', '', 'bhb', 62, 0, '', '20/03/2021', 'deva', 'tmg', 'Romance', '2021/03/30', 'HIDE', 'devahari.k@gmail.com', '(860) 886-4726'),
(33, 'harry potter', 'admin/pages/forms/uploads/1617058546download.jpg', '', 'bhb', 62, 0, '', '20/03/2021', 'deva', 'tmg', 'Romance', '2021/03/30', 'HIDE', 'devahari.k@gmail.com', '(860) 886-4726');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `genre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `genre`) VALUES
(1, 'Romance'),
(2, 'Thriller'),
(3, 'Science fiction'),
(24, 'Love'),
(25, 'English language'),
(26, 'English language');

-- --------------------------------------------------------

--
-- Table structure for table `interestlist`
--

CREATE TABLE `interestlist` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `interestedby` varchar(100) NOT NULL,
  `createddate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interestlist`
--

INSERT INTO `interestlist` (`id`, `bookid`, `interestedby`, `createddate`) VALUES
(9, 9, 'devahari.k@gmail.com', '2021/03/27');

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `id` int(10) NOT NULL,
  `faq` longtext NOT NULL,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`id`, `faq`, `about`, `contact`) VALUES
(1, 'PGgyIHN0eWxlPSJtYXJnaW46IDBweCAwcHggMTBweDsgcGFkZGluZzogMHB4OyBmb250LXdlaWdodDogNDAwOyBmb250LWZhbWlseTogRGF1cGhpblBsYWluOyBmb250LXNpemU6IDI0cHg7IGxpbmUtaGVpZ2h0OiAyNHB4OyI+V2hhdCBpcyBMb3JlbSBJcHN1bT88L2gyPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4IDBweCAxNXB4OyBwYWRkaW5nOiAwcHg7Ij48c3Ryb25nIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyI+TG9yZW0gSXBzdW08L3N0cm9uZz4mIzE2MDtpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkncyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW08L3A+', 'PGgyIHN0eWxlPSJtYXJnaW46IDBweCAwcHggMTBweDsgcGFkZGluZzogMHB4OyBmb250LXdlaWdodDogNDAwOyBmb250LWZhbWlseTogRGF1cGhpblBsYWluOyBmb250LXNpemU6IDI0cHg7IGxpbmUtaGVpZ2h0OiAyNHB4OyI+V2hhdCBpcyBMb3JlbSBJcHN1bT88L2gyPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4IDBweCAxNXB4OyBwYWRkaW5nOiAwcHg7IHRleHQtYWxpZ246IGp1c3RpZnk7Ij48c3Ryb25nIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyI+TG9yZW0gSXBzdW08L3N0cm9uZz4mIzE2MDtpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkncyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW08L3A+', 'PGgyIHN0eWxlPSJtYXJnaW46IDBweCAwcHggMTBweDsgcGFkZGluZzogMHB4OyBmb250LXdlaWdodDogNDAwOyBmb250LWZhbWlseTogRGF1cGhpblBsYWluOyBmb250LXNpemU6IDI0cHg7IGxpbmUtaGVpZ2h0OiAyNHB4OyI+V2hhdCBpcyBMb3JlbSBJcHN1bT88L2gyPg0KPHAgc3R5bGU9Im1hcmdpbjogMHB4IDBweCAxNXB4OyBwYWRkaW5nOiAwcHg7IHRleHQtYWxpZ246IGp1c3RpZnk7Ij48c3Ryb25nIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyI+TG9yZW0gSXBzdW08L3N0cm9uZz4mIzE2MDtpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkncyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW08L3A+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `createddate` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `createddate`, `phone`) VALUES
(1, 'devahari', 'devahari.k@gmail.com', '12345', '', ''),
(5, 'clark', 'clark@gmail.com', '123', '2021/03/30', '(860) 886-4726');

-- --------------------------------------------------------

--
-- Table structure for table `whishlist`
--

CREATE TABLE `whishlist` (
  `id` int(10) NOT NULL,
  `bookid` varchar(250) NOT NULL,
  `whishedby` varchar(20) NOT NULL,
  `createddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whishlist`
--

INSERT INTO `whishlist` (`id`, `bookid`, `whishedby`, `createddate`) VALUES
(10, '11', 'devahari.k@gmail.com', '2021/03/25'),
(13, '29', 'devahari.k@gmail.com', '2021/03/30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interestlist`
--
ALTER TABLE `interestlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whishlist`
--
ALTER TABLE `whishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `interestlist`
--
ALTER TABLE `interestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whishlist`
--
ALTER TABLE `whishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
