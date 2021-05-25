

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


CREATE TABLE `moral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_investing` varchar(255) NOT NULL COMMENT 'نوع الجهة المستثمرة',
  `sector_company` varchar(255) NOT NULL COMMENT 'القطاع الذي تنتمي اليه الشركة او الجهة المستثمرة؟',
  `trade_name` varchar(255) NOT NULL COMMENT 'الاسم التجاري',
  `nationality` varchar(255) NOT NULL COMMENT 'الجنسية',
  `place_date_incorporation` varchar(255) NOT NULL COMMENT 'محل وتاريخ التأسيس',
  `email_address` varchar(255) NOT NULL COMMENT 'العنوان الالكتروني',
  `website` varchar(255) NOT NULL COMMENT 'الموقع الالكتروني',
  `main_activity` longtext NOT NULL COMMENT 'ما هو النشاط الاساسي للشركة او الجهة المستثمرة؟',
  `company_activity` longtext NOT NULL COMMENT 'هل نشاط الشركة يتطابق مع طبيعةالمشروع الاستثماري ؟',
  `branches_company` longtext NOT NULL COMMENT 'هل هناك فروع للشركة في العالم ؟',
  `iso` longtext NOT NULL COMMENT ' هل حصلت الشركة على شهادات عالمية (شهادات الجودة والكفاءة) مثل ISO: ؟',
  `many_employes` varchar(255) NOT NULL COMMENT 'كم عدد العاملين في الشركة او الجهة المستثمرة',
  `investing` longtext NOT NULL COMMENT 'هل تم الاعلان عن افلاس الشركة او الجهة المسثمرة ؟',
  `basic_goods` longtext NOT NULL COMMENT 'س/السلع او الخدمات الاساسية التي سيقدمها المشروع؟',
  `location_project` varchar(255) NOT NULL COMMENT 'موقع المشروع اذا كان معروفا؟',
  `name_project` varchar(255) NOT NULL COMMENT 'اسم المشروع',
  `describe_project` longtext NOT NULL COMMENT 'اكتب وصف موجز عن المشروع وفوائده',
  `number_during_excete` varchar(255) NOT NULL COMMENT 'عدد الايدي العاملة التي سيوفرها المشروع اثناء التنفيذ؟',
  `percentage_during_excete` varchar(255) NOT NULL COMMENT 'نسبة الايدي العاملة العراقية التي سيوفرها المشروع اثناء التنفيذ؟',
  `number_during_on` varchar(255) NOT NULL COMMENT 'عدد الايدي العاملة التي سيوفرها المشروع اثناء التشغيل؟',
  `percentage_during_on` varchar(255) NOT NULL COMMENT 'نسبة الايدي العاملة العراقية التي سيوفرها المشروع اثناء التشغيل؟',
  `time_complate_project` varchar(255) NOT NULL COMMENT 'المدة اللازمة لأنجاز المشروع ؟',
  `kind_machines` longtext NOT NULL COMMENT 'نوع الموجودات و المكائن والمدخلات الاخرى ,الخ,التي سيتم استيرادها الى العراق او شراؤها من الاسواق المحلية لأغراض المشروع ؟',
  `features_goods` longtext NOT NULL COMMENT 'ما هي ميزة السلع او الخدمات التي تقدمها مقارنة بالسلع او الخدمات الاخرى التي يقدمها المستثمرين الاخرين ؟',
  `rate_goods_com` longtext NOT NULL COMMENT 'ما هو تقييمك للسلع او الخدمات التي تقدمها الشركة او الجهة المستثمرة بلمقارنة مع المستثمرين الاخرين في المجال نفسه ؟',
  `address_home_type` varchar(255) NOT NULL COMMENT 'عنوان السكن نوع ',
  `lang` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `normal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL COMMENT 'الاسم الكامل',
  `birthday` date NOT NULL COMMENT 'تاريخ الولادة',
  `nationality` varchar(255) NOT NULL COMMENT 'الجنسية',
  `governorate` varchar(255) NOT NULL COMMENT 'المحافظة',
  `city` varchar(255) NOT NULL COMMENT 'المدينة',
  `spend` varchar(255) NOT NULL COMMENT 'القضاء',
  `region` varchar(255) NOT NULL COMMENT 'المنطقة',
  `village` varchar(255) NOT NULL COMMENT 'قرية',
  `locality` varchar(255) NOT NULL COMMENT 'محلة',
  `alley` varchar(255) NOT NULL COMMENT 'زقاق',
  `house` varchar(255) NOT NULL COMMENT 'دار',
  `phone_office` varchar(255) NOT NULL COMMENT 'رقم الهاتف(المكتب)',
  `phone_number` varchar(255) NOT NULL COMMENT 'رقم الهاتف النقال(الشخصي)',
  `email` varchar(255) NOT NULL COMMENT 'البريد الالكتروني',
  `website` varchar(255) NOT NULL COMMENT 'الموقع الكتروني',
  `issuing_bankruptcy` varchar(255) NOT NULL COMMENT 'س/هل صدر بحقك حكما بأشهار الافلاس او العجز؟',
  `basicservices` longtext NOT NULL COMMENT 'س/السلع او الخدمات الاساسية التي سيقدمها المشروع؟',
  `location_know` varchar(255) NOT NULL COMMENT 'موقع المشروع اذا كان معروفا؟',
  `nameproject` varchar(255) NOT NULL COMMENT 'اسم المشروع',
  `describe_project` longtext NOT NULL COMMENT 'اكتب وصف موجز عن المشروع وفوائده',
  `number_during_excete` varchar(255) NOT NULL COMMENT 'عدد الايدي العاملة التي سيوفرها المشروع اثناء التنفيذ؟',
  `percentage_during_excete` varchar(255) NOT NULL COMMENT 'نسبة الايدي العاملة العراقية التي سيوفرها المشروع اثناء التنفيذ؟',
  `number_during_on` varchar(255) NOT NULL COMMENT 'عدد الايدي العاملة التي سيوفرها المشروع اثناء التشغيل؟',
  `percentage_during_on` varchar(255) NOT NULL COMMENT 'نسبة الايدي العاملة العراقية التي سيوفرها المشروع اثناء التشغيل؟',
  `time_complate_project` varchar(255) NOT NULL COMMENT 'المدة اللازمة لأنجاز المشروع ؟',
  `machine_type` longtext NOT NULL COMMENT 'نوع الموجودات و المكائن والمدخلات الاخرى ,الخ,التي سيتم استيرادها الى العراق او شراؤها من الاسواق المحلية لأغراض المشروع ؟',
  `features_goods` longtext NOT NULL COMMENT 'ما هي ميزة السلع او الخدمات التي تقدمها مقارنة بالسلع او الخدمات الاخرى التي يقدمها المستثمرين الاخرين ؟',
  `rate_goods_com` longtext NOT NULL COMMENT 'ما هو تقييمك للسلع او الخدمات التي تقدمها الشركة او الجهة المستثمرة بلمقارنة مع المستثمرين الاخرين في المجال نفسه ؟',
  `address_home_type` varchar(255) NOT NULL COMMENT 'عنوان السكن والاقامة للمستثمر',
  `lang` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;


INSERT INTO normal (id, fullname, birthday, nationality, governorate, city, spend, region, village, locality, alley, house, phone_office, phone_number, email, website, issuing_bankruptcy, basicservices, location_know, nameproject, describe_project, number_during_excete, percentage_during_excete, number_during_on, percentage_during_on, time_complate_project, machine_type, features_goods, rate_goods_com, address_home_type, lang, date) VALUES ('18','dwqdwq','2020-12-16','dqwdw','dqwd','dwqdwq','dwq','dwqqd','wdqdq','dwqdq','dwqd','dwqwdq','2321312(1+)','32423432(1264+)','dqwdwqdwqdwq@yahoo.com','https://www.google.com','نعم','dwq','dwq','dwq','dwq','wdq','wdq','dwq','dwq','dwq','dwq','dwq','dwq','1','ar','2020-12-20');


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


CREATE TABLE `users_deletedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO users_deletedata (id, username, password) VALUES ('1','admin','admin');
