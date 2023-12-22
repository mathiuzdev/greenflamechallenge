# Documentación de Panel con Laravel para administrar descuentos

## Introducción
Esta documentación proporciona instrucciones para la instalación y uso de un panel administrativo desarrollado con PHP 8.1, Laravel 10.22 y el paquete Filament 3.0, puede optar realizar la instalacion y ver el deploy en el siguiente link: [DEPLOY](http://serverfantasy.ddns.net:8000/admin/) el mismo se encuentra alojado en un servidor UBUNTU, en caso de ingresar por el deploy oprima [Uso del panel](#uso-del-panel)

## Requisitos 

- PHP 8.1 o superior.
- Composer instalado.
- Base de datos MySQL configurada.
- Laravel 10 o superior.
- Conexión a Internet para descargar dependencias.

# Instalación

### Paso 1: Clonar el Repositorio
```bash
git clone https://github.com/mathiuzdev/greenflamechallenge discount-panel
cd discount-panel
```
### Paso 2: Instalar Dependencias
```bash
composer install
```

### Paso 3: Configurar archivo .env
- Muy importante colocar bien el acceso a la base de datos para las migraciones.
- Renombra el archivo .env.example a .env y configura tus credenciales de base de datos.
### Paso 4: Ejecutar Migraciones
```bash
php artisan migrate
```
### Paso 5: Iniciar el servidor
```bash
php artisan serve
```


## Introducción

Esta documentación proporciona una visión general de la estructura de carpetas y la lógica principal de la aplicación desarrollada con Laravel y Filament. La aplicación está diseñada para gestionar descuentos y sus relaciones con rangos de aplicación.

## Estructura de Carpetas

La mayor parte de la lógica de la aplicación se encuentra en la carpeta `app`, específicamente en las siguientes ubicaciones:

- **app/Filament**: En esta carpeta se encuentra la configuración y personalización de Filament, que es un paquete de administración para Laravel.

- **app/Filament/Resources**: Aquí se crea el recurso "Descuento" y se establecen las relaciones con los rangos de aplicación de descuentos. La estructura de archivos dentro de esta carpeta determina cómo se mostrarán y gestionarán los recursos en el panel de administración de Filament.

## Recurso Descuento

El recurso "Descuento" es una parte fundamental de la aplicación y se encuentra en `app/Filament/Resources/DiscountsResource`. Este recurso define cómo se administran y visualizan los descuentos en el panel de administración. Puedes personalizar campos, reglas de validación y acciones específicas para este recurso.

## Relaciones con Rangos de Aplicación

Dentro del recurso "Descuento", se puede configurar relaciones con los rangos de aplicación de descuentos(discounts_ranges). Esto permite establecer conexiones entre descuentos y los rangos de fechas o condiciones en los que se aplicarán. Estas relaciones se definen en el archivo `app/Filament/Resources/Descuento/RelationManagers/DiscountRangesRelationManager`.

## Modelos y Accesos

Los modelos utilizados en la aplicación, incluidos los modelos para descuentos y rangos de aplicación, se encuentran en la carpeta `app/Models`. Estos modelos definen la estructura de datos y las relaciones entre ellos.

Los accesos a la base de datos se gestionan a través de los modelos y se definen en las respectivas clases de modelo.

## Conclusión

La estructura de carpetas y la lógica principal de la aplicación se centran en la carpeta `app`, especialmente en la personalización de Filament y la definición del recurso "Descuento" - "Discount".

## Uso del panel 
### Paso 1: Ingresar al panel
Accede al panel de administración a través de la URL.
```bash
0.0.0.0/admin
```
### Paso 2: Logear con el usuario admin
```bash
admin@example.com
password
```
### Paso 3: Podra visualizar los descuentos pre cargados.
![Discounts list](https://i.gyazo.com/81365c67ca7b739a340587e577091476.png)

### Paso 4: Crear un descuento.
![Discounts add](https://i.gyazo.com/17139b4014eed2dd678ec674aece62fb.png)
Luego de crear un descuento se habilita el panel para poder agregar periodos de aplicacion, cupones y descuentos 
![Ranges add](https://i.gyazo.com/5a586ede3a9b73b4f4c743b4e084683b.png)

### Paso 5: Utilizar filtros y etiquetas ordenables.
Al presionar sobre Brand Name, Active o Priority se va a poder ordenar depenediendo la seleccion.
![filters](https://i.gyazo.com/7b36c22374440afe4a5231b1b097c6f4.png)
