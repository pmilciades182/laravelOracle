# Laravel Oracle

Este proyecto es una aplicación web desarrollada con Laravel que utiliza Oracle como base de datos principal.

## Requisitos Previos

- PHP >= 8.1
- Composer
- Node.js & NPM
- Oracle Database
- Docker (opcional)

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/pmilciades182/laravelOracle.git
cd laravelOracle
```

2. Instalar dependencias de PHP:
```bash
composer install
```

3. Instalar dependencias de Node.js:
```bash
npm install
```

4. Configurar el archivo de entorno:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurar la conexión a Oracle en el archivo `.env`:
```env
DB_CONNECTION=oracle
DB_HOST=tu_host_oracle
DB_PORT=1521
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

6. Compilar assets:
```bash
npm run dev
```

## Configuración de Docker

El proyecto incluye configuración de Docker para desarrollo. Para iniciar el entorno Docker:

```bash
docker-compose up -d
```

## Estructura del Proyecto

- `app/` - Contiene la lógica principal de la aplicación
- `config/` - Archivos de configuración
- `database/` - Migraciones y seeders
- `resources/` - Vistas y assets
- `routes/` - Definición de rutas
- `tests/` - Pruebas unitarias y de integración

## Tecnologías Utilizadas

- Laravel 10.x
- Oracle Database
- Inertia.js
- React
- Tailwind CSS
- Docker

## Scripts Disponibles

- `validate-oracle.sh` - Script para validar la conexión a Oracle
- `test-oracle.php` - Script PHP para probar la conexión a Oracle

## Contribución

1. Fork el proyecto
2. Crea tu rama de características (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

## Contacto

Tu Nombre - [@tu_twitter](https://twitter.com/tu_twitter)

Link del Proyecto: [https://github.com/pmilciades182/laravelOracle](https://github.com/pmilciades182/laravelOracle)
