# Mental-Care-System
Requisitos
----------------
Para correr el proyecto se necesitará PHP y una base de datos llamada 'prescription'. Si lo desea puede configurar estos datos en el archivo .env en los parametros DB_DATABASE, DB_USERNAME, DB_PASSWORD.

Correr el proyecto
-----------------

1.- Ejecute php artisan migrate para crear las tablas en la base de datos que especifico. <br>
2.- Ejecute php artisan serve para correr el servidor.<br>
3.- Abra localhost:8000/medicamentos en el navegador.<br>

Código Fuente
-----------------
Las Vistas estan en la carpeta /resources/Views.<br>
Los Controladores estan en la carpeta /app/Http/Controllers. <br>
Las migraciones (tablas) estan en la carpeta /database/migrations. <br>

