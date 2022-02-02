/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  25/01/2022 08:46:45                      */
/*==============================================================*/

/*==============================================================*/
/* Suppression de la base si elle existe, la génère ensuite.    */
/*==============================================================*/

DROP DATABASE if EXISTS Donnees_menuizMan;
CREATE DATABASE Donnees_menuizMan;
USE Donnees_menuizMan;
SET foreign_key_checks = 0;

/*=============================================*/
/* Suppression des tables si elles existent.   */
/*=============================================*/

drop table if exists T_D_ADDRESS_ADR;

drop table if exists T_D_DIAGNOSTIC_DNC;

drop table if exists T_D_EXPEDITION_EXP;

drop table if exists T_D_FOLDERDETAIL_DTL;

drop table if exists T_D_FOLDERHISTORY_HTY;

drop table if exists T_D_ORDERDETAIL_ODT;

drop table if exists T_D_ORDERNUMBER_OHR;

drop table if exists T_D_PRODUCTCOMPOSITION_PCO;

drop table if exists T_D_PRODUCT_PRD;

drop table if exists T_D_SAVFOLDER_FOL;

drop table if exists T_D_STOCK_MOVEMENT_STM;

drop table if exists T_D_USERTYPE_UTP;

drop table if exists T_D_USER_USR;

SET foreign_key_checks = 1;

/*==============================================================*/
/* Création des tables.                                         */
/*==============================================================*/

/*==============================================================*/
/* Table : T_D_ADDRESS_ADR                                      */
/*==============================================================*/
create table T_D_ADDRESS_ADR
(
   ADR_ID               bigint not null auto_increment,
   ADR_DENOMINATION     text not null,
   ADR_LINE1            text not null,
   ADR_LINE2            text,
   ADR_LINE3            text,
   ADR_ZIPCODE          text not null,
   ADR_CITY             text not null,
   ADR_COUNTRY          text not null,
   ADR_STATE            text,
   ADR_PHONE            text,
   primary key (ADR_ID)
);

/*==============================================================*/
/* Table : T_D_DIAGNOSTIC_DNC                                   */
/*==============================================================*/
create table T_D_DIAGNOSTIC_DNC
(
   DNC_ID               int not null auto_increment,
   DTL_ID               int not null,
   DNC_IMG              longblob,
   DNC_COMMENTAIRE      text not null,
   primary key (DNC_ID)
);

/*==============================================================*/
/* Table : T_D_EXPEDITION_EXP                                   */
/*==============================================================*/
create table T_D_EXPEDITION_EXP
(
   EXP_ID               int not null auto_increment,
   PRD_ID               int not null,
   ADR_ID               bigint,
   OHR_ID               int,
   EXP_DATE             datetime not null,
   EXP_STATUS           text not null,
   EXP_EXPEDITIONMODE   text not null,
   EXP_QTY              bigint not null,
   primary key (EXP_ID)
);

/*==============================================================*/
/* Table : T_D_FOLDERDETAIL_DTL                                 */
/*==============================================================*/
create table T_D_FOLDERDETAIL_DTL
(
   DTL_ID               int not null auto_increment,
   PRD_ID               int not null,
   FOL_ID               int not null,
   primary key (DTL_ID)
);

/*==============================================================*/
/* Table : T_D_FOLDERHISTORY_HTY                                */
/*==============================================================*/
create table T_D_FOLDERHISTORY_HTY
(
   HTY_ID               int not null auto_increment,
   FOL_ID               int not null,
   HTY_OPERATION        text not null,
   primary key (HTY_ID)
);

/*==============================================================*/
/* Table : T_D_ORDERDETAIL_ODT                                  */
/*==============================================================*/
create table T_D_ORDERDETAIL_ODT
(
   ODT_ID               int not null auto_increment,
   PRD_ID               int not null,
   OHR_ID               int not null,
   ODT_QTYORDERED       bigint not null,
   primary key (ODT_ID)
);

/*==============================================================*/
/* Table : T_D_ORDERNUMBER_OHR                                  */
/*==============================================================*/
create table T_D_ORDERNUMBER_OHR
(
   OHR_ID               int not null auto_increment,
   ADR_ID_BILL          bigint,
   FOL_ID               int,
   ADR_ID_DELIVERY      bigint,
   OHR_DATE             datetime not null,
   OHR_ORDERNUMBER      text not null,
   OHR_STATUS           text not null,
   OHR_EXPEDITIONMODE   text not null,
   OHR_PAYMENTMODE      text not null,
   OHR_TOTALHT          numeric(8,2) not null,
   OHR_TOTALTTC         numeric(8,2) not null,
   primary key (OHR_ID)
);

/*==============================================================*/
/* Table : T_D_PRODUCTCOMPOSITION_PCO                           */
/*==============================================================*/
create table T_D_PRODUCTCOMPOSITION_PCO
(
   PCO_ID               int not null auto_increment,
   PRD_ID_KIT           int not null,
   PRD_ID_COMPOSANT     int not null,
   PCO_QUANTITY         int not null,
   primary key (PCO_ID)
);

/*==============================================================*/
/* Table : T_D_PRODUCT_PRD                                      */
/*==============================================================*/
create table T_D_PRODUCT_PRD
(
   PRD_ID               int not null auto_increment,
   PRD_REFERENCE        text not null,
   PRD_SUPPLIER         text not null,
   PRD_DESIGNATION      text not null,
   PRD_TYPE             text not null,
   PRD_FAMILY           text not null,
   PRD_DESCRIPTION      text,
   PRD_GUARANTEE        int not null,
   PRD_OPENTOSELL       bool not null,
   PRD_IMAGE_URL        text,
   primary key (PRD_ID)
);

/*==============================================================*/
/* Table : T_D_SAVFOLDER_FOL                                    */
/*==============================================================*/
create table T_D_SAVFOLDER_FOL
(
   FOL_ID               int not null auto_increment,
   HTY_ID               int,
   FOL_FOLDERNUMBER     text not null,
   FOL_TYPE             text not null,
   FOL_STATUS           text not null,
   FOL_CREATIONDATE     datetime not null,
   FOL_RECEPTIONDATE    datetime,
   FOL_DETAIL		    text,
   primary key (FOL_ID)
);

/*==============================================================*/
/* Table : T_D_STOCK_MOVEMENT_STM                               */
/*==============================================================*/
create table T_D_STOCK_MOVEMENT_STM
(
   MVT_ID               int not null auto_increment,
   PRD_ID               int not null,
   MVT_WAREHOUSE        text,
   MVT_QUANTITY         bigint,
   MVT_DATE             datetime,
   MVT_CANCELLED        bool,
   primary key (MVT_ID)
);

/*==============================================================*/
/* Table : T_D_USERTYPE_UTP                                     */
/*==============================================================*/
create table T_D_USERTYPE_UTP
(
   UTP_ID               int not null auto_increment,
   UTP_TYPE             text not null,
   primary key (UTP_ID)
);

/*==============================================================*/
/* Table : T_D_USER_USR                                         */
/*==============================================================*/
create table T_D_USER_USR
(
   USR_ID               int not null auto_increment,
   UTP_ID               int not null,
   USR_NAME             text not null,
   USR_PSW              text not null,
   primary key (USR_ID)
);

/*==============================================================*/
/* Création des clés étrangeres.                                */
/*==============================================================*/


alter table T_D_DIAGNOSTIC_DNC add constraint FK_DIAGNOSE foreign key (DTL_ID)
      references T_D_FOLDERDETAIL_DTL (DTL_ID) on delete restrict on update restrict;

alter table T_D_EXPEDITION_EXP add constraint FK_BIND foreign key (ADR_ID)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table T_D_EXPEDITION_EXP add constraint FK_CARRY foreign key (OHR_ID)
      references T_D_ORDERNUMBER_OHR (OHR_ID) on delete restrict on update restrict;

alter table T_D_EXPEDITION_EXP add constraint FK_SEND foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_FOLDERDETAIL_DTL add constraint FK_DETAILED foreign key (FOL_ID)
      references T_D_SAVFOLDER_FOL (FOL_ID) on delete restrict on update restrict;

alter table T_D_FOLDERDETAIL_DTL add constraint FK_REFER foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_FOLDERHISTORY_HTY add constraint FK_ACTION2 foreign key (FOL_ID)
      references T_D_SAVFOLDER_FOL (FOL_ID) on delete restrict on update restrict;

alter table T_D_ORDERDETAIL_ODT add constraint FK_HAVE foreign key (OHR_ID)
      references T_D_ORDERNUMBER_OHR (OHR_ID) on delete restrict on update restrict;

alter table T_D_ORDERDETAIL_ODT add constraint FK_INCLUDE foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_ORDERNUMBER_OHR add constraint FK_BILL foreign key (ADR_ID_BILL)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table T_D_ORDERNUMBER_OHR add constraint FK_CONTAIN foreign key (FOL_ID)
      references T_D_SAVFOLDER_FOL (FOL_ID) on delete restrict on update restrict;

alter table T_D_ORDERNUMBER_OHR add constraint FK_DELIVER foreign key (ADR_ID_DELIVERY)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table T_D_PRODUCTCOMPOSITION_PCO add constraint FK_COMPOSED_OF foreign key (PRD_ID_KIT)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;
      
alter table T_D_PRODUCTCOMPOSITION_PCO add constraint FK_BE_FROM foreign key (PRD_ID_COMPOSANT)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_SAVFOLDER_FOL add constraint FK_ACTION foreign key (HTY_ID)
      references T_D_FOLDERHISTORY_HTY (HTY_ID) on delete restrict on update restrict;

alter table T_D_STOCK_MOVEMENT_STM add constraint FK_AFFECT foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_USER_USR add constraint FK_COME_FROM foreign key (UTP_ID)
      references T_D_USERTYPE_UTP (UTP_ID) on delete restrict on update restrict;


/*===========================================================================*/
/* Création d'un Admin sur la database pour ne pas utiliser le compte root   */
/*===========================================================================*/

DROP USER IF EXISTS 'Admin'@'localhost';
CREATE USER 'Admin'@'localhost' IDENTIFIED BY 'Admin';
GRANT ALL PRIVILEGES ON Donnees_menuizMan . * TO 'Admin'@'localhost';
FLUSH PRIVILEGES;


/*==============================================================*/
/* Insertion des jeux données dans les tables                   */
/*==============================================================*/
      
INSERT INTO `t_d_usertype_utp` (`UTP_TYPE`)
VALUES
  ("Adminsitrateur"),
  ("Technicien SAV"),
  ("Technicien Hotline");
  
INSERT INTO `t_d_user_usr` (`USR_NAME`,`UTP_ID`,`USR_PSW`)
VALUES
  ("Nolan Mcknight",3,"574048febc7de70789075a43a86880d393f59b86fa940e949f201723a6f467ca"),
  ("Raymond Solomon",3,"be8b77e3be6f9184865a46088f86be4df312730bb582c02a4848a5206e6b058c"),
  ("Jenna Gates",3,"12b41becb5ee0a820a0a38c548b38adbb4eb73f5f0c3abf1f9280c3b40b45013"),
  ("Dieter Norman",3,"7d307ce6849e05ae2e3eeb2ee8aba9415f8a025421b796bba8b3cc765bd2b9c6"),
  ("Hakeem Craig",3,"6ba3b7c3fa1631b973e342e09e96c1aa4cbed7dc38e25d76e8fc1ee5427c5d28"),
  ("Jerry Beasley",3,"28853b06253a7826dd8adcb93ded500a69cfb3233d869c0c7759017721f63ebf"),
  ("Ava Wooten",3,"5d4d0ce9882f34070d378462be082d8f3f013041bab00285e09abd2755234b8b"),
  ("Quon Emerson",3,"4583a3e22b1bd2cf87fb2cf97d16ac8baab08806d2896685cf4b49a07dc7318b"),
  ("Howard Fox",3,"d23cffd07ff11cf7c1a317d4c243a4c11151e439c9d3e4ecf5cc5cb84c50ce2a"),
  ("Alika Craig",3,"9af927284d60cdc885a9444a0ca524b465a36fff6619e3474330e1f9ae711c4d"),
  ("Shaeleigh Sampson",2,"96b2fbb4ba58dbeeb6578a51ddf7af17e736e3429376e5515420fa1fd7947f3d"),
  ("Lareina Vinson",2,"668c8f32282858c7d9d38b649b65c77b36ff1b99dc72e77286f1a4d6dc7de17e"),
  ("Grant Lindsay",2,"ffb1855ec7ba66b96bd394d4964d3198bf388a7d63cc06bc69375101a7a2f2c1"),
    ("ADMIN",1,"835d6dc88b708bc646d6db82c853ef4182fabbd4a8de59c213f2b5ab3ae7d9be");

INSERT INTO `t_d_address_adr` (`ADR_DENOMINATION`,`ADR_LINE1`,`ADR_LINE2`,`ADR_LINE3`,`ADR_ZIPCODE`,`ADR_CITY`,`ADR_COUNTRY`,`ADR_STATE`,`ADR_PHONE`)
VALUES
  ("Nicole Albert","1514 Sagittis. Rd.","P.O. Box 952, 7818 Pretium Street","275-5486 Mauris. Street","446223","Chełm","South Korea","Kiên Giang","01 77 86 78 63"),
  ("Bradley Whitley","948-8257 Purus. Avenue","8680 Justo Rd.","958-5602 Ut Av.","4029","Cork","Ireland","Pays de la Loire","02 25 56 85 82"),
  ("Christen Dean","Ap #710-4981 Blandit Road","454-9914 Est. St.","Ap #131-8007 Vitae, Street","71052","Melilla","Turkey","Yukon","02 74 35 59 12"),
  ("Eugenia Pollard","584-8489 Arcu St.","Ap #186-685 Elit, Road","Ap #999-9086 Vehicula. Road","22334","Narvik","Germany","Jeju","07 45 39 93 45"),
  ("Zeph Wilkinson","282-6910 Ultricies St.","Ap #402-1408 Ut Ave","Ap #494-2876 Sodales. Av.","36068","Castanhal","United Kingdom","Benue","07 77 78 31 18"),
  ("Martena Medina","P.O. Box 709, 4610 Fusce Rd.","936-2610 Velit. Road","762-1429 Dui. Av.","5441","Serang","Sweden","Northern Territory","04 13 32 15 13"),
  ("Orli Noble","917-751 Cursus St.","552-2608 Diam Ave","Ap #789-430 Aliquam Avenue","62704","Ucluelet","Netherlands","Noord Brabant","01 53 69 15 66"),
  ("Drew Hendrix","909-490 Consectetuer Rd.","Ap #436-1153 Elit St.","6215 Tristique Av.","5835","Garzón","Indonesia","Minnesota","06 14 86 62 40"),
  ("Nayda Velazquez","Ap #725-3965 Enim Road","449-4972 Bibendum Road","4800 Adipiscing St.","10198","San Vicente de Cañete","Germany","Bauchi","07 12 20 78 67"),
  ("Abigail Odom","6023 Est Rd.","P.O. Box 379, 1282 Velit Rd.","4123 Orci Avenue","EI8N 9FX","Canberra","Ireland","Valparaíso","02 61 45 34 85");
  
INSERT INTO `t_d_savfolder_fol` (`FOL_FOLDERNUMBER`,`FOL_TYPE`,`FOL_STATUS`,`FOL_CREATIONDATE`,`FOL_RECEPTIONDATE`)
VALUES
   ("RHE90PRL4UD","EC","Attente de reception du/des produit(s)","2021-01-11 14:06:51","2021-05-05 19:57:54"),
  ("TKJ62CQF2XH","EC","Produit(s) réceptionné(s)","2021-05-21 04:41:11","2021-07-10 21:12:34"),
  ("SVC05IEC1VN","NP","Clôturé","2021-07-14 23:21:25","2022-01-24 17:50:36"),
  ("WIH87KPH5IX","NP","Attente de reception du/des produit(s)","2021-04-29 14:52:45","2021-08-30 01:23:08"),
  ("WYR73ETV0DT","SAV","Attente de reception du/des produit(s)","2021-05-17 12:32:36","2021-07-10 21:31:19"),
  ("PMD57ONV5GF","EP","Attente de reception du/des produit(s)","2021-04-11 04:41:51","2021-01-04 02:01:42"),
  ("NHP74NPO2PE","NP","En attente de diagnostique","2021-09-27 02:36:46","2021-10-15 02:39:56"),
  ("PVI63CYL3NF","NP","Attente de reception du/des produit(s)","2021-02-06 13:48:05","2021-06-09 19:10:01"),
  ("GPW34SMK5MX","NP","En attente de clôture","2021-10-13 20:35:57","2021-11-29 14:04:29"),
  ("OTG67VTH0QY","NP","En attente de clôture","2021-04-26 11:57:12","2021-08-13 19:13:29");


INSERT INTO `t_d_ordernumber_ohr` (`ADR_ID_BILL`,`FOL_ID`,`ADR_ID_DELIVERY`,`OHR_DATE`,`OHR_ORDERNUMBER`,`OHR_STATUS`,`OHR_EXPEDITIONMODE`,`OHR_PAYMENTMODE`,`OHR_TOTALHT`,`OHR_TOTALTTC`)
VALUES
  (4,6,6,"2020-10-31 22:55:17","SGQ83TRR6AK","Expédiée","Expéditeur interne","virement","22037.91","26357.34"),
  (10,2,6,"2019-04-21 11:36:48","WUQ13WUE1AH","Paiment","GLS","virement","4083.45","4883.80"),
  (7,5,6,"2020-10-24 02:53:58","RKD31DKH4CC","Refus","Chronopost","CB","9973.10","11927.82"),
  (10,7,7,"2019-02-18 10:51:28","HIB76XOO6IZ","Refus","GLS","virement","8552.33","10228.58"),
  (10,6,5,"2020-03-04 07:01:31","BEG67FGP5OF","Intégrée","Chronopost","chèque","8287.74","9912.13"),
  (4,6,6,"2019-08-06 23:43:21","DLP58BHQ8GQ","Refus","Chronopost","virement","2751.46","3290.74"),
  (7,4,4,"2019-03-07 17:25:33","NGJ72BYG1SA","Paiment","Chronopost","chèque","17264.07","20647.82"),
  (3,2,5,"2020-04-26 10:42:59","WKK60JBX4IY","Paiment","Expéditeur interne","chèque","9300.18","11123.01"),
  (3,9,2,"2021-01-25 01:01:12","MIK22CLI4OC","En cours de traitement","Expéditeur interne","chèque","17262.57","20646.03"),
  (9,5,4,"2020-01-16 02:41:53","NXV29VDQ2GV","Refus","GLS","CB","4925.53","5890.93");
  
INSERT INTO `t_d_folderhistory_hty` (`FOL_ID`,`HTY_OPERATION`)
VALUES
  (5,"pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim"),
  (2,"ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla"),
  (1,"mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed"),
  (9,"sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus."),
  (4,"tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque"),
  (10,"facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero"),
  (5,"erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla"),
  (10,"adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis."),
  (6,"sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare,"),
  (3,"Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum.");
  
INSERT INTO `t_d_product_prd` (`PRD_REFERENCE`,`PRD_SUPPLIER`,`PRD_DESIGNATION`,`PRD_TYPE`,`PRD_FAMILY`,`PRD_GUARANTEE`,`PRD_OPENTOSELL`)
VALUES
  ("YHV39KDX2FM","Enim Nec Tempus Industries","gravida molestie arcu.","Unitaire","Moteur",42,"1"),
  ("BOI18RII9PL","Dapibus Corporation","Etiam laoreet, libero","Unitaire","Portail",11,"0"),
  ("SUJ56BLP6RF","Ac Tellus LLC","vulputate, posuere vulputate,","Unitaire","Portail",12,"1"),
  ("GBT72AQG1SX","Commodo Tincidunt Nibh Industries","egestas a, scelerisque","Unitaire","Porte",41,"0"),
  ("DTO26RVM8NS","Risus At LLP","Donec nibh. Quisque","Unitaire","Porte",1,"1"),
  ("VIH48IZY5UD","Nec Ligula Inc.","nonummy ultricies ornare,","Unitaire","Porte",29,"1"),
  ("DVG73SQG0LQ","Vel Turpis Aliquam Ltd","posuere cubilia Curae","Unitaire","Porte",23,"1"),
  ("CFE11FEP2FM","Lobortis LLC","sodales elit erat","Unitaire","Portail",26,"0"),
  ("PGP16ZVH3KW","Iaculis Lacus Inc.","nulla. Integer urna.","Unitaire","Porte",46,"0"),
  ("KOF76LYO1DV","Augue Scelerisque Industries","sit amet, consectetuer","Unitaire","Porte",20,"0"),
  ("WJR53UGY0UM","Porttitor Tellus Non Foundation","id sapien. Cras","Lot","Portail",35,"1"),
  ("RPS96IDE8HV","Dolor Vitae Dolor Incorporated","ullamcorper eu, euismod","Lot","Moteur",2,"1"),
  ("PTV01VMV0NE","Pellentesque Eget Dictum Industries","arcu. Vestibulum ante","Lot","Portail",13,"0"),
  ("ZTT91WLR6WD","Proin Sed Turpis PC","ultricies dignissim lacus.","Lot","Portail",20,"0"),
  ("QQR78GIW5IB","Nam Nulla Consulting","nulla. Integer vulputate,","Lot","Porte",38,"1"),
  ("LTW68TUM5UF","Sit Amet Consectetuer Inc.","nec urna suscipit","Lot","Moteur",38,"0"),
  ("JZZ53BBG0GD","Fringilla Porttitor Corp.","pede ac urna.","Lot","Portail",11,"0"),
  ("QXF71IVK2HG","Elit Etiam Laoreet PC","dolor, nonummy ac,","Lot","Portail",10,"1"),
  ("VRS98YWO9LO","Lorem Eget LLC","urna. Nunc quis","Lot","Porte",36,"1"),
  ("NJS71XQG3OT","Sed Institute","vulputate, risus a","Lot","Portail",7,"0");
  
INSERT INTO `t_d_productcomposition_pco` (`PRD_ID_KIT`,`PRD_ID_COMPOSANT`,`PCO_QUANTITY`)
VALUES
  (11,7,5),
  (11,3,2),
  (12,7,5),
  (12,4,16),
  (13,3,7),
  (13,1,1),
  (14,10,20),
  (14,6,4),
  (15,4,5),
  (15,3,12),
  (16,9,7),
  (16,3,7),
  (17,1,1),
  (17,1,12),
  (18,4,5),
  (18,2,9),
  (19,2,9),
  (19,1,12),
  (20,2,9),
  (20,4,1);
   
INSERT INTO `t_d_orderdetail_odt` (`PRD_ID`,`OHR_ID`,`ODT_QTYORDERED`)
VALUES
  (3,1,1),
  (6,1,7),
  (2,1,4),
  (1,1,9),
  (4,2,0),
  (2,2,9),
  (7,3,6),
  (9,3,3),
  (4,3,3),
  (3,3,2),
  (1,3,3),
  (1,4,1),
  (4,5,1),
  (5,5,7),
  (5,6,5),
  (10,7,9),
  (9,8,8),
  (8,8,1),
  (3,8,1),
  (1,9,7),
  (4,9,3),
  (4,10,6);
  
INSERT INTO `t_d_expedition_exp` (`PRD_ID`,`ADR_ID`,`OHR_ID`,`EXP_DATE`,`EXP_STATUS`,`EXP_EXPEDITIONMODE`,`EXP_QTY`)
VALUES
  (1,6,6,"2022-08-07 23:43:21","En cours","Chronopost",3),
  (2,4,4,"2022-03-07 17:25:33","En cours","Chronopost",1),
  (3,null,7,"2022-04-26 10:42:59","En cours","Expéditeur interne",2),
  (4,null,3,"2022-11-25 01:01:12","En cours","Expéditeur interne",1),
  (5,5,1,"2022-11-16 02:41:53","Expédiée","GLS",3),
  (6,6,2,"2022-05-19 06:24:12","En cours","GLS",5),
  (7,9,8,"2020-05-02 08:21:21","En cours","Colissimo",3),
  (8,null,5,"2022-06-10 13:01:15","En cours","Expéditeur interne",2),
  (9,5,10,"2022-02-13 22:06:46","En cours","Chronopost",9),
  (10,7,9,"2022-03-02 17:55:52","En cours","GLS",3);
  
INSERT INTO `t_d_stock_movement_stm` (`PRD_ID`,`MVT_WAREHOUSE`,`MVT_QUANTITY`,`MVT_DATE`,`MVT_CANCELLED`)
VALUES
  (3,null,1,"2022-11-16 02:41:53",0),
  (6,null,7,"2022-11-16 02:41:53",0),
  (2,null,4,"2022-11-16 02:41:53",0),
  (1,null,9,"2022-11-16 02:41:53",0);
  
INSERT INTO `t_d_folderdetail_dtl` (`PRD_ID`,`FOL_ID`)
VALUES
  (2,4),
  (2,2),
  (2,9),
  (2,8),
  (2,3),
  (4,10),
  (5,7),
  (5,9),
  (5,4),
  (5,3),
  (5,1),
  (5,4),
  (6,3),
  (6,6),
  (6,2),
  (6,1),
  (6,4),
  (6,5),
  (6,5),
  (7,1),
  (9,1),
  (9,4);
  
INSERT INTO `t_d_diagnostic_dnc` (`DTL_ID`,`DNC_IMG`,`DNC_COMMENTAIRE`)
VALUES
  (1,null,"vehicula et, rutrum eu, ultrices sit amet, risus. Donec"),
  (2,null,"Aliquam auctor, velit eget laoreet posuere, enim"),
  (3,null,"facilisis vitae, orci. Phasellus dapibus quam quis diam."),
  (4,null,"blandit"),
  (5,null,"non lorem vitae odio sagittis semper. Nam"),
  (6,null,"tincidunt. Donec vitae erat vel pede blandit"),
  (7,null,"ullamcorper. Duis cursus, diam at pretium"),
  (8,null,"nonummy. Fusce fermentum fermentum arcu. Vestibulum ante"),
  (9,null,"enim, condimentum eget,"),
  (10,null,"metus facilisis lorem tristique aliquet. Phasellus fermentum convallis"),
  (11,null,"faucibus. Morbi vehicula. Pellentesque"),
  (12,null,"semper auctor. Mauris"),
  (13,null,"lobortis ultrices. Vivamus rhoncus."),
  (14,null,"gravida mauris ut"),
  (15,null,"ut cursus luctus, ipsum leo elementum sem,"),
  (16,null,"ut ipsum"),
  (17,null,"lacinia. Sed congue, elit sed consequat"),
  (18,null,"ultrices sit amet, risus."),
  (19,null,"erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin"),
  (20,null,"in, hendrerit consectetuer, cursus"),
  (21,null,"pede nec ante blandit viverra. Donec tempus, lorem"),
  (22,null,"ipsum. Suspendisse");