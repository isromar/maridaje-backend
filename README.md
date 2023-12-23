# Backend de la Aplicación de Maridaje de Vinos

Este es el backend de la aplicación de maridaje de vinos, desarrollado con Symfony. El backend proporciona una API para gestionar vinos, bodegas, puntuaciones y recomendaciones de maridaje.

## Requisitos

- PHP 8.1 o superior
- Symfony 6.4
- MySQL 8.0 o superior

## Instalación

1. Clona este repositorio.
2. Ejecuta `composer install` para instalar las dependencias.
3. Configura las variables de entorno en el archivo `.env`.

## Uso

1. Ejecuta `symfony server:start` para iniciar el servidor de desarrollo.
2. La API estará disponible en `http://localhost:8000`.

## Endpoints

- `GET /vinos`: Obtiene la lista de vinos.
- `POST /vinos`: Crea un nuevo vino.
- `GET /vinos/{id}`: Obtiene los detalles de un vino específico.
- ...

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](./LICENSE) para más detalles.
