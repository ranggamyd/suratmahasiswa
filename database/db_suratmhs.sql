-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 03:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `db_suratmhs`
--
-- --------------------------------------------------------
--
-- Table structure for table `dekan`
--
CREATE TABLE `dekan` (
  `nidn` char(15) NOT NULL,
  `nama_dekan` varchar(50) NOT NULL,
  `email` char(50),
  `no_telp` char(15)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `dekan`
--
INSERT INTO
  `dekan` (`nidn`, `nama_dekan`, `email`, `no_telp`)
VALUES
  (
    '03.01.12.164',
    'Nuri Kartini, M.T.,IPM.,AER',
    'dekan@email.com',
    '1234'
  );

-- --------------------------------------------------------
--
-- Table structure for table `format_surat_default`
--
CREATE TABLE `format_surat_default` (
  `id` int(11) NOT NULL,
  `jenis_surat` enum(
    'sak',
    'sc',
    'skl',
    'sokp',
    'spk',
    'spkl',
    'spp',
    'sps'
  ) NOT NULL,
  `template` text NOT NULL,
  `nidn_dekan_default` char(15),
  `perihal_default` text,
  `tahun_ajaran_default` varchar(10)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `format_surat_default`
--
INSERT INTO
  `format_surat_default` (
    `id`,
    `jenis_surat`,
    `template`,
    `nidn_dekan_default`,
    `perihal_default`,
    `tahun_ajaran_default`
  )
VALUES
  (
    1,
    'skl',
    '<!-- SKL --><table style=\"width:100%\"><tr style=\"text-align:center\"><td colspan=\"3\"><b><u>SURAT KETERANGAN LULUS</u></b></td></tr><tr style=\"text-align:center\"><td colspan=\"3\">Nomor : @no_surat</td></tr><tr><td colspan=\"3\"><br>Yang bertanda tangan dibawah ini :</td></tr><tr><td style=\"width:20%\">Nama</td><td style=\"width:0%\">:</td><td style=\"width:80%\">@nama_dekan</td></tr><tr><td>Jabatan</td><td>:</td><td>Dekan Fakultas Teknik</td></tr><tr><td>NIK/NIDN</td><td>:</td><td>@nidn_dekan</td></tr><tr><td colspan=\"3\"><br>Menerangkan dengan sesungguhnya bahwa :</td></tr><tr><td>Nama</td><td>:</td><td>@nama_mhs</td></tr><tr><td>NIM</td><td>:</td><td>@nim_mhs</td></tr><tr style=\"text-align:justify\"><td colspan=\"3\"><br>Telah memenuhi persyaratan akademik dan yang bersangkutan dinyatakan telah melaksanakan sidang akhir untuk menempuh gelar @gelar pada Program Studi @nama_prodi Fakultas Teknik Universitas Muhammadiyah Cirebon pada Tanggal @tgl_lulus dan dinyatakan LULUS, dengan IPK @ipk</td></tr><tr><td colspan=\"3\"><br>Demikian surat keterangan lulus ini dibuat untuk digunakan sebagai @keperluan.</td></tr><tr><td colspan=\"3\"><br>Cirebon, @tgl_surat</td></tr><tr><td colspan=\"3\">Dekan</td></tr><tr><td colspan=\"3\"><br><br><br><br><br><u>@ttd_nama_dekan</u></td></tr><tr><td colspan=\"3\">NIK. @ttd_nidn_dekan</td></tr></table>',
    '1234',
    '',
    ''
  ),
  (
    2,
    'sps',
    '<!-- SPS --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@nama_instansi</b><br>@alamat_instansi<br></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><p style=\"text-align:justify\">Dalam rangka penyusunan skripsi mahasiswa Program Studi @nama_prodi di bawah ini :</p><table border=\"1\" cellspacing=\"0\" width=\"100%\"><tbody><tr><th style=\"padding:.5rem;text-align:center\">NAMA / NIM</th><th style=\"padding:.5rem;text-align:center\">SEMESTER</th><th style=\"padding:.5rem;text-align:center\">PRODI</th></tr><tr><td style=\"padding:.5rem\">@nama_mhs</td><td style=\"padding:.5rem;text-align:center\">@semester</td><td style=\"padding:.5rem;text-align:center\">@nama_prodi_2</td></tr></tbody></table><p>Bermaksud menghadap Bapak/Ibu dan apabila memungkinkan kiranya yang bersangkutan dapat diberikan ijin untuk melakukan observasi dan pengambilan data mahasiswa pada Instansi/Perusahaan yang bapak pimpin, sebagai penunjang untuk penyusunan skripsi.</p><p>Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terima kasih.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td>Cirebon, @tgl_surat<br>Dekan<br><br><br><br><br><u>@ttd_nama_dekan</u><br>NIK : @ttd_nidn_dekan</td></tr></tbody></table>',
    '1234',
    'Permohonan Observasi dan Ijin Pengambilan Data',
    ''
  ),
  (
    3,
    'sokp',
    '<!-- SOKP --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@nama_instansi</b><br>@alamat_instansi<br></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><p style=\"text-align:justify\">Dalam rangka menunjang kegiatan perkuliahan pada mata kuliah Sistem Informasi, kami dari Program Studi @nama_prodi Fakultas Teknik Universitas Muhammadiyah Cirebon, dengan hormat mahasiswa kami yang tersebut dibawah ini:</p><table border=\"1\" width=\"100%\"><tbody><tr><th style=\"padding:.5rem;text-align:center\">NAMA / NIM</th><th style=\"padding:.5rem;text-align:center\">PRODI</th></tr><tr><td style=\"padding:.5rem\"><p>@nama_mhs</p></td><td style=\"padding:.5rem;text-align:center\"><p>@nama_prodi_2</p></td></tr></tbody></table><p>Dapat diperkenankan melakukan Observasi Kunjungan pada instansi yang Bapak/Ibu pimpin.</p><p>Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terima kasih.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td>Cirebon, @tgl_surat<br>Dekan<br><br><br><br><br><u>@ttd_nama_dekan</u><br>NIK : @ttd_nidn_dekan</td></tr></tbody></table>',
    '1234',
    'Surat Permohonan Observasi',
    ''
  ),
  (
    4,
    'sak',
    '<!-- SAK --><table style=\"width:100%\"><tr style=\"text-align:center\"><td colspan=\"3\"><b><u>SURAT KETERANGAN KULIAH</u></b></td></tr><tr style=\"text-align:center\"><td colspan=\"3\">Nomor : @no_surat</td></tr><tr><td colspan=\"3\"><br>Yang bertanda tangan dibawah ini :</td></tr><tr><td style=\"width:30%\">Nama</td><td style=\"width:0%\">:</td><td style=\"width:70%\">@nama_dekan</td></tr><tr><td>Jabatan</td><td>:</td><td>Dekan Fakultas Teknik</td></tr><tr><td colspan=\"3\"><br>Dengan ini menerangkan dengan sesungguhnya bahwa :</td></tr><tr><td>Nama</td><td>:</td><td>@nama_mhs</td></tr><tr><td>NIM</td><td>:</td><td>@nim_mhs</td></tr><tr><td colspan=\"3\"><br>Dengan nama orang tua dari mahasiswa tersebut :</td></tr><tr><td>Nama</td><td>:</td><td>@nama_ortu</td></tr><tr><td>NIP/NRP/NIK</td><td>:</td><td>@nip</td></tr><tr><td>Pangkat & Golongan</td><td>:</td><td>@pangkat / @golongan</td></tr><tr><td>Tempat Kerja / Instansi</td><td>:</td><td>@tempat_kerja</td></tr><tr><td>Alamat Rumah</td><td>:</td><td>@alamat_rumah</td></tr><tr><td colspan=\"3\"><br>Adalah benar mahasiswa aktif pada :</td></tr><tr><td>Fakultas</td><td>:</td><td>Teknik</td></tr><tr><td>Program Studi</td><td>:</td><td>@nama_prodi</td></tr><tr><td>Tingkat / Semester</td><td>:</td><td>@tingkat / @semester</td></tr><tr><td>Tahun Ajaran</td><td>:</td><td>@tahun_ajaran</td></tr><tr><td colspan=\"3\"><br>Demikian surat keterangan aktif kuliah ini dibuat dengan sesungguhnya dan untuk dipergunakan sebagaimana mestinya</td></tr><tr><td colspan=\"3\"><br>Cirebon, @tgl_surat</td></tr><tr><td colspan=\"3\">Dekan</td></tr><tr><td colspan=\"3\"><br><br><br><br><br><u>@ttd_nama_dekan</u></td></tr><tr><td colspan=\"3\">NIK. @ttd_nidn_dekan</td></tr></table>',
    '1234',
    '',
    '2023/2024'
  ),
  (
    5,
    'spkl',
    '<!-- SPKL --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@nama_instansi</b><br>@alamat_instansi<br></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><p style=\"text-align:justify\">Dalam rangka menunjang kegiatan perkuliahan pada mata kuliah Sistem Informasi, kami dari Program Studi @nama_prodi Fakultas Teknik Universitas Muhammadiyah Cirebon, dengan hormat mahasiswa kami yang tersebut dibawah ini:</p><table border=\"1\" cellspacing=\"0\" width=\"100%\"><tbody><tr><th style=\"padding:.5rem;text-align:center\">NAMA / NIM</th><th style=\"padding:.5rem;text-align:center\">PRODI</th></tr><tr><td style=\"padding:.5rem\"><p>@nama_mhs</p></td><td style=\"padding:.5rem;text-align:center\"><p>@nama_prodi_2</p></td></tr></tbody></table><p>Dapat diperkenankan melakukan PKL pada instansi yang Bapak/Ibu pimpin.</p><p>Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terima kasih.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p></td></tr><tr style=\"vertical-align:top\"><td></td><td></td><td>Cirebon, @tgl_surat<br>Dekan<br><br><br><br><br><u>@ttd_nama_dekan</u><br>NIK : @ttd_nidn_dekan</td></tr></tbody></table>',
    '1234',
    'Surat Permohonan PKL',
    ''
  ),
  (
    6,
    'sc',
    '<!-- SC --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@tujuan</b><br><b>@instansi</b><br><br>Di Tempat,</td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><table style=\"width:100%\"><tr><td colspan=\"3\">Dengan hormat, Saya yang bertanda tangan di bawah ini :</td></tr><tr><td style=\"width:10%\">Nama</td><td style=\"width:0%\">:</td><td style=\"width:90%\">@nama_kaprodi</td></tr><tr><td>Jabatan</td><td>:</td><td>Kaprodi @nama_prodi</td></tr><tr><td colspan=\"3\"><br>Dengan ini Menerima Pengajuan permohonan Cuti kuliah atas nama:</td></tr><tr><td>Nama</td><td>:</td><td>@nama_mhs</td></tr><tr><td>NIM</td><td>:</td><td>@nim_mhs</td></tr><tr><td>Prodi</td><td>:</td><td>@nama_prodi_2</td></tr><tr><td>Semester</td><td>:</td><td>@semester</td></tr></table><p style=\"text-align:justify\">Demikian Surat ini dibuat agar di tindak lanjuti oleh bagian Akademik dan Keuangan Universitas Muhammadiyah Cirebon. Atas perhatian dan kerjasamanya kami sampaikan terima kasih.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p><br></td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><br>Cirebon, @tgl_surat<br>Kaprodi<br><br><br><br><br><u>@ttd_nama_kaprodi</u><br>NIK : @ttd_nidn_kaprodi</td></tr></tbody></table>',
    '',
    'Permohonan Cuti Kuliah',
    ''
  ),
  (
    7,
    'spk',
    '<!-- SPK --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@tujuan</b><br><b>@instansi</b><br><br>Di Tempat,</td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><table style=\"width:100%\"><tr><td colspan=\"3\">Dengan hormat, Saya yang bertanda tangan di bawah ini :</td></tr><tr><td style=\"width:10%\">Nama</td><td style=\"width:0%\">:</td><td style=\"width:90%\">@nama_kaprodi</td></tr><tr><td>Jabatan</td><td>:</td><td>Kaprodi @nama_prodi</td></tr><tr><td colspan=\"3\"><br>Menindaklanjuti surat permohonan pindah kelas dari mahasiswa berikut:</td></tr><tr><td>Nama</td><td>:</td><td>@nama_mhs</td></tr><tr><td>NIM</td><td>:</td><td>@nim_mhs</td></tr><tr><td>Prodi</td><td>:</td><td>@nama_prodi_2</td></tr></table><p style=\"text-align:justify\">Yang mengajukan pindah kelas dari @kelas_asal ke kelas @kelas_tujuan dengan alasan @alasan, maka dengan ini kami menyatakan persetujuan mahasiswa atas nama tersebut.</p><p style=\"text-align:justify\">Demikian surat persetujuan ini kami sampaikan, agar dapat lanjutkan proses administrasi perpindahan mahasiswa tersebut pada Biro Akademik dan Keuangan.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p><br></td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><br>Cirebon, @tgl_surat<br>Kaprodi<br><br><br><br><br><u>@ttd_nama_kaprodi</u><br>NIK : @ttd_nidn_kaprodi</td></tr></tbody></table>',
    '',
    'Persetujuan Pindah Kelas',
    ''
  ),
  (
    8,
    'spp',
    '<!-- SPP --><table style=\"width:100%\"><tbody><tr><td style=\"width:20%\"><span>No. Surat</span></td><td style=\"width:0%\"><span>:</span></td><td style=\"width:80%\"><span>@no_surat</span></td></tr><tr><td><span>Lampiran</span></td><td><span>:</span></td><td><span>-</span></td></tr><tr><td><span>Perihal</span></td><td><span>:</span></td><td><span>@perihal</span></td></tr><tr style=\"vertical-align:top\"><td><br><span>Kepada</span></td><td><br><span>:</span></td><td><br><span>Yth.</span><br><b>@tujuan</b><br><b>@instansi</b><br><br>Di Tempat,</td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><p><i>Assalamu\'alaikum warahmatullahi wabarakatuh</i></p><p style=\"text-align:justify\">Ba’da salam, semoga kita semua selalu dalam keadaan sehat wal’afiat dan berada dalam lindungan Allah SWT dan sukses dalam menjalankan aktifitas sehari-hari. Aamiin.</p><table style=\"width:100%\"><tr><td colspan=\"3\">Dengan hormat, Saya yang bertanda tangan di bawah ini :</td></tr><tr><td style=\"width:10%\">Nama</td><td style=\"width:0%\">:</td><td style=\"width:90%\">@nama_kaprodi</td></tr><tr><td>Jabatan</td><td>:</td><td>Kaprodi @nama_prodi</td></tr><tr><td colspan=\"3\"><br>Menindaklanjuti surat permohonan pindah prodi dari mahasiswa berikut:</td></tr><tr><td>Nama</td><td>:</td><td>@nama_mhs</td></tr><tr><td>NIM</td><td>:</td><td>@nim_mhs</td></tr><tr><td>Prodi</td><td>:</td><td>@nama_prodi_2</td></tr></table><p style=\"text-align:justify\">Yang mengajukan pindah prodi dari @prodi_asal ke prodi @prodi_tujuan dengan alasan @alasan, maka dengan ini kami menyatakan persetujuan mahasiswa atas nama tersebut.</p><p style=\"text-align:justify\">Demikian surat persetujuan ini kami sampaikan, agar dapat lanjutkan proses administrasi perpindahan mahasiswa tersebut pada Biro Akademik dan Keuangan.</p><p><i>Wassalamu’alaikum warahmatullahi wabarakatuh</i></p><br></td></tr><tr style=\"vertical-align:top\"><td colspan=\"3\"><table style=\"width: 100%\"><tr><td style=\"text-align:center\"><br><br>Mengetahui<br>Dekan<br><br><br><br><br><u>@ttd_nama_dekan</u><br>NIK : @ttd_nidn_dekan</td><td style=\"text-align:center\">Cirebon, @tgl_surat<br><br>Menyetujui<br>Kaprodi<br><br><br><br><br><u>@ttd_nama_kaprodi</u><br>NIDN : @ttd_nidn_kaprodi</td></tr></table></td></tr></tbody></table>',
    '1234',
    'Persetujuan Pindah Prodi',
    ''
  );

-- --------------------------------------------------------
--
-- Table structure for table `kaprodi`
--
CREATE TABLE `kaprodi` (
  `nidn` char(15) NOT NULL,
  `nama_kaprodi` varchar(50) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `email` char(50),
  `no_telp` char(15)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `kaprodi`
--
INSERT INTO
  `kaprodi` (
    `nidn`,
    `nama_kaprodi`,
    `id_prodi`,
    `email`,
    `no_telp`
  )
VALUES
  (
    '0418108101',
    'Budi Susanto, S.Si.,M.Sc',
    1,
    'kaprodi@email.com',
    '1234'
  );

-- --------------------------------------------------------
--
-- Table structure for table `mhs`
--
CREATE TABLE `mhs` (
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `email` char(50) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `nip` char(15) NOT NULL,
  `pangkat` varchar(10) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `tempat_kerja` text NOT NULL,
  `alamat_rumah` text NOT NULL,
  `status` enum('Aktif', 'Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `prodi`
--
CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `gelar_kelulusan` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `prodi`
--
INSERT INTO
  `prodi` (`id`, `nama_prodi`, `gelar_kelulusan`)
VALUES
  (1, 'S1 Teknik Industri', 'Sarjana Teknik (ST)'),
  (
    2,
    'S1 Teknik Informatika',
    'Sarjana Teknik (ST)'
  ),
  (3, 'D3 Teknik Informatika', 'Ahli Madya (Amd)'),
  (4, 'D3 Teknik Informatika', 'Ahli Madya (Amd)');

-- --------------------------------------------------------
--
-- Table structure for table `sak`
--
CREATE TABLE `sak` (
  `id_sak` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `nidn_dekan` char(15) NOT NULL,
  `tgl_surat` date NOT NULL,
  `body_surat` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `sc`
--
CREATE TABLE `sc` (
  `id_sc` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `instansi` text NOT NULL,
  `nidn_kaprodi` char(15) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `body_surat` text NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `skl`
--
CREATE TABLE `skl` (
  `id_skl` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nidn_dekan` char(15) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `ipk` float NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `keperluan` text NOT NULL,
  `body_surat` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `sokp`
--
CREATE TABLE `sokp` (
  `id_sokp` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `body_surat` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `nidn_dekan` char(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `spk`
--
CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `instansi` text NOT NULL,
  `nidn_kaprodi` varchar(15) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `kelas_asal` varchar(15) NOT NULL,
  `kelas_tujuan` varchar(15) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `body_surat` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `spkl`
--
CREATE TABLE `spkl` (
  `id_spkl` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `body_surat` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `nidn_dekan` char(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `spp`
--
CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `instansi` text NOT NULL,
  `nidn_kaprodi` varchar(15) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `prodi_asal` varchar(15) NOT NULL,
  `prodi_tujuan` varchar(15) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `nidn_dekan` char(15) NOT NULL,
  `body_surat` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `sps`
--
CREATE TABLE `sps` (
  `id_sps` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `body_surat` text NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `nidn_dekan` char(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `user`
--
CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator', 'Dekan', 'Kaprodi', 'Mahasiswa') NOT NULL,
  `nidn_dekan` char(15),
  `nidn_kaprodi` char(15),
  `nim_mhs` char(9)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `user`
--
INSERT INTO
  `user` (
    `id`,
    `nama_user`,
    `username`,
    `password`,
    `level`,
    `nidn_dekan`,
    `nidn_kaprodi`,
    `nim_mhs`
  )
VALUES
  (
    1,
    'Myd',
    'admin',
    '21232f297a57a5a743894a0e4a801fc3',
    'Administrator',
    NULL,
    NULL,
    NULL
  ),
  (
    2,
    'Nuri Kartini, M.T.,IPM.,AER',
    '03.01.12.164',
    'e1af5c8686e69573be745563d78a26bb',
    'Dekan',
    '03.01.12.164',
    NULL,
    NULL
  ),
  (
    3,
    'Budi Susanto, S.Si.,M.Sc',
    '0418108101',
    '4ac83fb2875230e5953c879dd60d8c67',
    'Kaprodi',
    NULL,
    '0418108101',
    NULL
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `dekan`
--
ALTER TABLE
  `dekan`
ADD
  PRIMARY KEY (`nidn`);

--
-- Indexes for table `format_surat_default`
--
ALTER TABLE
  `format_surat_default`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE
  `kaprodi`
ADD
  PRIMARY KEY (`nidn`);

--
-- Indexes for table `mhs`
--
ALTER TABLE
  `mhs`
ADD
  PRIMARY KEY (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE
  `prodi`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `sak`
--
ALTER TABLE
  `sak`
ADD
  PRIMARY KEY (`id_sak`);

--
-- Indexes for table `sc`
--
ALTER TABLE
  `sc`
ADD
  PRIMARY KEY (`id_sc`);

--
-- Indexes for table `skl`
--
ALTER TABLE
  `skl`
ADD
  PRIMARY KEY (`id_skl`);

--
-- Indexes for table `sokp`
--
ALTER TABLE
  `sokp`
ADD
  PRIMARY KEY (`id_sokp`);

--
-- Indexes for table `spk`
--
ALTER TABLE
  `spk`
ADD
  PRIMARY KEY (`id_spk`);

--
-- Indexes for table `spkl`
--
ALTER TABLE
  `spkl`
ADD
  PRIMARY KEY (`id_spkl`);

--
-- Indexes for table `spp`
--
ALTER TABLE
  `spp`
ADD
  PRIMARY KEY (`id_spp`);

--
-- Indexes for table `sps`
--
ALTER TABLE
  `sps`
ADD
  PRIMARY KEY (`id_sps`);

--
-- Indexes for table `user`
--
ALTER TABLE
  `user`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `format_surat_default`
--
ALTER TABLE
  `format_surat_default`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE
  `prodi`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sak`
--
ALTER TABLE
  `sak`
MODIFY
  `id_sak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc`
--
ALTER TABLE
  `sc`
MODIFY
  `id_sc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skl`
--
ALTER TABLE
  `skl`
MODIFY
  `id_skl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sokp`
--
ALTER TABLE
  `sokp`
MODIFY
  `id_sokp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE
  `spk`
MODIFY
  `id_spk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spkl`
--
ALTER TABLE
  `spkl`
MODIFY
  `id_spkl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE
  `spp`
MODIFY
  `id_spp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sps`
--
ALTER TABLE
  `sps`
MODIFY
  `id_sps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE
  `user`
MODIFY
  `id` int(5) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;