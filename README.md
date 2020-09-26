# Instalacion 

> Tener instalado
> * PHP 7 o superior
>
> * MariaDB o Mysql
>
> * Composer


## 1 - Instalar Symfony Cli
Se instala Symfony Cli para tener un servidor

[Link instalar Symfony-cli](https://symfony.com/download "Descargar symfony cli")

## 2 - Instalar vendor
Dentro de la carpeta del proyecto ejecutar el siguiente comando para instalar la carpeta de vendor
~~~ bash
composer install
~~~

## 3 - Crear base de datos y tablas
Dentro de la carpeta del proyecto ejecutar los siguientes comandos para crear la base de datos y tablas
~~~ bash
php bin/console doctrine:database:create
~~~
~~~ bash
php bin/console doctrine:schema:update --force
~~~

## 4 - Ejecutar el servidor
Una vez instalado symfony cli ejecutar dentro del proyecto el siguiente comando
~~~ bash
symfony serve
~~~

***

## Ejemplo Symfony cli servidor

![alt text](https://raw.githubusercontent.com/christian-contreras-zamudio/conversion-divisa-symfony5/master/docs/symfony-cli.gif "Symfony cli")

## Crear base de datos y tablas

![alt text](https://raw.githubusercontent.com/christian-contreras-zamudio/conversion-divisa-symfony5/master/docs/crear-bd-y-tablas.gif "Crear base de datos y tablas")


## Muestra de aplicación

![alt text](https://raw.githubusercontent.com/christian-contreras-zamudio/conversion-divisa-symfony5/master/docs/ejemplo-de-app.gif "Muestra de aplicación")