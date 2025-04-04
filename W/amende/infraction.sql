-- SQLBook: Code
/*
MySQL Backup
Source Server Version: 5.7.31
Source Database: nitschke5_bdinfraction
Date: 17/02/2023 16:48:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `comprend`
-- ----------------------------
DROP TABLE IF EXISTS `comprend`;
CREATE TABLE `comprend` (
  `id_inf` varchar(5) NOT NULL,
  `id_delit` int(3) NOT NULL,
  PRIMARY KEY (`id_inf`,`id_delit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `conducteur`
-- ----------------------------
DROP TABLE IF EXISTS `conducteur`;
CREATE TABLE `conducteur` (
  `no_permis` varchar(4) NOT NULL,
  `date_permis` date NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`no_permis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `delit`
-- ----------------------------
DROP TABLE IF EXISTS `delit`;
CREATE TABLE `delit` (
  `id_delit` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(40) NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id_delit`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `infraction`
-- ----------------------------
DROP TABLE IF EXISTS `infraction`;
CREATE TABLE `infraction` (
  `id_inf` int(11) NOT NULL,
  `date_inf` date NOT NULL,
  `no_immat` varchar(8) NOT NULL,
  `no_permis` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_inf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `vehicule`
-- ----------------------------
DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE `vehicule` (
  `no_immat` varchar(8) NOT NULL,
  `date_immat` date NOT NULL,
  `modele` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `no_permis` varchar(4) NOT NULL,
  PRIMARY KEY (`no_immat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `comprend` VALUES ('1','1'), ('11','3'), ('11','5'), ('12','3'), ('13','2'), ('2','1'), ('2','2'), ('3','3'), ('4','4'), ('4','5'), ('5','2'), ('5','4'), ('6','1'), ('6','2'), ('6','4'), ('6','6'), ('7','1'), ('7','2'), ('7','5'), ('8','1'), ('8','2'), ('8','6'), ('85','1'), ('85','5'), ('9','3'), ('9','6');
INSERT INTO `conducteur` VALUES ('AZ67','2011-02-01','AIRPACH','Fabrice','airpach'), ('AZ69','2011-02-01','CAVALLI','Frédéric','cavalli'), ('AZ71','2017-02-02','MANGONI','Joseph','mangoni'), ('AZ81','1997-04-09','GAUDE','David','gaude'), ('AZ90','2000-05-04','KIEFFER','Claudine','kieffer'), ('AZ92','2001-04-06','THEOBALD','Pascal','theobald'), ('AZ99','2003-09-06','CAMARA','Souleymane','camara');
INSERT INTO `delit` VALUES ('1','Excès de vitesse','220'), ('2','Outrage à agent','450'), ('3','Feu rouge grillé','270'), ('4','Conduite en état d\'ivresse','380'), ('5','Delit de fuite','400'), ('6','refus de priorité','280');
INSERT INTO `infraction` VALUES ('1','2021-09-02','CA409BG','AZ67'), ('11','2020-05-14','AA643BB',''), ('12','2021-12-02','AA643BB','AZ99'), ('13','2021-08-11','AA643BB','AZ67'), ('2','2021-09-04','BE456AD','AZ69'), ('3','2021-09-04','AA643BB','AZ71'), ('4','2021-09-06','BF823NG','AZ81'), ('5','2021-09-08','5432YZ88','AZ90'), ('6','2021-09-11','AB308FG','AZ92'), ('7','2021-09-08','AB308FG',''), ('8','2020-06-05','AA643BB','AZ67'), ('85','2021-03-18','AA643BB',''), ('9','2020-10-01','CA409BG','AZ92');
INSERT INTO `vehicule` VALUES ('5432YZ88','2011-08-15','C3','Citroën','AZ90'), ('AA643BB','2016-01-07','Golf','Volkswagen','AZ71'), ('AB308FG','2017-03-27','309','Peugeot','AZ92'), ('BE456AD','2018-07-10','Kangoo','Renault','AZ69'), ('BF823NG','2018-09-10','C3','Citroën','AZ81'), ('CA409BG','2019-03-21','T-Roc','Volkswagen','AZ67');
