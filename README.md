Aplicación web para la gestión de citas de una barbería, desarrollada con PHP siguiendo el patrón MVC, base de datos MySQL y frontend dinámico con JavaScript y SASS.

Incluye:

Registro y confirmación de usuarios por email
Login de clientes y administrador
Reserva de citas (servicios, fecha y hora)
Panel de administración
Gestión de servicios
Visualización de citas por fecha

🛠️ Tecnologías utilizadas

PHP 8
MySQL
PHP MVC
JavaScript (Fetch API)
SASS
Gulp
Composer
PHPMailer
Mailtrap (entorno de pruebas)

appsalon-mvc-php/
│
├── classes/
├── controllers/
├── includes/
├── models/
├── public/          ← Punto de entrada del servidor
├── src/             ← JS y SCSS
├── views/
│
├── appsalon_mvc_php.sql
├── Router.php
├── composer.json
├── package.json
├── gulpfile.js
└── README.md

⚙️ Requisitos previos

Antes de iniciar el proyecto necesitas tener instalado:

PHP 8 o superior
MySQL
Composer
Node.js y npm
Git

1️⃣ Clonar el repositorio
git clone https://github.com/MarGarRod10/appsalon-mvc-php.git
cd appsalon-mvc-php

2️⃣ Instalar dependencias de PHP
composer install

3️⃣ Instalar dependencias de Node
npm install

4️⃣ Compilar assets (JS y CSS)

Modo desarrollo:
npm run dev

5️⃣ Configurar la base de datos

Crear una base de datos en MySQL (por ejemplo):
CREATE DATABASE appsalon_mvc;

Importar el archivo:
appsalon_mvc_php.sql

Configurar la conexión en:
/includes/database.php

7️⃣ Iniciar el servidor PHP

⚠️ Muy importante: ejecutar el servidor desde la carpeta public
cd public
php -S localhost:8000

👤 Usuarios

Cliente
Registro con confirmación por email
Reserva de citas
Selección de servicios, fecha y hora
Administrador
Login como administrador
Ver citas por fecha
Crear, editar y eliminar servicios
Para acceso de administrador, el usuario debe tener el campo admin = 1 en la base de datos.

📌 Notas importantes

El proyecto está preparado para ejecutarse en entorno local
Los emails no se envían a correos reales (Mailtrap)
Los assets se generan automáticamente con Gulp

👨‍💻 Autor

Desarrollado por Mario García Rodríguez
Proyecto realizado como práctica de desarrollo web backend con PHP MVC.
