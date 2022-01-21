/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  21/01/2022 08:46:38                      */
/*==============================================================*/

DROP DATABASE if EXISTS Donnees_menuizMan;
CREATE DATABASE Donnees_menuizMan;
USE Donnees_menuizMan;
SET foreign_key_checks = 0;

drop table if exists ADRESSE;

drop table if exists DETIENT;

drop table if exists EXPEDIE;

drop table if exists SITUE;

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

drop table if exists T_D_TIMEDATE_DAT;

drop table if exists T_D_USERTYPE_UTP;

drop table if exists T_D_USER_USR;

SET foreign_key_checks = 1;

/*==============================================================*/
/* Table : ADRESSE                                              */
/*==============================================================*/
create table ADRESSE
(
   OHR_ID               int not null AUTO_INCREMENT,
   ADR_ID               bigint not null,
   primary key (OHR_ID, ADR_ID)
);

/*==============================================================*/
/* Table : DETIENT                                              */
/*==============================================================*/
create table DETIENT
(
   ODT_ID               int not null AUTO_INCREMENT,
   PRD_ID               int not null,
   primary key (ODT_ID, PRD_ID)
);

/*==============================================================*/
/* Table : EXPEDIE                                              */
/*==============================================================*/
create table EXPEDIE
(
   EXP_ID               int not null AUTO_INCREMENT,
   OHR_ID               int not null,
   primary key (EXP_ID, OHR_ID)
);

/*==============================================================*/
/* Table : SITUE                                                */
/*==============================================================*/
create table SITUE
(
   ADR_ID               bigint not null AUTO_INCREMENT,
   PRD_ID               int not null,
   primary key (ADR_ID, PRD_ID)
);

/*==============================================================*/
/* Table : T_D_ADDRESS_ADR                                      */
/*==============================================================*/
create table T_D_ADDRESS_ADR
(
   ADR_ID               bigint not null AUTO_INCREMENT,
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
   DNC_ID               int not null AUTO_INCREMENT,
   FOL_ID               int not null,
   DAT_ID               int not null,
   DNC_IMG              longblob,
   DNC_COM              text not null,
   primary key (DNC_ID)
);

/*==============================================================*/
/* Table : T_D_EXPEDITION_EXP                                   */
/*==============================================================*/
create table T_D_EXPEDITION_EXP
(
   EXP_DATE             datetime not null,
   EXP_STATUS           text not null,
   EXP_EXPEDITIONMODE   text not null,
   EXP_QTY              bigint not null,
   EXP_ID               int not null AUTO_INCREMENT,
   ADR_ID               bigint not null,
   MVT_ID               int not null,
   primary key (EXP_ID)
);

/*==============================================================*/
/* Table : T_D_FOLDERDETAIL_DTL                                 */
/*==============================================================*/
create table T_D_FOLDERDETAIL_DTL
(
   DTL_ID               int not null AUTO_INCREMENT,
   FOL_ID               int not null,
   DTL_STATUS           text not null,
   DTL_TYPE             text,
   primary key (DTL_ID)
);

/*==============================================================*/
/* Table : T_D_FOLDERHISTORY_HTY                                */
/*==============================================================*/
create table T_D_FOLDERHISTORY_HTY
(
   HTY_ID               int not null AUTO_INCREMENT,
   DAT_ID               int not null,
   HTY_OPERATION        text not null,
   primary key (HTY_ID)
);

/*==============================================================*/
/* Table : T_D_ORDERDETAIL_ODT                                  */
/*==============================================================*/
create table T_D_ORDERDETAIL_ODT
(
   ODT_ID               int not null AUTO_INCREMENT,
   ODT_QTYORDERED       bigint not null,
   primary key (ODT_ID)
);

/*==============================================================*/
/* Table : T_D_ORDERNUMBER_OHR                                  */
/*==============================================================*/
create table T_D_ORDERNUMBER_OHR
(
   OHR_ID               int not null AUTO_INCREMENT,
   ODT_ID               int not null,
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
   PCO_ID               int not null AUTO_INCREMENT,
   PRD_ID               int not null,
   PCO_QUANTITY         bigint not null,
   primary key (PCO_ID)
);

/*==============================================================*/
/* Table : T_D_PRODUCT_PRD                                      */
/*==============================================================*/
create table T_D_PRODUCT_PRD
(
   PRD_ID               int not null AUTO_INCREMENT,
   DNC_ID               int,
   PRD_REFERENCE        text not null,
   PRD_SUPPLIER         text not null,
   PRD_DESIGNATION      text not null,
   PRD_TYPE             text not null,
   PRD_FAMILY           text not null,
   PRD_DESCRIPTION      text,
   PRD_GUARANTEE        smallint not null,
   PRD_OPENTOSELL       bool not null,
   PRD_IMAGE_URL        text,
   primary key (PRD_ID)
);

/*==============================================================*/
/* Table : T_D_SAVFOLDER_FOL                                    */
/*==============================================================*/
create table T_D_SAVFOLDER_FOL
(
   FOL_ID               int not null AUTO_INCREMENT,
   DAT_ID               int not null,
   HTY_ID               int not null,
   FOL_COMMANDNUMBER    text not null,
   FOL_NAMECLIENT       text,
   primary key (FOL_ID)
);

/*==============================================================*/
/* Table : T_D_STOCK_MOVEMENT_STM                               */
/*==============================================================*/
create table T_D_STOCK_MOVEMENT_STM
(
   MVT_WAREHOUSE_       text,
   MVT_QUANTITY_        bigint,
   MVT_DATE             datetime,
   MVT_CANCELLED        bool,
   MVT_ID               int not null AUTO_INCREMENT,
   PRD_ID               int not null,
   primary key (MVT_ID)
);

/*==============================================================*/
/* Table : T_D_TIMEDATE_DAT                                     */
/*==============================================================*/
create table T_D_TIMEDATE_DAT
(
   DAT_ID               int not null AUTO_INCREMENT,
   DAT_DATE             datetime not null,
   primary key (DAT_ID)
);

/*==============================================================*/
/* Table : T_D_USERTYPE_UTP                                     */
/*==============================================================*/
create table T_D_USERTYPE_UTP
(
   UTP_ID               int not null AUTO_INCREMENT,
   UTP_PROFIL           varchar(255) not null,
   primary key (UTP_ID)
);

/*==============================================================*/
/* Table : T_D_USER_USR                                         */
/*==============================================================*/
create table T_D_USER_USR
(
   USR_ID               int not null AUTO_INCREMENT,
   UTP_ID               int not null,
   USR_NAME             varchar(255) not null,
   USR_PSW              varchar(255),
   primary key (USR_ID)
);

alter table ADRESSE add constraint FK_ADRESSE foreign key (ADR_ID)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table ADRESSE add constraint FK_ADRESSE2 foreign key (OHR_ID)
      references T_D_ORDERNUMBER_OHR (OHR_ID) on delete restrict on update restrict;

alter table DETIENT add constraint FK_DETIENT foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table DETIENT add constraint FK_DETIENT2 foreign key (ODT_ID)
      references T_D_ORDERDETAIL_ODT (ODT_ID) on delete restrict on update restrict;

alter table EXPEDIE add constraint FK_EXPEDIE foreign key (OHR_ID)
      references T_D_ORDERNUMBER_OHR (OHR_ID) on delete restrict on update restrict;

alter table EXPEDIE add constraint FK_EXPEDIE2 foreign key (EXP_ID)
      references T_D_EXPEDITION_EXP (EXP_ID) on delete restrict on update restrict;

alter table SITUE add constraint FK_SITUE foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table SITUE add constraint FK_SITUE2 foreign key (ADR_ID)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table T_D_DIAGNOSTIC_DNC add constraint FK_EFFECTUE foreign key (DAT_ID)
      references T_D_TIMEDATE_DAT (DAT_ID) on delete restrict on update restrict;

alter table T_D_DIAGNOSTIC_DNC add constraint FK_NECESSITE foreign key (FOL_ID)
      references T_D_SAVFOLDER_FOL (FOL_ID) on delete restrict on update restrict;

alter table T_D_EXPEDITION_EXP add constraint FK_ENVOIE foreign key (ADR_ID)
      references T_D_ADDRESS_ADR (ADR_ID) on delete restrict on update restrict;

alter table T_D_EXPEDITION_EXP add constraint FK_RETIRE foreign key (MVT_ID)
      references T_D_STOCK_MOVEMENT_STM (MVT_ID) on delete restrict on update restrict;

alter table T_D_FOLDERDETAIL_DTL add constraint FK_SE_DETAILE foreign key (FOL_ID)
      references T_D_SAVFOLDER_FOL (FOL_ID) on delete restrict on update restrict;

alter table T_D_FOLDERHISTORY_HTY add constraint FK_DEFINI foreign key (DAT_ID)
      references T_D_TIMEDATE_DAT (DAT_ID) on delete restrict on update restrict;

alter table T_D_ORDERNUMBER_OHR add constraint FK_SE_COMPOSE foreign key (ODT_ID)
      references T_D_ORDERDETAIL_ODT (ODT_ID) on delete restrict on update restrict;

alter table T_D_PRODUCTCOMPOSITION_PCO add constraint FK_COMPOSE foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_PRODUCT_PRD add constraint FK_CONCERNE foreign key (DNC_ID)
      references T_D_DIAGNOSTIC_DNC (DNC_ID) on delete restrict on update restrict;

alter table T_D_SAVFOLDER_FOL add constraint FK_ACTION foreign key (HTY_ID)
      references T_D_FOLDERHISTORY_HTY (HTY_ID) on delete restrict on update restrict;

alter table T_D_SAVFOLDER_FOL add constraint FK_CREE foreign key (DAT_ID)
      references T_D_TIMEDATE_DAT (DAT_ID) on delete restrict on update restrict;

alter table T_D_STOCK_MOVEMENT_STM add constraint FK_PROVIENT foreign key (PRD_ID)
      references T_D_PRODUCT_PRD (PRD_ID) on delete restrict on update restrict;

alter table T_D_USER_USR add constraint FK_CONTROLE foreign key (UTP_ID)
      references T_D_USERTYPE_UTP (UTP_ID) on delete restrict on update restrict;

