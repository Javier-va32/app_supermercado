# FreshMarket – Sistema Web de Ventas Básico

Aplicación web académica desarrollada con PHP y MySQL, orientada a simular el flujo básico de ventas de un supermercado.

El proyecto fue creado originalmente como trabajo práctico formativo y posteriormente mejorado para dejarlo como referencia de aprendizaje en desarrollo web backend básico.

---

## Objetivo del proyecto

Aplicar conceptos fundamentales de desarrollo web:

- Formularios HTML
- Procesamiento de datos con PHP
- Conexión a base de datos MySQL
- Registro de usuarios
- Registro de ventas
- Consultas SQL básicas
- Navegación entre páginas
- Organización simple tipo MVC

---

## Tecnologías utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- XAMPP (Apache + MySQL)

---

## Funcionalidades

### Gestión de usuarios

- Registro de nuevos usuarios
- Validación de nombre de usuario
- Verificación de usuarios duplicados
- Inicio de acceso mediante nombre de usuario

### Gestión de ventas

- Selección de productos
- Ingreso de cantidades
- Cálculo automático de subtotales
- Registro de compras en base de datos
- Generación de comprobante final

### Experiencia de usuario

- Navegación entre formularios
- Autocompletado del nombre del cliente luego del acceso
- Interfaz visual simple y clara

---

## Estructura del proyecto

```text
app_supermercado/
└── index.php
└── controlador/
   └──comprobante.php
   └──login.php
   └──registro_usuario.php
   └──registro_venta.php
└── modelo/
   └──modelo.php
└── vista/
   └──css
      └──styles.css
   └──login.html
   └──registro_usuario.html
   └──registro_venta.html
└── database/
│   └── schema.sql
└── README.md
```
## Base de datos

El proyecto sí utiliza base de datos MySQL.

Incluye tablas para:

- usuarios
- ventas_usuario
---

El script de creación se encuentra en:
```
database/schema.sql
```
## Instalación local

1. Instalar y ejecutar XAMPP
2. Activar Apache y MySQL
3. Copiar el proyecto en la carpeta htdocs
4. Importar database/schema.sql en phpMyAdmin
5. Abrir en navegador: http://localhost/app_supermercado/

## Lo aprendido

Durante este proyecto se practicaron conceptos como:

- estructura básica MVC
- uso de mysqli
- consultas preparadas (prepare)
- validación de formularios
- flujo entre páginas con PHP
- integración frontend + backend + base de datos

## Estado del proyecto

Finalizado.

Se conserva como proyecto histórico de aprendizaje y práctica inicial en desarrollo web con PHP.

No se contempla continuar su desarrollo, ya que actualmente mi enfoque principal está orientado a Java backend y tecnologías modernas.

Autor

Javier Valenzuela