## Acerca

Solución para la prueba de Silent4Bussines (Construye un proyecto para manejar compañías y empleados)

#### Tecnologías usadas

-   [Laravel](https://laravel.com/docs/8.x).
-   Iconos - [Fontawesome](https://fontawesome.com/)
-   Tablas - [DataTables](https://datatables.net/).
-   Gráficas - [ChartJs](https://www.chartjs.org/).
-   Flash Alert - [Toastr](https://codeseven.github.io/toastr/#:~:text=toastr%20is%20a%20Javascript%20library,Growl%20type%20non%2Dblocking%20notifications.&text=The%20goal%20is%20to%20create,can%20be%20customized%20and%20extended.).
-   Alertas - [SweetAlert2](https://sweetalert2.github.io/).

## Inicializar el proyecto

##### Se tiene que instalar las dependencias para PHP.

```
composer install
```

##### Se tiene que instalar las dependencias de node y compilarlas para laravel mix.

```
npm install
npm run dev
```

##### Se tiene que clonar contenido del archivo .env.example

```
cp .env.example .env
```

##### Se tiene que generar APP_KEY y prueba

```
php artisan key:generate
```

##### Se tiene que ejecutar las migraciones

```
php artisan migrate --seed
```

##### Se tiene que crear un link simbólico de la carpeta storage para poder accederla desde la carpeta /public.

```
php artisan storage:link
```
