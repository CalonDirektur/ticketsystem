SELECT *,
  tb_my_hajat_renovasi.nama_konsumen as nama_konsumen_renovasi,
  tb_my_hajat_sewa.nama_konsumen as nama_konsumen_sewa,
  tb_my_hajat_wedding.nama_konsumen as nama_konsumen_wedding,
  tb_my_hajat_franchise.nama_konsumen as nama_konsumen_franchise,
  tb_my_hajat_lainnya.nama_konsumen as nama_konsumen_lainnya,
  
  tb_my_hajat_renovasi.jenis_konsumen as jenis_konsumen_renovasi,
  tb_my_hajat_sewa.jenis_konsumen as jenis_konsumen_sewa,
  tb_my_hajat_wedding.jenis_konsumen as jenis_konsumen_wedding,
  tb_my_hajat_franchise.jenis_konsumen as jenis_konsumen_franchise,
  tb_my_hajat_lainnya.jenis_konsumen as jenis_konsumen_lainnya,
CASE
    WHEN tb_my_hajat.id_renovasi IS NOT NULL THEN "My Hajat Renovasi"
    WHEN tb_my_hajat.id_sewa IS NOT NULL THEN "My Hajat Sewa"
    WHEN tb_my_hajat.id_wedding IS NOT NULL THEN "My Hajat Wedding"
    WHEN tb_my_hajat.id_franchise IS NOT NULL THEN "My Hajat Franchise"
    WHEN tb_my_hajat.id_myhajat_lainnya IS NOT NULL THEN "My Hajat Lainnya"
END AS produk

FROM tb_my_hajat

LEFT JOIN tb_my_hajat_renovasi
ON tb_my_hajat.id_renovasi = tb_my_hajat_renovasi.id_renovasi

LEFT JOIN tb_my_hajat_sewa
ON tb_my_hajat.id_sewa = tb_my_hajat_sewa.id_sewa

LEFT JOIN tb_my_hajat_wedding
ON tb_my_hajat.id_wedding = tb_my_hajat_wedding.id_wedding

LEFT JOIN tb_my_hajat_franchise
ON tb_my_hajat.id_franchise = tb_my_hajat_franchise.id_franchise

LEFT JOIN tb_my_hajat_lainnya
ON tb_my_hajat.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya
