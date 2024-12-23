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

## Endpoints

### Autenticación

- **`POST /api/auth/login`**
  - Descripción: Autenticación de usuario.
  - **Datos**: 
    ```json
    {
      "email": "user@example.com",
      "password": "your_password"
    }
    ```
  - **Nota**: Enviar el token `Bearer` en el header.

- **`GET /api/auth/logout`**
  - Descripción: Cierra la sesión del usuario autenticado.
  - **Nota**: Enviar el token `Bearer` en el header.

- **`GET /api/auth/validate-token`**
  - Descripción: Valida si el token JWT enviado es válido.
  - **Nota**: Enviar el token `Bearer` en el header.

### Estudiantes

- **`GET /api/v1/students`**
  - Descripción: Obtiene todos los estudiantes.
  - **Nota**: Enviar el token `Bearer` en el header.

- **`GET /api/v1/students/{id}`**
  - Descripción: Obtiene un estudiante específico por su `id`.
  - **Ejemplo**:
    ```json
    {
      "id": 1
    }
    ```

- **`POST /api/v1/students`**
  - Descripción: Agrega un nuevo estudiante.
  - **Datos**:
    ```json
    {
      "first_name": "John",
      "last_name": "Doe",
      "email": "john.doe@example.com",
      "phone": "1234567890",
      "birth_date": "1990-01-01",
      "user_id": 1
    }
    ```
  - **Nota**: Enviar el token `Bearer` en el header.

- **`PUT /api/v1/students/{id}`**
  - Descripción: Actualiza un estudiante existente por su `id`.
  - **Datos**:
    ```json
    {
      "first_name": "John",
      "last_name": "Doe",
      "email": "john.doe@example.com",
      "phone": "1234567890",
      "birth_date": "1990-01-01",
      "user_id": 1
    }
    ```
  - **Ejemplo**:
    ```json
    {
      "id": 1
    }
    ```
  - **Nota**: Enviar el token `Bearer` en el header.

- **`DELETE /api/v1/students/{id}`**
  - Descripción: Elimina un estudiante específico por su `id`.
  - **Ejemplo**:
    ```json
    {
      "id": 1
    }
    ```
  - **Nota**: Enviar el token `Bearer` en el header.

---

### Notas Generales
- **Autenticación**: Todos los endpoints requieren que el token JWT se pase en el header de la solicitud como `Authorization: Bearer <your_token>`.
 

## Comandos

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/franco102/project-back.git
2. **Instala las dependencias:**
   ```bash
   composer install
3. **Copiar archivo .env :**
   ```bash
   cp .env.example .env
4. **generar key del app :**
   ```bash
   php artisan key:generate 
5. **generar jwt del app :**
   ```bash
   php artisan jwt:secret
6. **Corre la migracion y Seeders :**
   ```bash
   php artisan migrate:fresh --seed
7. **Lavantar proyecto en local :**
   ```bash
   php artisan serve
8. **Usuario y Contraseña  respectivamente:**
   ```bash
   user1@example.com , password



 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
