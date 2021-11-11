# Instrucciones para configurar un entorno local con Docker
Para configurar la aplicación localmente necesita
- Docker
- Docker Compose

Después de clonar el repositorio, haga lo siguiente
Duplique el archivo .env.example y cámbiele el nombre a **.env**

cambie el nombre de la base de datos al nombre que usará en su base de datos local del proyecto

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

**NOTA:** En DB_HOST=db

Luego ejecuta el comando:

`docker-compose --env-file .env up --build`

Ahora puede ir a localhost: 8000 y verlo en ejecución
