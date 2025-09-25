# Yii2 CRUD + DDD Example

Пример простого CRUD-приложения на **Yii2**, реализованного с использованием принципов **DDD (Domain-Driven Design)**.

## 📌 Функционал
- Регистрация пользователя (POST)
- Получение пользователя по ID (GET)
- Удаление пользователя (GET)
- Список пользователей (GET)

## 📂 Архитектура
Проект разделён на уровни:
- `domain/` — бизнес-логика, сущности и интерфейсы (например, `UserEntity`, `UserRepositoryInterface`)
- `application/` — сервисы (например, `UserService`)
- `infrastructure/` — работа с БД, реализация репозиториев (`UserRepository`)
- `controllers/` — веб-контроллеры Yii2 (`UserController`)

## 🚀 Установка
1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/Siemensixone1119/crud
   cd crud
   ```
2. Установить зависимости:
   ```bash
   composer install
   ```
3. Настроить подключение к БД в `config/db.php`
   ```php
   return [
       'class' => 'yii\db\Connection',
       'dsn' => 'pgsql:host=localhost;dbname=ddd',
       'username' => 'root',
       'password' => '',
       'charset' => 'utf8',
   ];
   ```
4. Применить миграции или вручную создать таблицу `users`:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL
   );
   ```
5. Запустить сервер:
   ```bash
   php yii serve
   ```
   Открой [http://localhost:8080](http://localhost:8080)

## 📬 Примеры запросов (Postman)

### 1. Регистрация
**POST**  
`http://localhost:8080/index.php?r=user/register`

Body → `x-www-form-urlencoded`:
```
name=Alexey
email=alexey@gmail.com
```

---

### 2. Получение пользователя по ID
**GET**  
`http://localhost:8080/index.php?r=user/get-user&id=1`

---

### 3. Удаление пользователя
**GET**  
`http://localhost:8080/index.php?r=user/delete&id=1`

---

### 4. Список пользователей
**GET**  
`http://localhost:8080/index.php?r=user/list`

---

## 🛠 Технологии
- PHP 8+
- Yii2 Framework
- MySQL / PostgreSQL
- DDD (Entity, Repository, Service, Controller)

---
