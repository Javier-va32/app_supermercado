# app_supermercado

Aplicación web básica en PHP que permite:

* Registrar usuarios

* Iniciar sesión

* Registrar ventas

* Generar comprobantes de compra

El sistema funciona con formularios HTML simples y backend en PHP, simulando un sistema de gestión para un supermercado.


## ¿Cómo se usa? 

**1. Requisitos previos:**

* Tener instalado XAMPP

* Tener habilitado Apache y MySQL desde el panel de control de XAMPP

**2. Pasos para ejecutarlo:**

```
1. Copia toda la carpeta del proyecto a:
   C:\xampp\htdocs\app_supermercado

2. Abre XAMPP y enciende el servidor Apache

3. Abre el navegador y ve a:
   http://localhost/app_supermercado/login.html
``` 

**3. Notas importantes:**

* El sistema no usa base de datos real aún.

* Los datos se procesan internamente con lógica PHP simple.

* El login no es seguro aún, está pensado solo con fines educativos.

## app_supermercado/

|Documento | Explicación |
|----------|-------------|
|modelo.php | Lógica de productos y precios
|login.php |  Procesa login
|comprobante.php | Muestra resumen de la compra
|registro_usuario.php | Procesa nuevo usuario
|registro_venta.php | Procesa la venta y calcula totales
|login.html | Formulario para iniciar sesión
|registro_usuario.html | Formulario para registrar usuario
|registro_venta.html | Formulario para registrar una venta


## Tecnologías utilizadas

* PHP puro (sin frameworks)

* HTML5

* Servidor local: XAMPP

Mejoras previstas

* Añadir CSS para mejorar el diseño

* Implementar un sistema de login seguro con validación real

* Integrar una base de datos MySQL usando phpMyAdmin

## Autor

Javier-va32
GitHubHistorial de ventas