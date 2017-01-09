-- Menu --
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (1, E'Mantenedores', 0, 1, 1, E'#', E'mantenedores', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (4, E'Sistema', 0, 1, 3, E'#', E'sistema', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (5, E'Usuario', 4, 1, 1, E'/usuario', E'usuario', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (6, E'Role', 4, 1, 2, E'/role', E'role', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (7, E'Menu', 4, 1, 3, E'/menu', E'menu', 1, 1, 1, 1, E'true', E'2016-07-29 08:00:27.65', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (2, E'Regiones', 1, 1, 1, E'/region', E'region', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
INSERT INTO "menu" ("id_menu", "nombre_menu", "id_menu_parent", "item_menu", "order", "link", "slug", "visualizar", "agregar", "editar", "eliminar", "fl_status", "created_at", "updated_at", "usuario_registra", "usuario_modifica") VALUES (3, E'Comunas', 1, 1, 2, E'/comuna', E'comuna', 1, 1, 1, 1, E'true', E'2016-07-29 07:59:49.808', NULL, 0, 0);
ALTER SEQUENCE menu_id_menu_seq RESTART 7;

-- Role --
INSERT INTO "role" ("id_role", "role", "created_at", "updated_at") VALUES (1, E'Administrador', E'2016-07-28 21:04:44', E'2016-07-28 21:04:44');
INSERT INTO "role" ("id_role", "role", "created_at", "updated_at") VALUES (2, E'Usuario', E'2016-07-28 21:05:20', E'2016-07-28 21:05:20');
ALTER SEQUENCE role_id_role_seq RESTART 3;

-- Role Permiso --
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (1, 1, 1, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (2, 1, 2, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (3, 1, 3, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (4, 1, 4, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (5, 1, 5, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (6, 1, 6, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (7, 1, 7, 1, 1, 1, 1, E'2016-09-07 18:03:42', E'2016-09-07 18:03:42');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (8, 2, 1, 1, 1, 1, 1, E'2016-09-07 18:04:05', E'2016-09-07 18:04:05');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (9, 2, 2, 1, 1, 1, 1, E'2016-09-07 18:04:05', E'2016-09-07 18:04:05');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (10, 2, 3, 1, 1, 1, 1, E'2016-09-07 18:04:05', E'2016-09-07 18:04:05');
INSERT INTO "role_permiso" ("id_role_permiso", "id_role", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (11, 2, 5, NULL, NULL, 1, NULL, E'2016-09-07 18:04:05', E'2016-09-07 18:04:05');
ALTER SEQUENCE role_permiso_id_role_permiso_seq RESTART 12;

-- Users --
INSERT INTO "users" ("id", "id_role", "name", "email", "password", "active_directory", "active_directory_user", "remember_token", "usuario_registra", "usuario_modifica", "created_at", "updated_at") VALUES (1, 1, E'Admin', E'admin@minsal.cl', E'$2y$10$EfAZLj3G2V5TraQweUNu8.j81I2OMkqAcUOWB3138iy2rPigxxzUq', 0, E'1', E'R5tu2DZdir35pqhad7PVqmgEUNdThvrMUrDKPV1UMFQ4qM9piJ5AmkdTQoXI', 1, 1, E'2016-07-28 14:46:40', E'2016-09-07 18:15:06');
INSERT INTO "users" ("id", "id_role", "name", "email", "password", "active_directory", "active_directory_user", "remember_token", "usuario_registra", "usuario_modifica", "created_at", "updated_at") VALUES (2, 1, E'Diego da Silva', E'diego.dasilva@minsal.cl', E'$2y$10$EfAZLj3G2V5TraQweUNu8.j81I2OMkqAcUOWB3138iy2rPigxxzUq', 0, E'1', E'qk4i9SZv623KYPzVJ8jtApo7CfPhPcgExuKL2H4kmWLJrSlpfh7jxktuqVsg', 1, 1, E'2016-07-28 14:46:40', E'2016-09-07 18:18:38');
ALTER SEQUENCE users_id_seq RESTART 3;
-- Usuario Permiso --

INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (1, 2, 1, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (2, 2, 2, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (3, 2, 3, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (4, 2, 4, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (5, 2, 5, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (6, 2, 6, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (7, 2, 7, 1, 1, 1, 1, E'2016-09-07 18:18:38', E'2016-09-07 18:18:38');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (8, 1, 1, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (9, 1, 2, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (10, 1, 3, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (11, 1, 4, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (12, 1, 5, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (13, 1, 6, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
INSERT INTO "usuario_permiso" ("id_usuario_permiso", "id_usuario", "id_menu", "visualizar", "agregar", "editar", "eliminar", "created_at", "updated_at") VALUES (14, 1, 7, 1, 1, 1, 1, E'2016-09-07 18:15:06', E'2016-09-07 18:15:06');
ALTER SEQUENCE usuario_permiso_id_usuario_permiso_seq RESTART 15;

