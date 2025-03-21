# Laravel + React + Oracle con Docker

Este proyecto es una aplicación web que utiliza Laravel 12, React y Oracle Database, todo configurado con Docker Compose.

## Requisitos

- Docker
- Docker Compose

## Instalación

1. Clonar el repositorio:
```bash
git clone <url-del-repositorio>
cd laravel-oracle
```

2. Copiar el archivo de entorno:
```bash
cp .env.example .env
```

3. Generar la clave de la aplicación:
```bash
docker-compose run --rm app php artisan key:generate
```

4. Iniciar los contenedores:
```bash
docker-compose up -d
```

5. Instalar dependencias de Node.js:
```bash
docker-compose run --rm app npm install
```

6. Compilar assets:
```bash
docker-compose run --rm app npm run dev
```

7. Ejecutar migraciones:
```bash
docker-compose run --rm app php artisan migrate
```

## Acceso a la aplicación

- Frontend: http://localhost:8000
- API: http://localhost:8000/api

## Estructura del proyecto

- `app/` - Código de la aplicación Laravel
- `resources/js/` - Componentes y páginas de React
- `docker/` - Configuraciones de Docker
- `database/` - Migraciones y seeders

## Servicios

- Laravel (PHP 8.2 + FPM)
- Nginx
- Oracle Database Express Edition
- React (con Inertia.js)

## Desarrollo

Para desarrollo local:

1. Compilar assets en modo desarrollo:
```bash
docker-compose run --rm app npm run dev
```

2. Ver logs:
```bash
docker-compose logs -f
```

3. Acceder al contenedor de Laravel:
```bash
docker-compose exec app bash
```

## Producción

Para producción:

1. Compilar assets para producción:
```bash
docker-compose run --rm app npm run build
```

2. Optimizar Laravel:
```bash
docker-compose run --rm app php artisan optimize
```

## Notas

- La base de datos Oracle se inicializa automáticamente al primer inicio
- Las credenciales por defecto de Oracle son:
  - Usuario: system
  - Contraseña: oracle
  - SID: XE
