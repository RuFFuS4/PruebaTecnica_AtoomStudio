# Sistema de Gestión de Restaurantes

## Descripción

Este proyecto es un sistema de gestión de restaurantes desarrollado en Symfony, que permite a los usuarios ver información sobre diferentes restaurantes, gestionarlos a través de una interfaz de administrador y acceder a los datos a través de una API REST.

## Características

- Listado de restaurantes
- Detalles del restaurante
- API REST para restaurantes
- Área de administración para gestionar restaurantes
- Comando para exportar nombres de restaurantes a un archivo TXT

## Tecnologías Utilizadas

![Symfony](https://img.shields.io/badge/symfony-%23000000.svg?style=for-the-badge&logo=symfony&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
- API Platform / EasyAdmin
- MakerBundle / FixtureBundle

## Instalación y Configuración

Instrucciones paso a paso para poner en funcionamiento el proyecto:

### Requisitos Previos

- PHP 8.0+
- Symfony
- Composer
- MySQL o similar

### Pasos de Instalación

1. Clonar el repositorio:

[![Android](https://img.shields.io/github/stars/RuFFuS4/PruebaTecnica_AtoomStudio?label=Prueba%20Técnica%20Atoom%20Studio&style=social)](https://github.com/RuFFuS4/PruebaTecnica_AtoomStudio)

```shell
git clone https://github.com/RuFFuS4/PruebaTecnica_AtoomStudio.git
```

2. Instalar dependencias:

```shell
composer install
```

3. Configurar la base de datos en `.env` y ejecutar migraciones:

```yml
DATABASE_URL="mysql://user:password@host:port/database_name?serverVersion=8.0.32&charset=utf8mb4"
```

```shell
symfony console make:migration

php bin/console doctrine:migrations:migrate
```

4. (Opcional) Cargar datos de prueba:

```shell
php bin/console doctrine:fixtures:load
```

## Uso

- Para iniciar el servidor local:

```shell
symfony server:start
```

- Acceder a [`http://localhost:8000/`](http://localhost:8000/) en el navegador.

- Para acceder a la zona de administración, dirijase a la ruta [`http://localhost:8000/admin`](http://localhost:8000/admin)

- Para poder hacer uso de la API REST, dirijase a la ruta [`http://localhost:8000/api`](http://localhost:8000/api)

- Para realizar la exportación de restaurantes:

[`http://localhost:8000/restaurants/export`](http://localhost:8000/restaurants/export)

```shell
php bin/console app:restaurants:export
```

---

Documento creado por Rafael Gómez Rubio.