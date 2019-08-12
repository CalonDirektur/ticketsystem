SELECT *,

BA.nama_konsumen as nama_konsumen_renovasi,
BB.nama_konsumen as nama_konsumen_sewa,
BC.nama_konsumen as nama_konsumen_wedding,
BD.nama_konsumen as nama_konsumen_franchise,
BE.nama_konsumen as nama_konsumen_lainnya,
C.nama_konsumen as nama_konsumen_mytalim,
D.nama_konsumen as nama_konsumen_mysafar,
E.nama_konsumen as nama_konsumen_aktivasi_agent,
F.nama_konsumen as nama_konsumen_nst,
G.nama_konsumen as nama_konsumen_lead_management,
H.nama_konsumen as nama_konsumen_myihram,
  
-- BA.jenis_konsumen as jenis_konsumen_renovasi,
-- BB.jenis_konsumen as jenis_konsumen_sewa,
-- BC.jenis_konsumen as jenis_konsumen_wedding,
-- BD.jenis_konsumen as jenis_konsumen_franchise,
-- BE.jenis_konsumen as jenis_konsumen_lainnya,
-- C.jenis_konsumen as jenis_konsumen_mytalim,
-- D.jenis_konsumen as jenis_konsumen_mysafar,
-- E.jenis_konsumen as jenis_konsumen_aktivasi_agent,
-- F.jenis_konsumen as jenis_konsumen_nst,
-- G.jenis_konsumen as jenis_konsumen_lead_management,
-- H.jenis_konsumen as jenis_konsumen_myihram,

BA.id_approval as id_approval_renovasi,
BB.id_approval as id_approval_sewa,
BC.id_approval as id_approval_wedding,
BD.id_approval as id_approval_franchise,
BE.id_approval as id_approval_lainnya,
C.id_approval as id_approval_mytalim,
D.id_approval as id_approval_mysafar,
E.id_approval as id_approval_aktivasi_agent,
F.id_approval as id_approval_nst,
G.id_approval as id_approval_lead_management,
H.id_approval as id_approval_myihram,
CASE
  WHEN A.id_renovasi IS NOT NULL THEN "My Hajat Renovasi"
  WHEN A.id_sewa IS NOT NULL THEN "My Hajat Sewa"
  WHEN A.id_wedding IS NOT NULL THEN "My Hajat Wedding"
  WHEN A.id_franchise IS NOT NULL THEN "My Hajat Franchise"
  WHEN A.id_myhajat_lainnya IS NOT NULL THEN "My Hajat Lainnya"
  WHEN A.id_mytalim IS NOT NULL THEN "My Ta'lim"
  WHEN A.id_mysafar IS NOT NULL THEN "My Safar"
  WHEN A.id_agent IS NOT NULL THEN "Aktivasi Agent"
  WHEN A.id_nst IS NOT NULL THEN "NST"
  WHEN A.id_lead IS NOT NULL THEN "Lead Management"
  WHEN A.id_myihram IS NOT NULL THEN "My Ihram"
 END AS produk

FROM tb_ticket as A
LEFT JOIN tb_my_hajat_renovasi as BA
ON A.id_renovasi = BA.id_renovasi

LEFT JOIN tb_my_hajat_sewa as BB
ON A.id_sewa = BB.id_sewa

LEFT JOIN tb_my_hajat_wedding as BC
ON A.id_wedding = BC.id_wedding

LEFT JOIN tb_my_hajat_franchise as BD
ON A.id_franchise = BD.id_franchise

LEFT JOIN tb_my_hajat_lainnya as BE
ON A.id_myhajat_lainnya = BE.id_myhajat_lainnya

LEFT JOIN tb_my_talim as C
ON A.id_mytalim = C.id_mytalim

LEFT JOIN tb_my_safar as D
ON A.id_mysafar = D.id_mysafar

LEFT JOIN tb_aktivasi_agent as E
ON A.id_agent = E.id_agent

LEFT JOIN tb_nst as F
ON A.id_nst = F.id_nst

LEFT JOIN tb_lead_management as G
ON A.id_lead = G.id_lead

LEFT JOIN tb_my_ihram as H
ON A.id_myihram = H.id_myihram

LEFT JOIN user as U
ON U.id_user = A.id_user

LEFT JOIN tb_cabang as CBG
ON CBG.id_cabang = A.id_cabang

WHERE 
(CASE 
  WHEN BA.id_approval IS NOT NULL THEN BA.id_approval IS NOT NULL
  WHEN BB.id_approval IS NOT NULL THEN BB.id_approval IS NOT NULL
  WHEN BC.id_approval IS NOT NULL THEN BC.id_approval IS NOT NULL
  WHEN BD.id_approval IS NOT NULL THEN BD.id_approval IS NOT NULL
  WHEN BE.id_approval IS NOT NULL THEN BE.id_approval IS NOT NULL
  WHEN C.id_approval IS NOT NULL THEN C.id_approval IS NOT NULL
  WHEN D.id_approval IS NOT NULL THEN D.id_approval IS NOT NULL
  WHEN E.id_approval IS NOT NULL THEN E.id_approval IS NOT NULL
  WHEN F.id_approval IS NOT NULL THEN F.id_approval IS NOT NULL
  WHEN G.id_approval IS NOT NULL THEN G.id_approval IS NOT NULL
  WHEN H.id_approval IS NOT NULL THEN H.id_approval IS NOT NULL
END
)
                            

 SELECT *, A.id_ticket as id_ticket,
        BA.nama_konsumen as nama_konsumen_renovasi,
        BB.nama_konsumen as nama_konsumen_sewa,
        BC.nama_konsumen as nama_konsumen_wedding,
        BD.nama_konsumen as nama_konsumen_franchise,
        BE.nama_konsumen as nama_konsumen_lainnya,
        C.nama_konsumen as nama_konsumen_mytalim,
        D.nama_konsumen as nama_konsumen_mysafar,
        E.nama_agent as nama_aktivasi_agent,
        F.nama_konsumen as nama_konsumen_nst,
        G.nama_konsumen as nama_konsumen_lead_management,
        H.nama_konsumen as nama_konsumen_myihram,

        BA.id_approval as id_approval_renovasi,
        BB.id_approval as id_approval_sewa,
        BC.id_approval as id_approval_wedding,
        BD.id_approval as id_approval_franchise,
        BE.id_approval as id_approval_lainnya,
        C.id_approval as id_approval_mytalim,
        D.id_approval as id_approval_mysafar,
        E.id_approval as id_approval_aktivasi_agent,
        F.id_approval as id_approval_nst,
        G.id_approval as id_approval_lead_management,
        H.id_approval as id_approval_myihram,

        BA.date_modified as date_modified_renovasi,
        BB.date_modified as date_modified_sewa,
        BC.date_modified as date_modified_wedding,
        BD.date_modified as date_modified_franchise,
        BE.date_modified as date_modified_lainnya,
        C.date_modified as date_modified_mytalim,
        D.date_modified as date_modified_mysafar,
        E.date_modified as date_modified_aktivasi_agent,
        F.date_modified as date_modified_nst,
        G.date_modified as date_modified_lead_management,
        H.date_modified as date_modified_myihram,
        
        
        CASE
        WHEN A.id_renovasi IS NOT NULL THEN 'My Hajat Renovasi'
        WHEN A.id_sewa IS NOT NULL THEN 'My Hajat Sewa'
        WHEN A.id_wedding IS NOT NULL THEN 'My Hajat Wedding'
        WHEN A.id_franchise IS NOT NULL THEN 'My Hajat Franchise'
        WHEN A.id_myhajat_lainnya IS NOT NULL THEN 'My Hajat Lainnya'
        WHEN A.id_mytalim IS NOT NULL THEN 'My Talim'
        WHEN A.id_mysafar IS NOT NULL THEN 'My Safar'
        WHEN A.id_agent IS NOT NULL THEN 'Aktivasi Agent'
        WHEN A.id_nst IS NOT NULL THEN 'NST'
        WHEN A.id_lead IS NOT NULL THEN 'Lead Management'
        WHEN A.id_myihram IS NOT NULL THEN 'My Ihram'
        END AS produk
        
        FROM tb_ticket as A
        LEFT JOIN tb_my_hajat_renovasi as BA
        ON A.id_renovasi = BA.id_renovasi
        
        LEFT JOIN tb_my_hajat_sewa as BB
        ON A.id_sewa = BB.id_sewa
        
        LEFT JOIN tb_my_hajat_wedding as BC
        ON A.id_wedding = BC.id_wedding
        
        LEFT JOIN tb_my_hajat_franchise as BD
        ON A.id_franchise = BD.id_franchise
        
        LEFT JOIN tb_my_hajat_lainnya as BE
        ON A.id_myhajat_lainnya = BE.id_myhajat_lainnya
        
        LEFT JOIN tb_my_talim as C
        ON A.id_mytalim = C.id_mytalim
        
        LEFT JOIN tb_my_safar as D
        ON A.id_mysafar = D.id_mysafar
        
        LEFT JOIN tb_aktivasi_agent as E
        ON A.id_agent = E.id_agent
        
        LEFT JOIN tb_nst as F
        ON A.id_nst = F.id_nst
        
        LEFT JOIN tb_lead_management as G
        ON A.id_lead = G.id_lead
        
        LEFT JOIN tb_my_ihram as H
        ON A.id_myihram = H.id_myihram
        
        LEFT JOIN user as U
        ON U.id_user = A.id_user
        
        LEFT JOIN tb_cabang as CBG
        ON CBG.id_cabang = A.id_cabang
        
        WHERE U.id_user $id_user  AND
        (CASE 
        WHEN BA.id_approval IS NOT NULL THEN BA.id_approval $id_approval
        WHEN BB.id_approval IS NOT NULL THEN BB.id_approval $id_approval
        WHEN BC.id_approval IS NOT NULL THEN BC.id_approval $id_approval
        WHEN BD.id_approval IS NOT NULL THEN BD.id_approval $id_approval
        WHEN BE.id_approval IS NOT NULL THEN BE.id_approval $id_approval
        WHEN C.id_approval IS NOT NULL THEN C.id_approval $id_approval
        WHEN D.id_approval IS NOT NULL THEN D.id_approval $id_approval
        WHEN E.id_approval IS NOT NULL THEN E.id_approval $id_approval
        WHEN F.id_approval IS NOT NULL THEN F.id_approval $id_approval
        WHEN G.id_approval IS NOT NULL THEN G.id_approval $id_approval
        WHEN H.id_approval IS NOT NULL THEN H.id_approval $id_approval
        END
        )