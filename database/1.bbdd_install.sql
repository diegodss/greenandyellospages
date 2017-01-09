---------------------------------------------------------------------
-- REGION --
---------------------------------------------------------------------
CREATE TABLE region (
    id_region SERIAL,
    
    nombre_region text, 
    orden_region integer,
	 
	fl_status boolean default '1', 
    created_at timestamp without time zone DEFAULT now(),
    updated_at timestamp without time zone ,
	usuario_registra int4 DEFAULT 0,
	usuario_modifica int4 DEFAULT 0,
	CONSTRAINT region_pkey PRIMARY KEY (id_region)
);

ALTER TABLE region OWNER TO postgres;
---------------------------------------------------------------------
-- COMUNA --
---------------------------------------------------------------------
CREATE TABLE comuna (
    id_comuna SERIAL,
    id_region integer, 
    
    nombre_comuna text, 
	id_serviciosalud integer,
	id_seremi integer,
	cod_comuna_deis integer,
    
	fl_status boolean default '1', 
    created_at timestamp without time zone DEFAULT now(),
    updated_at timestamp without time zone ,
	usuario_registra int4 DEFAULT 0,
	usuario_modifica int4 DEFAULT 0,

	CONSTRAINT comuna_pkey PRIMARY KEY (id_comuna)
    , CONSTRAINT fk_region_comuna FOREIGN KEY (id_region) REFERENCES region(id_region)
);

ALTER TABLE region OWNER TO postgres;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS "menu";
CREATE TABLE "menu" (
	id_menu SERIAL,
	nombre_menu varchar(255) COLLATE "default",
	id_menu_parent int4,
	item_menu int4 DEFAULT 1,
	"order" int4 DEFAULT 1,
	link varchar(255) COLLATE "default",
	slug varchar(50) COLLATE "default",
	visualizar int4 DEFAULT 1,
	agregar int4 DEFAULT 1,
	editar int4 DEFAULT 1,
	eliminar int4 DEFAULT 1,
	
	fl_status boolean default '1', 
    created_at timestamp without time zone DEFAULT now(),
    updated_at timestamp without time zone ,
	usuario_registra int4 DEFAULT 0,
	usuario_modifica int4 DEFAULT 0,
	
	CONSTRAINT menu_pkey PRIMARY KEY (id_menu) 
)
WITH (OIDS=TRUE);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "password_resets";
CREATE TABLE "password_resets" (
"email" varchar(255) COLLATE "default" NOT NULL,
"token" varchar(255) COLLATE "default" NOT NULL,
"created_at" timestamp without time zone DEFAULT now()
)
WITH (OIDS=TRUE);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS "role";
CREATE TABLE "role" (
	"id_role" SERIAL,
	"role" varchar(45) COLLATE "default",
	"created_at" timestamp without time zone DEFAULT now(),
	"updated_at" timestamp without time zone,
	CONSTRAINT role_pkey PRIMARY KEY (id_role) 
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Table structure for role_permiso
-- ----------------------------
DROP TABLE IF EXISTS "role_permiso";
CREATE TABLE "role_permiso" (
	"id_role_permiso" SERIAL,
	"id_role" int4,
	"id_menu" int4,
	"visualizar" int4 DEFAULT 1,
	"agregar" int4 DEFAULT 1,
	"editar" int4 DEFAULT 1,
	"eliminar" int4 DEFAULT 1,
	"created_at" timestamp without time zone DEFAULT now(),
	"updated_at" timestamp without time zone,  
	CONSTRAINT role_permiso_pkey PRIMARY KEY (id_role_permiso) 
)
WITH (OIDS=TRUE)

;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "users";
CREATE TABLE "users" (
	"id" SERIAL,	
	"id_role" int4,
	"name" varchar(255) COLLATE "default" NOT NULL,
	"email" varchar(255) COLLATE "default" NOT NULL,
	"password" varchar(255) COLLATE "default" NOT NULL,
	"active_directory" int4 DEFAULT 0 NOT NULL,
	"active_directory_user" varchar(100) COLLATE "default",
	"remember_token" varchar(100) COLLATE "default",
	"usuario_registra" int4,
	"usuario_modifica" int4,
	"created_at" timestamp without time zone DEFAULT now(),
	"updated_at" timestamp without time zone,  
	CONSTRAINT users_pkey PRIMARY KEY (id) 
)
WITH (OIDS=TRUE)

;
-- ----------------------------
-- Table structure for usuario_permiso
-- ----------------------------
DROP TABLE IF EXISTS "usuario_permiso";
CREATE TABLE "usuario_permiso" (
	"id_usuario_permiso" SERIAL,
	"id_usuario" int4,
	"id_menu" int4,
	"visualizar" int4 DEFAULT 1,
	"agregar" int4 DEFAULT 1,
	"editar" int4 DEFAULT 1,
	"eliminar" int4 DEFAULT 1,
	"created_at" timestamp without time zone DEFAULT now(),
	"updated_at" timestamp without time zone,  
	CONSTRAINT usuario_permiso_pkey PRIMARY KEY (id_usuario_permiso)
)
WITH (OIDS=TRUE);

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_idx" ON "password_resets" USING btree (email);
CREATE INDEX "password_resets_token_idx" ON "password_resets" USING btree (token);

-- ----------------------------
-- Indexes structure for table role_permiso
-- ----------------------------
CREATE INDEX "role_permiso_id_menu_idx" ON "role_permiso" USING btree (id_menu);
CREATE INDEX "role_permiso_id_role_idx" ON "role_permiso" USING btree (id_role);

-- ----------------------------
-- Indexes structure for table users
-- ----------------------------
CREATE UNIQUE INDEX "users_email_idx" ON "users" USING btree (email);

-- ----------------------------
-- Indexes structure for table usuario_permiso
-- ----------------------------
CREATE INDEX "usuario_permiso_id_menu_idx" ON "usuario_permiso" USING btree (id_menu);
CREATE INDEX "usuario_permiso_id_usuario_idx" ON "usuario_permiso" USING btree (id_usuario);

-- ----------------------------
-- vista vwusuariopermiso
-- ----------------------------
CREATE VIEW vw_usuario_permiso as (

	SELECT
		m.slug
		, up.id_usuario
		, up.visualizar
		, up.agregar
		, up.editar
		, up.eliminar
	FROM 
		usuario_permiso up
	INNER JOIN menu m ON (m.id_menu=up.id_menu)

);



