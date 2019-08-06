SELECT

  B.nama_konsumen as nama_konsumen_renovasi,
  C.nama_konsumen as nama_konsumen_sewa,
  D.nama_konsumen as nama_konsumen_wedding,
  E.nama_konsumen as nama_konsumen_franchise,
  F.nama_konsumen as nama_konsumen_lainnya,
  
  B.jenis_konsumen as jenis_konsumen_renovasi,
  C.jenis_konsumen as jenis_konsumen_sewa,
  D.jenis_konsumen as jenis_konsumen_wedding,
  E.jenis_konsumen as jenis_konsumen_franchise,
  F.jenis_konsumen as jenis_konsumen_lainnya,

CASE
    WHEN A.id_renovasi IS NOT NULL THEN "My Hajat Renovasi"
    WHEN A.id_sewa IS NOT NULL THEN "My Hajat Sewa"
    WHEN A.id_wedding IS NOT NULL THEN "My Hajat Wedding"
    WHEN A.id_franchise IS NOT NULL THEN "My Hajat Franchise"
    WHEN A.id_myhajat_lainnya IS NOT NULL THEN "My Hajat Lainnya"
END AS produk

FROM tb_my_hajat as A

LEFT JOIN tb_my_hajat_renovasi as B
ON A.id_renovasi = B.id_renovasi

LEFT JOIN tb_my_hajat_sewa as C
ON A.id_sewa = C.id_sewa

LEFT JOIN tb_my_hajat_wedding as D
ON A.id_wedding = D.id_wedding

LEFT JOIN tb_my_hajat_franchise as E
ON A.id_franchise = E.id_franchise

LEFT JOIN tb_my_hajat_lainnya as F
ON A.id_myhajat_lainnya = F.id_myhajat_lainnya

LEFT JOIN user as U
ON U.id_user = A.id_user

LEFT JOIN tb_cabang as CBG
ON CBG.id_cabang = A.id_cabang



-- SELECT * FROM USER
-- WHERE email = '812813' OR nik = '812813'