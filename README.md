## 🚀 PASOS PARA INICIAR EL PROYECTO

1. **Clonar el repositorio** dentro de la carpeta `laragon/www` hacemos click derecho y seleccionamos git bash here donde ingresaremos el siguiente comando:  
   ```
   git clone <url del repositorio>
   ```
2. **Instalar dependencias con Composer**

- Ubicarse dentro del proyecto con el comando:

```
cd <nombre_del_proyecto>
```
- Instalar dependencias:

```
composer install
```
3. Configurar el archivo **.env** + **Database**
- En este archivo se deben colocar todos los datos necesarios para la conexión a la base de datos:
```
CI_ENVIRONMENT = development

database.default.hostname =
database.default.database =
database.default.username =
database.default.password =
database.default.DBDriver =
database.default.port =

```

4. Migracion de tabla y registros
- Dentro de la terminal en visual studio code ejecutamos los siguientes codigos para migrar la tabla hacia la base de datos como las semillas(registros).
- Para migrar la tabla

```
php spark migrate

```
- Para migrar la semilla
```
php spark db:seed Averias

```
5. Socket
- Para ejecutar nuestro socket y que realice sus tareas en tiempo real, utiliza el siguiente comando:
```
php server.php
```
6. Vista del Proyecto
- Al haber realizado todos los pasos anteriores, procedemos a darle al boton de **Iniciar Todo** de laragon.
- Por ultimo, ingresamos la ruta de nuestro proyecto 'http://tarea08.test/averias' en nuestro navegador.