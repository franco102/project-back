<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre el Projecto de estudiantes con Laravel 11 y JWT

Este proyecto fue realizado con Laravel 11 y  la librería JWT para la autenticación, contiene algunas apis y crud de studiantes y endpoint de autenticacion
Este proyecto se conecta a una base de datos que ya se encuentra configurada en el .env.example una base de datos en la nube 
A continuacion las siguiente ENDPOINT

## End Point
*Autenticación
    - api/auth/login--->METHOD POST data: {email,password}
    Nota:enviar en el header el Bearer Token 
    - api/auth/logout--->METHOD GET 
    - api/auth/validate-token--->METHOD GET 

*Students
    Nota:enviar en el header el Bearer Token 
    - api/v1/students       --->METHOD GET : Todos los usuario 
    - api/v1/students/{id}  --->METHOD GET : Estudiante especifico por id
    - api/v1/students       --->METHOD POST : data: {first_name,last_name,email,phone,birth_date,user_id} (Agregar Estudiante)
    - api/v1/students/{id}  --->METHOD PUT : data: {first_name,last_name,email,phone,birth_date,user_id} (Actualizar Estudiante)
    - api/v1/students/{id}  --->METHOD DELETE : Eliminar un studiante
 

## Comandos

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/franco102/project-back.git
2. **Instala las dependencias:**
   ```bash
   composer install
3. **generar key del app :**
   ```bash
   php artisan key:generate
5. **Publicar el archivo de JWT:**
   ```bash
   php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
4. **generar jwt del app :**
   ```bash
   php artisan jwt:secret
5. **Corre la migracion y Seeders :**
   ```bash
   php artisan migrate:fresh --seed
6. **Lavantar proyecto en local :**
   ```bash
   php artisan serve


 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
