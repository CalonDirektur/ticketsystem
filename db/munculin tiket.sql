SELECT
        A.id_ticket as id_ticket,
        CASE
        WHEN BA.nama_konsumen IS NOT NULL THEN BA.nama_konsumen
        WHEN BB.nama_konsumen IS NOT NULL THEN BB.nama_konsumen
        WHEN BC.nama_konsumen IS NOT NULL THEN BC.nama_konsumen
        WHEN BD.nama_konsumen IS NOT NULL THEN BD.nama_konsumen
        WHEN BE.nama_konsumen IS NOT NULL THEN BE.nama_konsumen
        WHEN C.nama_konsumen IS NOT NULL THEN C.nama_konsumen
        WHEN D.nama_konsumen IS NOT NULL THEN D.nama_konsumen
        WHEN E.nama_agent IS NOT NULL THEN E.nama_agent
        WHEN F.nama_konsumen IS NOT NULL THEN F.nama_konsumen
        WHEN G.nama_konsumen IS NOT NULL THEN G.nama_konsumen
        WHEN H.nama_konsumen IS NOT NULL THEN H.nama_konsumen
        WHEN I.nama_mitra IS NOT NULL THEN I.nama_mitra
        WHEN J.nama_konsumen IS NOT NULL THEN J.nama_konsumen
        WHEN JA.nama_konsumen IS NOT NULL THEN JA.nama_konsumen
        WHEN JB.nama_konsumen IS NOT NULL THEN JB.nama_konsumen
        WHEN JC.nama_konsumen IS NOT NULL THEN JC.nama_konsumen
        WHEN JD.nama_konsumen IS NOT NULL THEN JD.nama_konsumen
        WHEN JE.nama_konsumen IS NOT NULL THEN JE.nama_konsumen
        WHEN K.nama_konsumen IS NOT NULL THEN K.nama_konsumen
        END AS nama_konsumen,
        
        CASE
        WHEN BA.jenis_konsumen IS NOT NULL THEN BA.jenis_konsumen
        WHEN BB.jenis_konsumen IS NOT NULL THEN BB.jenis_konsumen
        WHEN BC.jenis_konsumen IS NOT NULL THEN BC.jenis_konsumen
        WHEN BD.jenis_konsumen IS NOT NULL THEN BD.jenis_konsumen
        WHEN BE.jenis_konsumen IS NOT NULL THEN BE.jenis_konsumen
        WHEN C.jenis_konsumen IS NOT NULL THEN C.jenis_konsumen
        WHEN D.jenis_konsumen IS NOT NULL THEN D.jenis_konsumen
        WHEN E.jenis_agent IS NOT NULL THEN E.jenis_agent
        WHEN F.jenis_konsumen IS NOT NULL THEN F.jenis_konsumen
        WHEN G.jenis_konsumen IS NOT NULL THEN G.jenis_konsumen
        WHEN H.jenis_konsumen IS NOT NULL THEN H.jenis_konsumen
        WHEN I.jenis_mitra IS NOT NULL THEN I.jenis_mitra
        WHEN J.jenis_konsumen IS NOT NULL THEN J.jenis_konsumen
        WHEN JA.jenis_konsumen IS NOT NULL THEN JA.jenis_konsumen
        WHEN JB.jenis_konsumen IS NOT NULL THEN JB.jenis_konsumen
        WHEN JC.jenis_konsumen IS NOT NULL THEN JC.jenis_konsumen
        WHEN JD.jenis_konsumen IS NOT NULL THEN JD.jenis_konsumen
        WHEN JE.jenis_konsumen IS NOT NULL THEN JE.jenis_konsumen
        WHEN K.jenis_konsumen IS NOT NULL THEN K.jenis_konsumen
        END AS jenis_konsumen,
        
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
        WHEN A.id_mitra_kerjasama IS NOT NULL THEN 'Mitra Kerja sama'
        WHEN A.id_myfaedah IS NOT NULL THEN 'My Faedah'
        WHEN A.id_bangunan IS NOT NULL THEN 'My Faedah Bangunan'
        WHEN A.id_elektronik IS NOT NULL THEN 'My Faedah Elektronik'
        WHEN A.id_qurban IS NOT NULL THEN 'My Faedah Qurban'
        WHEN A.id_modal IS NOT NULL THEN 'My Faedah Modal'
        WHEN A.id_myfaedah_lainnya IS NOT NULL THEN 'My Faedah Lainnya'
        WHEN A.id_mycars IS NOT NULL THEN 'My Cars'
        END AS produk,

        (CASE
        WHEN BA.date_created IS NOT NULL THEN  DATE_FORMAT(BA.date_created, '%d %M %Y %H:%i:%s')
        WHEN BB.date_created IS NOT NULL THEN  DATE_FORMAT(BB.date_created, '%d %M %Y %H:%i:%s')
        WHEN BC.date_created IS NOT NULL THEN  DATE_FORMAT(BC.date_created, '%d %M %Y %H:%i:%s')
        WHEN BD.date_created IS NOT NULL THEN  DATE_FORMAT(BD.date_created, '%d %M %Y %H:%i:%s')
        WHEN BE.date_created IS NOT NULL THEN  DATE_FORMAT(BE.date_created, '%d %M %Y %H:%i:%s')
        WHEN C.date_created IS NOT NULL THEN  DATE_FORMAT(C.date_created, '%d %M %Y %H:%i:%s')
        WHEN D.date_created IS NOT NULL THEN  DATE_FORMAT(D.date_created, '%d %M %Y %H:%i:%s')
        WHEN E.date_created IS NOT NULL THEN  DATE_FORMAT(E.date_created, '%d %M %Y %H:%i:%s')
        WHEN F.date_created IS NOT NULL THEN  DATE_FORMAT(F.date_created, '%d %M %Y %H:%i:%s')
        WHEN G.date_created IS NOT NULL THEN  DATE_FORMAT(G.date_created, '%d %M %Y %H:%i:%s')
        WHEN H.date_created IS NOT NULL THEN  DATE_FORMAT(H.date_created, '%d %M %Y %H:%i:%s')
        WHEN I.date_created IS NOT NULL THEN  DATE_FORMAT(I.date_created, '%d %M %Y %H:%i:%s')
        WHEN J.date_created IS NOT NULL THEN  DATE_FORMAT(J.date_created, '%d %M %Y %H:%i:%s')
        WHEN JA.date_created IS NOT NULL THEN  DATE_FORMAT(JA.date_created, '%d %M %Y %H:%i:%s')
        WHEN JB.date_created IS NOT NULL THEN  DATE_FORMAT(JB.date_created, '%d %M %Y %H:%i:%s')
        WHEN JC.date_created IS NOT NULL THEN  DATE_FORMAT(JC.date_created, '%d %M %Y %H:%i:%s')
        WHEN JD.date_created IS NOT NULL THEN  DATE_FORMAT(JD.date_created, '%d %M %Y %H:%i:%s')
        WHEN JE.date_created IS NOT NULL THEN  DATE_FORMAT(JE.date_created, '%d %M %Y %H:%i:%s')
        WHEN K.date_created IS NOT NULL THEN  DATE_FORMAT(K.date_created, '%d %M %Y %H:%i:%s')
        END) AS date_created,

         (CASE
        WHEN BA.date_modified IS NOT NULL THEN  DATE_FORMAT(BA.date_modified, '%d %M %Y %H:%i:%s')
        WHEN BB.date_modified IS NOT NULL THEN  DATE_FORMAT(BB.date_modified, '%d %M %Y %H:%i:%s')
        WHEN BC.date_modified IS NOT NULL THEN  DATE_FORMAT(BC.date_modified, '%d %M %Y %H:%i:%s')
        WHEN BD.date_modified IS NOT NULL THEN  DATE_FORMAT(BD.date_modified, '%d %M %Y %H:%i:%s')
        WHEN BE.date_modified IS NOT NULL THEN  DATE_FORMAT(BE.date_modified, '%d %M %Y %H:%i:%s')
        WHEN C.date_modified IS NOT NULL THEN  DATE_FORMAT(C.date_modified, '%d %M %Y %H:%i:%s')
        WHEN D.date_modified IS NOT NULL THEN  DATE_FORMAT(D.date_modified, '%d %M %Y %H:%i:%s')
        WHEN E.date_modified IS NOT NULL THEN  DATE_FORMAT(E.date_modified, '%d %M %Y %H:%i:%s')
        WHEN F.date_modified IS NOT NULL THEN  DATE_FORMAT(F.date_modified, '%d %M %Y %H:%i:%s')
        WHEN G.date_modified IS NOT NULL THEN  DATE_FORMAT(G.date_modified, '%d %M %Y %H:%i:%s')
        WHEN H.date_modified IS NOT NULL THEN  DATE_FORMAT(H.date_modified, '%d %M %Y %H:%i:%s')
        WHEN I.date_modified IS NOT NULL THEN  DATE_FORMAT(I.date_modified, '%d %M %Y %H:%i:%s')
        WHEN J.date_modified IS NOT NULL THEN  DATE_FORMAT(J.date_modified, '%d %M %Y %H:%i:%s')
        WHEN JA.date_modified IS NOT NULL THEN  DATE_FORMAT(JA.date_modified, '%d %M %Y %H:%i:%s')
        WHEN JB.date_modified IS NOT NULL THEN  DATE_FORMAT(JB.date_modified, '%d %M %Y %H:%i:%s')
        WHEN JC.date_modified IS NOT NULL THEN  DATE_FORMAT(JC.date_modified, '%d %M %Y %H:%i:%s')
        WHEN JD.date_modified IS NOT NULL THEN  DATE_FORMAT(JD.date_modified, '%d %M %Y %H:%i:%s')
        WHEN JE.date_modified IS NOT NULL THEN  DATE_FORMAT(JE.date_modified, '%d %M %Y %H:%i:%s')
        WHEN K.date_modified IS NOT NULL THEN  DATE_FORMAT(K.date_modified, '%d %M %Y %H:%i:%s')
        END) AS date_modified,

        DATE_FORMAT(date_pending, '%d %M %Y %H:%i:%s') as tanggal_pending, DATE_FORMAT(date_inprogress, '%d %M %Y %H:%i:%s') as tanggal_inprogress, DATE_FORMAT(date_rejected, '%d %M %Y %H:%i:%s') as tanggal_rejected, DATE_FORMAT(date_completed, '%d %M %Y %H:%i:%s') as tanggal_completed
        
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

        LEFT JOIN tb_mitra_kerjasama as I
        ON A.id_mitra_kerjasama = I.id_mitra_kerjasama

        LEFT JOIN tb_my_faedah as J
        ON A.id_myfaedah = J.id_myfaedah

        LEFT JOIN tb_my_faedah_bangunan as JA
        ON A.id_bangunan = JA.id_bangunan

        LEFT JOIN tb_my_faedah_elektronik as JB
        ON A.id_elektronik = JB.id_elektronik

        LEFT JOIN tb_my_faedah_qurban as JC
        ON A.id_qurban = JC.id_qurban

        LEFT JOIN tb_my_faedah_modal as JD
        ON A.id_modal = JD.id_modal

        LEFT JOIN tb_my_faedah_lainnya as JE
        ON A.id_myfaedah_lainnya = JE.id_myfaedah_lainnya

        LEFT JOIN tb_my_cars as K
        ON A.id_mycars = K.id_mycars
        
        LEFT JOIN user as U
        ON U.id_user = A.id_user
        
        LEFT JOIN tb_cabang as CBG
        ON CBG.id_cabang = A.id_cabang
        
        WHERE A.id_lead IS NULL AND
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
            WHEN I.id_approval IS NOT NULL THEN I.id_approval IS NOT NULL
            WHEN J.id_approval IS NOT NULL THEN J.id_approval IS NOT NULL
            WHEN JA.id_approval IS NOT NULL THEN JA.id_approval IS NOT NULL
            WHEN JB.id_approval IS NOT NULL THEN JB.id_approval IS NOT NULL
            WHEN JC.id_approval IS NOT NULL THEN JC.id_approval IS NOT NULL
            WHEN JD.id_approval IS NOT NULL THEN JD.id_approval IS NOT NULL
            WHEN JE.id_approval IS NOT NULL THEN JE.id_approval IS NOT NULL
            WHEN K.id_approval IS NOT NULL THEN K.id_approval IS NOT NULL
        END
        )