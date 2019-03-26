# Nimter PHP Framework

![Version](https://img.shields.io/badge/version-1.2.0-orange.svg)   ![License](https://img.shields.io/badge/license-MIT-blue.svg) 

## Descripción del proyecto

Framework PHP modular de facil aprendizaje y de configuración intuittiva. Cuenta con esquema de diseño MVC, es escalable y configurable. Se diferencia de otros Frameworks debido a la simpleza en el manejo de sus controladores. Cuenta una clase para conexión a base de datos a través de PDO con soporte para Mysql/MariaDB y SQLite. Nimter está orientado para proyectos web pequeños y para todo aquel que desee inciarse en el lenguaje PHP de una forma menos intensiva.

## Requerimientos

* PHP 7.1.3 o superior
* APACHE 2
* Se requiere [Composer](https://getcomposer.org/)

## Instalación Recomendada

* En la consola correr el comando: 
```shell 
composer create-project "alxsmora/nimter:1.2.*" 
```

## Otras formas de instalar

* BitBucket: 
```shell 
git clone https://alxsmora1@bitbucket.org/alxsmora1/nimter.git
```

* GitHub: 
```shell 
git clone https://github.com/alxsmora1/Nimter.git
```

### Instalación de las dependencias

* Una vez finalizada la descarga del repositorio, dentro del directorio /Nimter/Core correr el siguiente comando por consola: 
```shell
composer install
```

## Recomendaciones

* Mantener el archivo .htaccess para poder usar el framework de manera correcta tanto en ambientes de desarrollo como en producción.

## Dependencias

### Requerido

* [Twig 2](https://twig.symfony.com/doc/2.x/)
* [Symfony/yaml](https://symfony.com/doc/current/components/yaml.html)

### Dev

* [Symfony/var-dumper](https://symfony.com/doc/current/components/var_dumper.html)
* [Symfony/debug](https://symfony.com/doc/current/components/debug.html)

## Autor

* **Alexis Mora** - [Cuenta de Twitter](https://twitter.com/alxsmora1)