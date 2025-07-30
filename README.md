
# SIS0151\_TW2 - Sistema de Ventas

Este repositorio contiene tres proyectos:

* `projectLvl/`: Aplicación principal en Laravel + Livewire + Jetstrema.
* `projectMvc/`: Aplicación PHP con estructura MVC personalizada.
* `restApi/`: API REST hecha en Laravel.

---

## 📦 Requisitos

* PHP >= 8.1
* Composer
* MySQL o MariaDB
* Node.js y NPM (para compilar assets)
* Laravel 10+

---

## 💄 Migraciones

> ⚠️ Todas las migraciones están en el proyecto `projectLvl`.

Antes de usar cualquier proyecto, primero debes:

```bash
cd projectLvl
cp .env.example .env
php artisan key:generate
php artisan migrate
```


---

## 🚀 Cómo iniciar cada proyecto

### 🔹 `projectLvl` 

```bash
cd projectLvl
composer install
npm install && npm run dev
php artisan serve
```

### 🔹 `projectMvc` (PHP puro)

```bash
cd projectMvc
php -S localhost:8001 -t public/
```

Asegúrate de que `public/` es el punto de entrada.

### 🔹 `restApi` (Laravel API)

```bash
cd restApi
composer install
php artisan serve --port=8002
```

---

## 📱 Endpoints del API (`restApi`)

| Recurso        | Ruta          | Método |
| -------------- | ------------- | ------ |
| Productos      | `/productos`  | GET    |
| Clientes       | `/clientes`   | GET    |
| Ventas         | `/ventas`     | GET    |
| Ventas del mes | `/ventas/mes` | GET    |

---


