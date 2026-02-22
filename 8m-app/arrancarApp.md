1. **Clonar el repositorio:**
Instalar dependencias de PHP:
composer install

2. **Configurar el entorno:**
Copia el archivo de ejemplo y genera la clave de la aplicación:

cp .env.example .env
php artisan key:generate


3. **Preparar la base de datos:**
Crea el archivo de SQLite y ejecuta las migraciones junto con los datos de prueba (memes):



# En Windows (PowerShell):
New-Item database/database.sqlite

# En Linux/Mac:
touch database/database.sqlite

4. **Ejecutar migraciones y cargar memes**
php artisan migrate:fresh --seed

npm install

5. **Iniciar el servidor:**
php artisan serve