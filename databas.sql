/* SQLEditor (Generic SQL)*/

CREATE TABLE ki_nang
(
    id INTEGER AUTO_INCREMENT ,
    ki_nang CHAR(255),
    giai_thich CHAR(255),
    nhan_Vien CHAR(255),
    CONSTRAINT ki_nang_pkey PRIMARY KEY (id)
);

CREATE TABLE nha_cung_cap
(
    id INTEGER AUTO_INCREMENT ,
    ten CHAR(255),
    phong_ban CHAR(255),
    dia_chi CHAR(255),
    CONSTRAINT nha_cung_cap_pkey PRIMARY KEY (id)
);

CREATE TABLE du_an
(
    id INTEGER AUTO_INCREMENT ,
    ten CHAR(255),
    nhan_vien INTEGER,
    thanh_pho CHAR(30),
    tieu_bang CHAR(30),
    dan_so INTEGER,
    kinh_phi INTEGER,
    CONSTRAINT du_an_pkey PRIMARY KEY (id)
);

CREATE TABLE phong_ban
(
    id INTEGER AUTO_INCREMENT ,
    ten CHAR(255),
    so_dien_thoai CHAR(10),
    nha_cung_cap CHAR(255),
    CONSTRAINT phong_ban_pkey PRIMARY KEY (id)
);

CREATE TABLE nhan_vien
(
    id INTEGER AUTO_INCREMENT ,
    ho_ten CHAR(40),
    ngay_sinh DATE,
    ngay_cuoi DATE,
    vo_chong INTEGER,
    cong_viec CHAR(100),
    phong_ban INTEGER,
    du_an INTEGER UNIQUE ,
    CONSTRAINT nhan_vien_pkey PRIMARY KEY (id)
);

CREATE TABLE su_dung_ki_nang
(
    id INTEGER AUTO_INCREMENT ,
    ki_nang INTEGER,
    nhan_vien INTEGER,
    du_an INTEGER,
    CONSTRAINT su_dung_ki_nang_pkey PRIMARY KEY (id)
);

ALTER TABLE du_an ADD FOREIGN KEY (nhan_vien) REFERENCES nhan_vien (du_an);

ALTER TABLE nhan_vien ADD FOREIGN KEY (phong_ban) REFERENCES phong_ban (id);

ALTER TABLE su_dung_ki_nang ADD FOREIGN KEY (ki_nang) REFERENCES ki_nang (id);

ALTER TABLE su_dung_ki_nang ADD FOREIGN KEY (nhan_vien) REFERENCES nhan_vien (id);

ALTER TABLE su_dung_ki_nang ADD FOREIGN KEY (du_an) REFERENCES du_an (id);
