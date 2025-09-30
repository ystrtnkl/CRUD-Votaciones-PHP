#!/bin/bash
#cd ..
docker compose down
docker compose up -d
docker exec -it crud-votaciones-mariadb-cont-1 /bin/chmod -R 777 /var/lib/mysql
docker exec -it apache_php-cont /bin/chmod -R 777 /var/www/html
#docker exec -it apache_php-cont /var/www/html/perms.sh

