# Prueba tecnica - Transportes ACME S.A.

Proyecto Laravel 12 con CRUD de conductores, propietarios y vehiculos, mas informe con exportacion a PDF.

## Requisitos

- PHP 8.2+
- Composer
- Node.js / npm
- MySQL

## Pasos de instalacion

1. Instalar dependencias:
   - `composer install`
   - `npm install`

2. Configurar entorno:
   - Copiar `.env.example` a `.env`
   - Ajustar las variables de base de datos para MySQL:
     - `DB_DATABASE=acme`
     - `DB_USERNAME=root`
     - `DB_PASSWORD=`

3. Crear la base de datos en MySQL:
   - `CREATE DATABASE acme CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

4. Generar la llave de la app y ejecutar migraciones:
   - `php artisan key:generate`
   - `php artisan migrate`

5. Compilar assets:
   - `npm run build`

6. Iniciar el servidor:
   - `php artisan serve`

## Acceso a modulos

- Dashboard: `/dashboard`
- Conductores: `/admin/conductores`
- Propietarios: `/admin/propietarios`
- Vehiculos: `/admin/vehiculos`
- Informe: `/admin/informe/vehiculos`
- PDF: `/admin/informe/vehiculos/pdf`

## Notas

- El informe PDF se genera con `barryvdh/laravel-dompdf`.
- Las rutas del panel estan protegidas con `auth` y `verified`.
