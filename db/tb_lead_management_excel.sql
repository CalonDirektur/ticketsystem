SELECT 
    asal_leads,
     C.nama_cabang as nama_cabang_tujuan,
     surveyor,
     ttd_pic,
     lead_id,
     no_ktp,
     nama_konsumen,
     sumber_lead,
     nama_pemberi_lead,
     produk,
     object_price,
     informasi_tambahan,
     date_created,
     date_modified,
     A.id_cabang,
     B.nama_cabang, 
     D.name

FROM tb_lead_management A
INNER JOIN tb_cabang B ON B.id_cabang = A.id_cabang
LEFT JOIN tb_cabang C ON A.cabang_tujuan = C.id_cabang
LEFT JOIN user D ON D.id_user = A.id_user
