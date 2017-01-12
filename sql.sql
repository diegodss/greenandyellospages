
https://github.com/mcamara/laravel-localization

http://www.yellowpagesphpscript.com/demo/v5/admin/business

CREATE TABLE business (
	id_business INT(11) NOT NULL AUTO_INCREMENT
	, id_user INT(11) 
	, id_plan INT(11) 
	
	, business_name VARCHAR(100) NULL DEFAULT NULL
	, business_phone VARCHAR(20) NULL DEFAULT NULL
	, business_whatsapp VARCHAR(20) NULL DEFAULT NULL
	, business_email VARCHAR(50) NULL DEFAULT NULL
	, business_address VARCHAR(100) NULL DEFAULT NULL
	, business_zip VARCHAR(10) NULL DEFAULT NULL
	, business_state VARCHAR(50) NULL DEFAULT NULL
	, business_country VARCHAR(50) NULL DEFAULT NULL
	, business_latitude VARCHAR(50) NULL DEFAULT NULL
	, business_longitude VARCHAR(50) NULL DEFAULT NULL
	, business_website VARCHAR(100) NULL DEFAULT NULL
	, business_type  VARCHAR(50) NULL DEFAULT NULL
	, business_entity VARCHAR(50) NULL DEFAULT NULL
	, business_scale VARCHAR(50) NULL DEFAULT NULL
	, business_about VARCHAR(2000) NULL DEFAULT NULL
	, business_services VARCHAR(2000) NULL DEFAULT NULL
	, business_abn VARCHAR(20) NULL DEFAULT NULL
	, business_tfn VARCHAR(20) NULL DEFAULT NULL
	, business_year_established INT(4) NULL DEFAULT NULL	
	, business_approved  TINYINT(1) NULL DEFAULT '0'
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business)
)
COMMENT='';


CREATE TABLE business_category (
	id_business_category INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, id_category INT(11)
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_category)
	, INDEX INDEX_business_category_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_category_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
	, INDEX INDEX_business_category_id_category (id_category)
	, CONSTRAINT FK_RELATIONSHIP_business_category_id_category FOREIGN KEY (id_category) REFERENCES category (id_category) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_validity (
	id_business_validity INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, validity_start VARCHAR(8) NULL DEFAULT NULL
	, validity_end VARCHAR(8) NULL DEFAULT NULL	
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_validity)
)
COMMENT='';

CREATE TABLE business_working_hour (
	id_business_working_hour INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, working_hour_status  INT(11) DEFAULT 1 
	, working_hour_day INT(11)
	, working_hour_time_start VARCHAR(20) NULL DEFAULT NULL
	, working_hour_time_end  VARCHAR(20) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_working_hour)
	, INDEX INDEX_business_working_hour_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_working_hour_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_media (
	id_business_media INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, media_name VARCHAR(100) NULL DEFAULT NULL
	, media_type VARCHAR(10) NULL DEFAULT NULL
	, media_path VARCHAR(100) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_media)
	, INDEX INDEX_business_media_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_media_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_tag (
	id_business_tag INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, tag_name  VARCHAR(100) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_tag)
	, INDEX INDEX_business_tag_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_tag_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_contact (
	id_business_contact INT(11) NOT NULL AUTO_INCREMENT
	, id_business INT(11)
	, contact_name VARCHAR(100) NULL DEFAULT NULL
	, contact_document_type VARCHAR(20) NULL DEFAULT NULL
	, contact_document VARCHAR(20) NULL DEFAULT NULL
	, contact_phone VARCHAR(20) NULL DEFAULT NULL
	, contact_email VARCHAR(50) NULL DEFAULT NULL 
		
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_contact)
	, INDEX INDEX_business_contact_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_contact_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_review (
	id_business_review INT(11) NOT NULL AUTO_INCREMENT,
	, id_business INT(11)
	, id_user INT(11)
	, review_comment VARCHAR(2000) NULL DEFAULT NULL
	, review_name VARCHAR(100) NULL DEFAULT NULL
	, review_email VARCHAR(100) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_review)
	, INDEX INDEX_business_review_id_business(id_business)
	CONSTRAINT FK_RELATIONSHIP_business_review_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

CREATE TABLE business_payment_method (
	id_business_payment_method INT(11) NOT NULL AUTO_INCREMENT,
	, id_business INT(11)
	, code_payment_method VARCHAR(2)
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_business_payment_method)
	, INDEX INDEX_business_payment_method_id_business(id_business)
	, CONSTRAINT FK_RELATIONSHIP_business_payment_method_id_business FOREIGN KEY (id_business) REFERENCES business (id_business) ON UPDATE CASCADE ON DELETE CASCADE
)
COMMENT='';

plan
category
page
location
email_template
user
user_book

CREATE TABLE plan (
	id_plan INT(11) NOT NULL AUTO_INCREMENT
	, plan_name VARCHAR(100) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_plan)
)
COMMENT='';

INSERT INTO `plan` (`id_plan`, `plan_name`) VALUES
(1, 'Gratis'),
(2, 'Premium');

CREATE TABLE category (
	id_category INT(11) NOT NULL AUTO_INCREMENT
	, category_name VARCHAR(100) NULL DEFAULT NULL
	, slug VARCHAR(100) NULL DEFAULT NULL
	, icon VARCHAR(100) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_category)
)
COMMENT='';

INSERT INTO `category` (`id_category`, `category_name`, `slug`, `icon`) VALUES
(1, 'Restaurantes', 'restaurantes', 'restaurantes.png'),
(2, 'Automotivo', 'automotivo', 'automotivo.png'),
(3, 'Saúde e bem estar', 'saude_bem_estar', 'saude_bem_estar.png'),
(4, 'Advogados', 'advogados', 'advogados.png'),
(5, 'Médicos', 'medicos', 'medicos.png'),
(6, 'Dentistas', 'dentistas', 'dentistas.png'),
(7, 'Mecânica', 'mecanica', 'mecanica.png'),
(8, 'Eletricistas', 'eletricistas', 'eletricistas.png'),
(9, 'Encanadores', 'encanadores', 'encanadores.png'),
(10, 'Cabeleireiro', 'cabeleireiro', 'cabeleireiro.png'),
(11, 'Salões de Beleza', 'saloes_beleza', 'saloes_beleza.png'),
(12, 'Construtores', 'construtores', 'construtores.png'),
(13, 'Florista', 'florista', 'florista.png');
		
CREATE TABLE page (
	id_page INT(11) NOT NULL AUTO_INCREMENT,
	, page_name VARCHAR(100) NULL DEFAULT NULL,
	, page_content VARCHAR(8000) NULL DEFAULT NULL,
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	PRIMARY KEY (id_page)
)
COMMENT='';

CREATE TABLE location (
	id_location INT(11) NOT NULL AUTO_INCREMENT,
	, location_name
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	PRIMARY KEY (id_location)
)
COMMENT='';

CREATE TABLE email_template (
	id_email_template INT(11) NOT NULL AUTO_INCREMENT
	, email_template_title VARCHAR(100) NULL DEFAULT NULL
	, email_template_content VARCHAR(8000) NULL DEFAULT NULL
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	PRIMARY KEY (id_email_template)
)
COMMENT='';

CREATE TABLE user_book (
	id_user_book INT(11) NOT NULL AUTO_INCREMENT
	, id_user INT(11)
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	PRIMARY KEY (id_user_book)
)
COMMENT='';

CREATE TABLE  (
	id_ INT(11) NOT NULL AUTO_INCREMENT,
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	PRIMARY KEY (id_)
)
COMMENT='';

CREATE TABLE  (
	id_ INT(11) NOT NULL AUTO_INCREMENT
	
	, fl_status TINYINT(1) NULL DEFAULT '1'
	, created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP
	, updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	, usuario_registra INT(11) NULL DEFAULT '0'
	, usuario_modifica INT(11) NULL DEFAULT '0'
	, PRIMARY KEY (id_)
)
COMMENT='';

