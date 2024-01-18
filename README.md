# Prueba técnica para la vacante de desarrollador PHP - 12/2023

## Descripción de la prueba

Crea un portal Symfony que contenga la entidad `Restaurant`. No importa los atributos que tenga la entidad, mantenlo simple puesto que esta prueba deberia realizarse en menos de 2 horas. Puedes usar otro elemento para la entidad como `Book`, `Employee` o lo que quieras.

### Gestión y exhibición de entidades

Estas entidades deberán mostrarse en 2 formatos:

* **HTML**: Una URL que liste las entidades y una URL con la vista de detalle de una entidad. Por ejemplo `/restaurants` y `/restaurant/{id}`
* **JSON**: Haz accesibles las entidades en formato API REST en la URL `/api`. Por ejemplo `GET /api/restaurants` para obtener los restaurantes, `POST /api/restaurants` para añadir restaurantes, etc. Házlo como quieras pero en el estudio usamos [API Platform](https://api-platform.com/docs/core/getting-started/), ya que nos genera todas las rutas automáticamente. Si lo haces a mano, considera mantenerlo simple, por ejemplo haciendo sólo la ruta `GET` para no perder demasiado tiempo en este punto.

Este portal deberá poder gestionar entidades a través de un área de administrador. Igual que en el punto de la API, te recomendamos el uso de [Sonata Admin Bundle](https://symfony.com/bundles/SonataAdminBundle/current/index.html) o [Easy Admin Bundle](https://symfony.com/bundles/EasyAdminBundle/4.x/index.html). No es necesario que el área de administrador esté protegida tras un login ni que haya ningún sistema de gestión de usuarios y roles.

### Comandos y controladores

[Crea un comando de consola](https://symfony.com/doc/current/console.html#creating-a-command) que haga cualquier operación con la base de datos, por ejemplo:

* Contar todas las entidades
* Mostrar todos los nombres de restaurantes seperados por comas
* Cualquier otra cosa que se te ocurra, no tiene que ser compleja

Crea una ruta que haga exactamente lo mismo que el comando, sin ejecutar el comando en sí.

### Documentación

Incluye en la raíz del proyecto un archivo README.md con las instrucciones para ejecutar el proyecto en local y añadiendo cualquier explicación que creas necesaria para la persona que va a valorar la prueba.

## Ejemplo de prueba completada

* Creo la entidad Restaurant con los atributos title, body, website y rating
* Creo un área de administración para añadir / modificar / eliminar restaurantes
* Muestro el listado de restaurantes en la home, con enlaces en el título
* Los enlaces del título van a `/restaurant/{id}`, donde se muestra toda la información del restaurante.
* La ruta GET `/api/restaurants` muestra los restaurantes en formato JSON
* La ruta GET `/api/restaurant/{id}` muestra un único restaurante en formato JSON
* El comando de consola `php bin/console app:restaurants:export` guarda los títulos de los restaurantes en un archivo TXT
* La ruta `/resturants/export` hace lo mismo que el comando `app:restaurants:export`
* Documento la prueba en el archivo README.md

## A tener en cuenta

* Si tienes problemas para crear el comando de consola, simplemente crea 2 rutas distintas que hagan lo mismo, cualquier operacion con la base de datos.
* La página con el listado de entidades y el detalle de entidad debe usar la forma clásica de Modelo Vista Controlador, es decir, la vista debe renderizar un (o varios) archivo TWIG. No uses la API para renderizar el contenido con React o similar.
* Si te bloqueas en algún aspecto, salta esa parte y sigue con lo demás. Seguro que puedes aprovechar ese tiempo mostrando tus habilidades en otro aspecto.
* Los bundles propuestos los usamos en nuestros proyectos, nos interesa ver si los conoces y cómo los usas. Si no los conoces y/o te dan problemas, usa otro bundle que conozcas (¡quizás nos convences para cambiar nuestro stack!), programa tu la misma funcionalidad o salta esa parte.
* Sube el código en un proyecto público en tu cuenta de GitHub

## Se valorará

* El uso de GIT (¡ves haciendo commits a medida que desarrolles funcionalidades!)
* El uso de los bundles especificados o soluciones alternativas
* El uso de elementos comunes de Symfony como controladores, comandos, entidades y servicios.
* La capacidad de explicar el trabajo realizado tanto en la documentación como en la entrevista posterior

## Si te sobra tiempo

* HTML/CSS/JS: lúcete en el frontend
* Gestionar el contenido en multiples idiomas (solemos usar https://github.com/KnpLabs/DoctrineBehaviors/)
* Añade tests
* Añade un formulario de contacto
* Configura un entorno de desarrollo con Docker, Lando o similar
* ¿Hay algo que se te de especialmente bien pero no te lo estamos pidiendo? ¡Añádelo aunque no encaje!

