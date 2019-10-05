SELECT date_created, date_modified, date_pending
FROM tb_ticket A
INNER JOIN tb_my_faedah_bangunan B ON A.id_bangunan = B.id_bangunan
where A.date_pending != B.date_modified 

UPDATE tb_ticket A
INNER JOIN tb_aktivasi_agent B ON A.id_agent = B.id_agent
SET date_pending = date_modified
where date_pending != date_modified