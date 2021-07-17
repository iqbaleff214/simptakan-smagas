create table if not exists akun
(
	id_akun int auto_increment
		primary key,
	username varchar(255) not null,
	password varchar(255) not null,
	peran enum('kepala', 'petugas', 'anggota') not null,
	status int default 1 null
);

insert into akun (username, password, peran) values ('admin', '$2y$10$y.W/LCQwfvzkJLctOhlrJ.XeRa3BYH1zkdQFqwfW8ME8UMVSZVnCi', 'kepala');

create table if not exists buku
(
	id_buku int auto_increment
		primary key,
	judul varchar(255) not null,
	isbn char(13) null,
	pengarang varchar(255) null,
	tahun int(4) null,
	id_rak int null,
	id_kategori int null,
	kode_klasifikasi int null,
	id_penerbit int null,
	jumlah int null,
	foto varchar(255) null,
	tanggal datetime default CURRENT_TIMESTAMP null
);

create table if not exists buku_keluar
(
	id_pengeluaran int auto_increment
		primary key,
	tanggal datetime default CURRENT_TIMESTAMP null,
	id_buku int null,
	jumlah int null,
	keterangan varchar(255) null
);

create trigger buku_keluar
	after insert
	on buku_keluar
	for each row
	UPDATE buku SET buku.jumlah=buku.jumlah-NEW.jumlah
    WHERE buku.id_buku=NEW.id_buku;

create table if not exists ebook
(
	id_ebook int auto_increment
		primary key,
	judul varchar(255) null,
	isbn char(13) null,
	pengarang varchar(255) null,
	tahun int(4) null,
	foto varchar(255) null,
	berkas varchar(255) not null,
	tanggal datetime default CURRENT_TIMESTAMP null
);

create table if not exists kategori
(
	id_kategori int auto_increment
		primary key,
	kategori varchar(50) not null,
	keterangan varchar(255) null
);

create table if not exists klasifikasi
(
	kode_klasifikasi char(4) not null
		primary key,
	klasifikasi varchar(50) not null,
	keterangan varchar(255) null
);

create table if not exists peminjaman
(
	no_peminjaman int auto_increment
		primary key,
	nis varchar(15) null,
	nama int null,
	tanggal_pinjam datetime default CURRENT_TIMESTAMP null,
	tanggal_tenggat datetime null,
	keterangan varchar(255) null
);

create table if not exists peminjaman_detail
(
	id_peminjaman int auto_increment
		primary key,
	no_peminjaman int not null,
	id_buku int not null,
	tanggal_kembali datetime null,
	denda int null
);

create trigger meminjam_buku
	after insert
	on peminjaman_detail
	for each row
	UPDATE buku SET buku.jumlah=buku.jumlah-1
    WHERE buku.id_buku=NEW.id_buku;

create trigger mengembalikan_buku
	after update
	on peminjaman_detail
	for each row
	UPDATE buku SET buku.jumlah=buku.jumlah+1
    WHERE buku.id_buku=NEW.id_buku;

create table if not exists penerbit
(
	id_penerbit int auto_increment
		primary key,
	penerbit varchar(255) not null,
	alamat varchar(255) null,
	no_telp varchar(15) null,
	keterangan varchar(255) null
);

create table if not exists pengadaan
(
	id_pengadaan int auto_increment
		primary key,
	tanggal datetime default CURRENT_TIMESTAMP null,
	sumber varchar(50) null,
	pemasok varchar(255) null,
	keterangan varchar(255) null
);

create table if not exists pengadaan_detail
(
	id_pengadaan_detail int auto_increment
		primary key,
	id_pengadaan int null,
	id_buku int null,
	jumlah int null,
	harga int null
);

create table if not exists pengunjung
(
	id_pengunjung int auto_increment
		primary key,
	tanggal timestamp default CURRENT_TIMESTAMP null,
	nis varchar(15) null,
	nama varchar(50) null,
	kelas varchar(15) null,
	keperluan varchar(255) null
);

create table if not exists petugas
(
	id_petugas int auto_increment
		primary key,
	nama varchar(50) not null,
	nip varchar(50) null,
	jenis_kelamin enum('L', 'P') null,
	no_telp varchar(15) null,
	alamat varchar(255) null,
	jabatan enum('Kepala', 'Petugas') not null,
	foto varchar(255) null,
	id_akun int not null
);

insert into petugas (nama, jenis_kelamin, jabatan, id_akun) values ('Kepala Perpus', 'L', 'Kepala', 1)

create table if not exists rak
(
	id_rak int auto_increment
		primary key,
	rak varchar(50) not null,
	keterangan varchar(255) null
);

create table if not exists siswa
(
	tanggal datetime default CURRENT_TIMESTAMP null,
	nis varchar(15) not null,
	nama varchar(255) not null,
	jenis_kelamin enum('L', 'P') not null,
	kelas varchar(15) not null,
	alamat varchar(255) null,
	email varchar(50) null,
	foto varchar(255) null,
	id_akun int null,
	constraint siswa_nis_uindex
		unique (nis)
);


alter table siswa
	add primary key (nis);

