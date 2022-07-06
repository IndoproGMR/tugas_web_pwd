drop table if exists DONATUR;

drop table if exists DONATUR_LVL;

drop table if exists FARM;

drop table if exists HUKUMAN;

drop table if exists JENIS_FARM;

drop table if exists PELANGGARAN;

drop table if exists PLAYER;

drop table if exists RULE;

/*==============================================================*/
/* Table: DONATUR                                               */
/*==============================================================*/
create table DONATUR
(
   ID_DONASI            int not null,
   IDDLVL               smallint not null,
   NAME                 varchar(64) not null,
   BULAN                varchar(64) not null,
   JUMLAH_DONASI        bigint not null,
   TGL_DONASI           timestamp not null,
   primary key (ID_DONASI)
);

/*==============================================================*/
/* Table: DONATUR_LVL                                           */
/*==============================================================*/
create table DONATUR_LVL
(
   IDDLVL               smallint not null,
   NAMATINGKATAN        varchar(32) not null,
   DISKRIPSI            varchar(64),
   primary key (IDDLVL)
);

/*==============================================================*/
/* Table: FARM                                                  */
/*==============================================================*/
create table FARM
(
   UUID_FARM            varchar(40) not null,
   NAME                 varchar(64) not null,
   ID_JENIS_FARM        int not null,
   NAMA_FARM            varchar(64) not null,
   DESKRIPSI            text,
   UKURAN               varchar(15) not null,
   WORLD                varchar(64) not null,
   Z                    int not null,
   Y                    int not null,
   PAJAK                bigint not null,
   primary key (UUID_FARM)
);

/*==============================================================*/
/* Table: HUKUMAN                                               */
/*==============================================================*/
create table HUKUMAN
(
   IDHUKUM              smallint not null,
   HUKUMAN              varchar(128) not null,
   DISKRIPSI_HUKUMAN    varchar(128),
   primary key (IDHUKUM)
);

/*==============================================================*/
/* Table: JENIS_FARM                                            */
/*==============================================================*/
create table JENIS_FARM
(
   ID_JENIS_FARM        int not null,
   NAMA_JENIS_FARM      varchar(300) not null,
   BIAYA                bigint not null,
   primary key (ID_JENIS_FARM)
);

/*==============================================================*/
/* Table: PELANGGARAN                                           */
/*==============================================================*/
create table PELANGGARAN
(
   ID_PELANGGARAN       int not null,
   IDRULE               smallint not null,
   NAME                 varchar(64) not null,
   IDHUKUM              smallint not null,
   LAMA                 date,
   TIMESTAMP_P          timestamp not null,
   primary key (ID_PELANGGARAN)
);

/*==============================================================*/
/* Table: PLAYER                                                */
/*==============================================================*/
create table PLAYER
(
   NAME                 varchar(64) not null,
   UUID                 varchar(40) not null,
   NICKNAME             varchar(64),
   SOFTBAN              smallint not null,
   primary key (NAME)
);

/*==============================================================*/
/* Table: RULE                                                  */
/*==============================================================*/
create table RULE
(
   IDRULE               smallint not null,
   RULENAME             varchar(128) not null,
   DISKRIPSI_RULE       varchar(128),
   primary key (IDRULE)
);

alter table DONATUR add constraint FK_DONATUR foreign key (NAME)
      references PLAYER (NAME) on delete restrict on update restrict;

alter table DONATUR add constraint FK_RELATIONSHIP_5 foreign key (IDDLVL)
      references DONATUR_LVL (IDDLVL) on delete restrict on update restrict;

alter table FARM add constraint FK_JENIS_FARM foreign key (ID_JENIS_FARM)
      references JENIS_FARM (ID_JENIS_FARM) on delete restrict on update restrict;

alter table FARM add constraint FK_PEMILIK_FARM foreign key (NAME)
      references PLAYER (NAME) on delete restrict on update restrict;

alter table PELANGGARAN add constraint FK_RELATIONSHIP_3 foreign key (IDRULE)
      references RULE (IDRULE) on delete restrict on update restrict;

alter table PELANGGARAN add constraint FK_RELATIONSHIP_4 foreign key (NAME)
      references PLAYER (NAME) on delete restrict on update restrict;

alter table PELANGGARAN add constraint FK_RELATIONSHIP_6 foreign key (IDHUKUM)
      references HUKUMAN (IDHUKUM) on delete restrict on update restrict;
