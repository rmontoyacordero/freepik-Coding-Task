# freepik Country Checker API

Para levantar el proyecto tenemos que levantar los contenedores dentro de la carpeta deployments

**_docker-compose up_**

Una vez levantado el docker tendremos que meternos dentro para poder instalar las dependencias con composer en la ruta /var/www/html/

**_composer install_**

La api esta levantada por defento en http://localhost:8080/country-check/{countryCode}
