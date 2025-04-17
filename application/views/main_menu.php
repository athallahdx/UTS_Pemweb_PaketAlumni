<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tracer Alumni</title>
	<link rel="stylesheet" href="<?= config_item('tailwind'); ?>">
</head>
<body class="bg-gray-100">

<!-- Main container -->
<div class="flex flex-col items-center p-8 space-y-6">

	<!-- Header -->
	<div class="header text-4xl font-semibold text-center text-blue-600">
		Sistem Informasi Mahasiswa dan Alumni
	</div>

	<!-- Description -->
	<div class="description text-lg text-center text-gray-700">
		Selamat datang di sistem informasi mahasiswa dan alumni. Silakan pilih menu yang tersedia untuk mengelola data mahasiswa dan alumni.
	</div>

	<!-- Main Menu -->
	<div class="main-menu grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">

		<!-- Menu Item: Mahasiswa -->
		<div class="menu-item bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
			<a href="<?= site_url('Mahasiswa/index'); ?>" class="menu-link block text-center p-6 text-2xl font-medium text-blue-500 hover:text-blue-700">
				Kelola Data Mahasiswa
			</a>
		</div>

		<!-- Menu Item: Alumni -->
		<div class="menu-item bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
			<a href="<?= site_url('Alumni/index'); ?>" class="menu-link block text-center p-6 text-2xl font-medium text-blue-500 hover:text-blue-700">
				Dashboard Data Alumni
			</a>
		</div>

	</div>

</div>

</body>
</html>
