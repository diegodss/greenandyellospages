#Sistemas Minsal

Los sistemas de Minsal son desarrollados con:

Laravel Framework version 5.2
PHP version 7.0
PostgreSQL version 9.4

#------- INSTALACION -----------
Para servidores Ubuntu:

Las librerias necesarias:
libapache2-mod-php 
postgresql 
php-pgsql 
php-xml 
php-soap 
php-mbstring


- Habilitar modulo rewrite
a2enmod rewrite

- Instalar Unzip
sudo apt-get install unzip

- Instalar CURL
sudo apt-get install php-curl

- Instalar Mcrypt
sudo apt-get install php-mcrypt

- Instalar ZipArchive
sudo apt-get install php7.0-zip

- Permisos de carpeta
sudo chmod 755 -R laravel_blog
chmod -R o+w laravel_blog/storage
chmod -R o+w laravel_blog/bootstrap

- Instalar module XML 
sudo apt-get install php7.0-xml.

#---------- CONFIGURACION ---------------

.ENV
Archivo que contiene informaciones de base de dados, envio de correos, y configuraciones de la aplicación

Apache
documentRoot de apache debe apuntar para la raiz de laravel: DocumentRoot /var/www/html/xxx_proyecto/public

Agregar codigo para configurar diretorios:
<Directory /var/www/html/auditoria/public/>
  Options Indexes FollowSymlinks
  AllowOverride All
  Require all granted
</Directory>
   
Como hacerlo:
cd /etc/apache2/sites-enabled
vi 000-default.conf
digitar: i (para empezar a editar)
digitar: esc :q o :x (para guardar despues de los cambios)
sudo service apache2 restart


/config/system.php
Archivo de configuracion que mantiene variables como nombre del sistema, paginacion estandar, codigo analytics, carpetas para upload de archivos etc.
Cualquier configuracion adicional de archivo devese mantener en este archivo.

/config/collection.php
Archivo que mantiene basicamente datos de dropdownlists o arrays de sistema que no son almazenados en base de datos. 
