* Documentación:
* Instrucciones para Ejecutar la Aplicación

* Clonar el Repositorio:

git clone https://github.com/Rumaldo24/crudProductos.git

-Instalar Dependencias: Asegúrate de tener Composer instalado. Luego, instala las dependencias del proyecto ejecutando:

composer install

-Configurar el Archivo .env: Copia el archivo de ejemplo de configuración y renómbralo:

.env.example  --> .env
* Abre el archivo .env y configura los parámetros de la base de datos (nombre de la base de datos, etc.) de acuerdo con tu entorno:

Crear la Base de Datos: Asegúrate de que la base de datos especificada en el archivo .env exista. Si no, puedes crearla utilizando tu gestor de base de datos, como MySQL.

* Ejecutar las Migraciones: Para crear las tablas necesarias en la base de datos, ejecuta:

php artisan migrate

* Iniciar el Servidor de Desarrollo: Finalmente, inicia el servidor local de Laravel usando el siguiente comando:

php artisan serve
Ahora, puedes acceder a la aplicación en tu navegador en http://localhost:8000.

* Decisiones Tomadas Durante el Desarrollo:

* Implementación del CRUD: 
    Se implementó un sistema CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar productos. Esta funcionalidad es esencial para cualquier aplicación de gestión de inventario. Se decidió usar migraciones para definir la estructura de la base de datos, lo que permite un versionado fácil y la capacidad de revertir cambios.

* Validaciones de Datos: 
    Se implementaron validaciones en el controlador para garantizar que los datos ingresados por el usuario sean correctos y seguros. Esto incluye verificar que el precio tenga un formato válido y que no se ingresen valores negativos.

* Interfaz de Usuario: 
    Se utilizó Bootstrap para el diseño de la interfaz de usuario, lo que permite un diseño responsivo que se adapta a diferentes dispositivos. Esto mejora la accesibilidad y la experiencia del usuario final.

* Uso de Iconos:
      Se optó por usar Font Awesome para los iconos de acción (ver, editar, eliminar), lo que mejora la estética de la interfaz y hace que sea más intuitiva para los usuarios.

* Control de Errores: 
    Se implementó un manejo adecuado de errores en el frontend, mostrando mensajes de error claros y visibles cuando las validaciones fallan. Esto facilita que los usuarios comprendan qué necesitan corregir.
