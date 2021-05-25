

CREATE TABLE `info_project_moral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `residential` tinyint(4) NOT NULL COMMENT '	سكني',
  `Industrial` tinyint(4) NOT NULL COMMENT '	صناعي',
  `agricultural` tinyint(4) NOT NULL COMMENT 'زراعي',
  `commercial` tinyint(4) NOT NULL COMMENT 'تجاري',
  `transfer` tinyint(4) NOT NULL COMMENT 'نقل',
  `comm_info` tinyint(4) NOT NULL COMMENT 'اتصالات وتكنولوجيا المعلومات	',
  `educational` tinyint(4) NOT NULL COMMENT 'تعليمي',
  `athlete` tinyint(4) NOT NULL COMMENT 'رياضي',
  `tourism` tinyint(4) NOT NULL COMMENT 'سياحة',
  `oil_gas` tinyint(4) NOT NULL COMMENT 'نفط والغاز	',
  `service` tinyint(4) NOT NULL COMMENT 'خدمي',
  `health` tinyint(4) NOT NULL COMMENT 'صحة',
  `electricity` tinyint(4) NOT NULL COMMENT 'كهرباء',
  `entertaining` tinyint(4) NOT NULL COMMENT 'ترفيهي',
  `other_investment` tinyint(4) NOT NULL COMMENT 'انشطة استثمارية اخرى',
  `other_investment_input` longtext NOT NULL COMMENT '	انشطة استثمارية اخرى يرجى ذكرها	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `info_project_normal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `residential` tinyint(4) NOT NULL COMMENT 'سكني',
  `Industrial` tinyint(4) NOT NULL COMMENT 'صناعي',
  `agricultural` tinyint(4) NOT NULL COMMENT 'زراعي',
  `commercial` tinyint(4) NOT NULL COMMENT 'تجاري',
  `transfer` tinyint(4) NOT NULL COMMENT 'نقل',
  `comm_info` tinyint(4) NOT NULL COMMENT 'اتصالات وتكنولوجيا المعلومات',
  `educational` tinyint(4) NOT NULL COMMENT 'تعليمي',
  `athlete` tinyint(4) NOT NULL COMMENT 'رياضي',
  `tourism` tinyint(4) NOT NULL COMMENT 'سياحة',
  `oil_gas` tinyint(4) NOT NULL COMMENT 'نفط والغاز',
  `service` tinyint(4) NOT NULL COMMENT 'خدمي',
  `health` tinyint(4) NOT NULL COMMENT 'صحة',
  `electricity` tinyint(4) NOT NULL COMMENT 'كهرباء',
  `entertaining` tinyint(4) NOT NULL COMMENT 'ترفيهي',
  `other_investment` tinyint(4) NOT NULL COMMENT 'انشطة استثمارية اخرى',
  `other_investment_input` longtext NOT NULL COMMENT 'انشطة استثمارية اخرى يرجى ذكرها',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;


INSERT INTO info_project_normal (id, normal_id, residential, Industrial, agricultural, commercial, transfer, comm_info, educational, athlete, tourism, oil_gas, service, health, electricity, entertaining, other_investment, other_investment_input) VALUES ('18','18','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','dwqdqw');


CREATE TABLE `inside_iraq_moral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `governorate` varchar(255) NOT NULL COMMENT 'المحافظة',
  `city` varchar(255) NOT NULL COMMENT 'المدينة',
  `spend` varchar(255) NOT NULL COMMENT 'القضاء',
  `region` varchar(255) NOT NULL COMMENT 'المنطقة',
  `village` varchar(255) NOT NULL COMMENT 'القرية',
  `locality` varchar(255) NOT NULL COMMENT 'محلة',
  `alley` varchar(255) NOT NULL COMMENT 'زقاق',
  `house` varchar(255) NOT NULL COMMENT 'دار',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `inside_iraq_normal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `governorate` varchar(255) NOT NULL COMMENT 'المحافظة',
  `city` varchar(255) NOT NULL COMMENT 'المدينة',
  `spend` varchar(255) NOT NULL COMMENT 'القضاء',
  `region` varchar(255) NOT NULL COMMENT 'المنطقة',
  `village` varchar(255) NOT NULL COMMENT 'القرية',
  `locality` varchar(255) NOT NULL COMMENT 'محلة',
  `alley` varchar(255) NOT NULL COMMENT 'زقاق',
  `house` varchar(255) NOT NULL COMMENT 'دار',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;


INSERT INTO inside_iraq_normal (id, normal_id, governorate, city, spend, region, village, locality, alley, house) VALUES ('17','18','dqwdq','dwq','dwq','dwq','dwq','dwq','dqw','dwqdq');


CREATE TABLE `outside_iraq_moral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL COMMENT 'المدينة',
  `address` varchar(255) NOT NULL COMMENT 'العنوان ',
  `zip` varchar(255) NOT NULL COMMENT 'العنوان البريدي',
  `country` varchar(255) NOT NULL COMMENT 'الدولة',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `outside_iraq_normal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `normal_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL COMMENT 'المدينة',
  `address` varchar(255) NOT NULL COMMENT 'العنوان',
  `zip` varchar(255) NOT NULL COMMENT 'العنوان البريدي',
  `country` varchar(255) NOT NULL COMMENT 'الدولة',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `add_by` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO users (id, username, password, add_by) VALUES ('3','admin','admin','sajjad');
