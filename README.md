# CRUD de Pacientes e inicio de sesion – Laravel

## Descripción
Aplicación web desarrollada en **Laravel** para la gestión de pacientes mediante un CRUD
(crear, listar, editar y eliminar).

El programa incluye inicio de sesion de usuarios, carga dinámica de departamentos y municipios con ajax,
migraciones y seeders para datos iniciales.

Este proyecto se desarrollo como **prueba técnica**.

## Tecnologías utilizadas
- PHP >= 8.0
- Laravel
- MySQL
- Blade
- JavaScript
- Bootstrap

## Requisitos
- PHP >= 8.0
- Composer
- MySQL
- Servidor local (XAMPP, Laragon o similar)

##Instalación y ejecución con bash

1. **Clonar el repositorio**

git clone https://github.com/MICHBONILLA/crud_pacientes_laravel.git

2. **Ingresar al proyecto**

cd crud_pacientes_laravel

3. **Instalar dependencias**

composer install

4. **configurar variables del entorno**

cp .env.example .env

5. **Configurar base de datos**

Crear una base de datos en MySQL con el nombre `crud_pacientes`.

El proyecto incluye migraciones y seeders, por lo que la estructura y los datos iniciales
pueden generarse ejecutando:

php artisan migrate --seed

Ademas se incluye un archivo SQL de respaldo en:

database/sql/crud_pacientes.sql

6. **Generar la clave de la aplicación**

php artisan key:generate

7. **Ejecutar migraciones y seeders**

php artisan migrate --seed

8. **Inicializar servidor**

php artisan serve

9. **Disponible en**

http://127.0.0.1:8000/login

11. **Usuario de prueba**

Documento:123456
clave:1234567890

Se puede modificar en database/seeders/UsuarioSeeder.php

Nota:
El archivo .env no se incluye por seguridad.


Desarollado por:

Michael Bonilla















