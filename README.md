# DWES → AEV1 - Crear un Modelo Vista Controlador.

## Descripción:

Esta actividad evaluable consiste en crear una aplicación que cumpla los criterios vistos en el bloque 1.
Debemos crear un proyecto que cumpla con el patrón MVC, que tenga un sistema de enrutamiento mediante el autoload de composer y los namespaces. También usaremos TWIG para implementar las plantillas visuales

## Recursos generales:

Presentaciones y videos de Temas 3:
#### • Introducción a TWIG
#### • Todas las del Tema 1 y 2
Material de apoyo:
#### • The Twig book
#### • Y de más links del tema en Florida Oberta.
## Recursos adicionales:
#### • Script creación BB.DD. todolist en formato SQL.
#### • Zip de plantillas HTML old_wall

## Actividades:
Para ello se pide:
### 1. Crea un proyecto con la estructura típica que se ha visto en el tema 1 y 2 de MVC y TWIG.
### 2. Instala el autoloader de Composer (el gestor de dependencias que vamos a usar todo el curso).
### 3. La conexión a la BB.DD. debe realizarse siguiendo el patrón Singleton.
### 4. La estructura de carpetas estará compuesta por:
#### •  Config → Obtén la información de conexión de BB.DD. desde un fichero JSON. Incorpora en el mismo (o en un fichero separado) el enrutado de la aplicación. Es decir, que rutas se corresponden con qué controladores. Crea las clases necesarias para la gestión de esta información.
#### • Public → Donde vamos a alojar el frontController, que llamaremos index.php, del proyecto como único punto de entrada al mismo. Además, en esta carpeta podemos depositar todos archivos como imágenes, css, etc… auxiliares de nuestro proyecto.
#### • Src → Contendrá la lógica de todo el proyecto mediante las siguientes subcarpetas:
###### • Controllers→ Estará contenida toda la lógica de los controladores que sea necesaria para hacer funcionar la aplicación con todas las rutas permitidas.
###### • Models→ Se adjunta un fichero SQL para exportar la BB.DD., empresa.sql. Con la que poder importarla a tú MySQL y generar las clases para obtener los datos necesarios. Toda la lógica del modelado de la BB.DD. debe estar en esta carpeta.
###### • Core → En esta carpeta incluiremos todas las clases necesarias para el autoload, interfaces y demás clases que harán funcionar el MVC.
###### - Interfaces →  Deberá contener todos los interfaces que sean necesarios para definir los métodos mínimos que garanticen que la aplicación pueda ser escalada adecuadamente como un MVC.
###### • Templates → Donde tendremos contenidas todas las plantillas TWIG de nuestra aplicación.

### 5. La aplicación contendrá como máximo las siguiente rutas:
#### 5.1. / o raíz → Cargará la template: *index.html.twig*. Además, añadiremos según la estructura de la plantilla unos botones, links u otra acción que nos permita ir a las otras rutas que tenemos que se piden en el ejercicio.
#### 5.2. /productsList → Cargará la lista de todos los productos. El template: *productsList.html.twig* extenderá de *layout.html.twig*. 
#### 5.3. /customersList → Cargará la lista de todos los clientes mostrando solo los datos de código de cliente y nombre, en el detalle se mostrarán todos los datos.El template: *customersList.html.twig* extenderá de *layout.html.twig*.
#### 5.4. /customersDetail → Cargará el detalle de un cliente mostrando todos los datos.El template: *customerDetail.html.twig* extenderá de *layout.html.twig*.
#### 5.5. /departmentsList → Cargará la lista de todos los departamentos.El template: *departmentsList.html.twig* extenderá de *layout.html.twig*.
#### 5.6. /employesList → Cargará la lista de todos los empleados o los empleados que hay un departamento. El template: *employesList.html.twig* extenderá de *layout.html.twig*.
#### 5.7. /ordersList → Cargará la lista de todos los pedidos de un cliente mostrando solo el número pedido, en el detalle del pedido ya se mostrarán todos los datos.El template: *ordersList.html.twig* extenderá de *layout.html.twig*.
#### 5.8. /orderDetail → Cargará el detalle de un pedido, mostrando todos los datos.El template: *customersList.html.twig* extenderá de *layout.html.twig*.

### 6. Formato TWIG → Hay que formatear:
#### 6.1. Las fechas al formato dd/mm/aaaa usando los filtros TWIG.
#### 6.2. Los textos deben estar todos en minúsculas, salvo la primera letra de títulos y nombres que estará en mayúsculas.
#### 6.3. Todos los valores económicos de dinero deberán estar filtrados con el símbolo de € y deberán mostrar siempre dos decimales.

## License

This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>


## Credits

Authors: Ana Piqueras Jiménez([](https://github.com/)) 
