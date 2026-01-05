# Структура базы данных для E-commerce сайта SHOP.CO

## Диаграмма связей

```
┌─────────────┐         ┌──────────────┐         ┌─────────────┐
│   Users     │────┬───▶│   Orders     │────┬───▶│ Order_Items │
└─────────────┘    │    └──────────────┘    │    └─────────────┘
       │           │                         │            │
       │           │                         │            │
       ▼           │                         │            ▼
┌─────────────┐    │                         │    ┌─────────────┐
│  Addresses  │    │                         └───▶│  Products   │
└─────────────┘    │                              └─────────────┘
                   │                                      │
                   │                                      │
                   │                              ┌───────┴────────┐
                   │                              │                │
                   │                              ▼                ▼
                   │                      ┌──────────────┐ ┌─────────────┐
                   │                      │Product_Images│ │Product_Vars │
                   │                      └──────────────┘ └─────────────┘
                   │                                              │
                   │                                              │
                   │                                              ▼
                   │                                      ┌─────────────┐
                   │                                      │   Colors    │
                   │                                      └─────────────┘
                   │                                              │
                   │                                              │
                   │                                              ▼
                   │                                      ┌─────────────┐
                   │                                      │    Sizes    │
                   │                                      └─────────────┘
                   │
                   │          ┌─────────────┐
                   └─────────▶│ Cart_Items  │
                              └─────────────┘
                                      │
                                      ▼
                              ┌─────────────┐
                              │  Products   │
                              └─────────────┘

┌─────────────┐         ┌──────────────┐
│  Products   │────────▶│  Categories  │
└─────────────┘         └──────────────┘
       │
       │
       ▼
┌─────────────┐         ┌──────────────┐
│  Reviews    │────────▶│    Users     │
└─────────────┘         └──────────────┘

┌─────────────┐         ┌──────────────┐
│  Products   │────────▶│ Dress_Styles │
└─────────────┘         └──────────────┘

┌─────────────┐
│   Brands    │
└─────────────┘
       ▲
       │
┌─────────────┐
│  Products   │
└─────────────┘

┌─────────────┐
│Promo_Codes  │
└─────────────┘
       ▲
       │
┌─────────────┐
│   Orders    │
└─────────────┘
```

---

## 1. **Users** (Пользователи)
Хранит информацию о зарегистрированных пользователях.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `email` | VARCHAR(255) UNIQUE | Email пользователя | - |
| `password` | VARCHAR(255) | Хешированный пароль | - |
| `first_name` | VARCHAR(100) | Имя | - |
| `last_name` | VARCHAR(100) | Фамилия | - |
| `phone` | VARCHAR(20) | Телефон | - |
| `is_verified` | BOOLEAN | Статус верификации | - |
| `created_at` | TIMESTAMP | Дата регистрации | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `1:N` → `Addresses` (один пользователь может иметь несколько адресов)
- `1:N` → `Orders` (один пользователь может иметь несколько заказов)
- `1:N` → `Cart_Items` (один пользователь может иметь несколько товаров в корзине)
- `1:N` → `Reviews` (один пользователь может оставить несколько отзывов)

---

## 2. **Addresses** (Адреса)
Хранит адреса доставки пользователей.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `user_id` | INT (FK) | ID пользователя | → `Users.id` |
| `address_type` | ENUM('shipping', 'billing') | Тип адреса | - |
| `full_name` | VARCHAR(200) | Полное имя получателя | - |
| `phone` | VARCHAR(20) | Телефон | - |
| `street_address` | VARCHAR(255) | Улица и дом | - |
| `city` | VARCHAR(100) | Город | - |
| `state` | VARCHAR(100) | Регион/Область | - |
| `postal_code` | VARCHAR(20) | Почтовый индекс | - |
| `country` | VARCHAR(100) | Страна | - |
| `is_default` | BOOLEAN | Адрес по умолчанию | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Users` (много адресов принадлежат одному пользователю)

---

## 3. **Categories** (Категории)
Категории товаров (T-shirts, Shorts, Shirts, Hoodies, Jeans).

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(100) | Название категории | - |
| `slug` | VARCHAR(100) UNIQUE | URL-friendly название | - |
| `description` | TEXT | Описание категории | - |
| `image_url` | VARCHAR(255) | Изображение категории | - |
| `parent_id` | INT (FK) NULL | Родительская категория | → `Categories.id` |
| `sort_order` | INT | Порядок сортировки | - |
| `is_active` | BOOLEAN | Активна ли категория | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `1:N` → `Products` (одна категория может содержать много товаров)
- `1:N` → `Categories` (самосвязь для подкатегорий)

---

## 4. **Dress_Styles** (Стили одежды)
Стили: Casual, Formal, Party, Gym.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(50) | Название стиля | - |
| `slug` | VARCHAR(50) UNIQUE | URL-friendly название | - |
| `image_url` | VARCHAR(255) | Изображение стиля | - |
| `description` | TEXT | Описание | - |
| `is_active` | BOOLEAN | Активен ли стиль | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:N` → `Products` (через таблицу `Product_Dress_Styles`)

---

## 5. **Brands** (Бренды)
Бренды: VERSACE, ZARA, GUCCI, PRADA, CALVIN KLEIN и т.д.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(100) | Название бренда | - |
| `slug` | VARCHAR(100) UNIQUE | URL-friendly название | - |
| `logo_url` | VARCHAR(255) | Логотип бренда | - |
| `description` | TEXT | Описание бренда | - |
| `is_featured` | BOOLEAN | Показывать на главной | - |
| `is_active` | BOOLEAN | Активен ли бренд | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `1:N` → `Products` (один бренд может иметь много товаров)

---

## 6. **Products** (Товары)
Основная информация о товарах.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(255) | Название товара | - |
| `slug` | VARCHAR(255) UNIQUE | URL-friendly название | - |
| `description` | TEXT | Описание товара | - |
| `category_id` | INT (FK) | ID категории | → `Categories.id` |
| `brand_id` | INT (FK) | ID бренда | → `Brands.id` |
| `base_price` | DECIMAL(10,2) | Базовая цена | - |
| `discount_percentage` | DECIMAL(5,2) | Процент скидки | - |
| `final_price` | DECIMAL(10,2) | Финальная цена | - |
| `sku` | VARCHAR(100) UNIQUE | Артикул товара | - |
| `is_new_arrival` | BOOLEAN | Новинка | - |
| `is_top_selling` | BOOLEAN | Топ продаж | - |
| `is_active` | BOOLEAN | Активен ли товар | - |
| `average_rating` | DECIMAL(3,2) | Средний рейтинг | - |
| `total_reviews` | INT | Количество отзывов | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Categories` (много товаров принадлежат одной категории)
- `N:1` → `Brands` (много товаров принадлежат одному бренду)
- `1:N` → `Product_Images` (один товар может иметь много изображений)
- `1:N` → `Product_Variants` (один товар может иметь много вариантов)
- `1:N` → `Reviews` (один товар может иметь много отзывов)
- `N:N` → `Dress_Styles` (через `Product_Dress_Styles`)

---

## 7. **Product_Images** (Изображения товаров)
Хранит изображения товаров.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `image_url` | VARCHAR(255) | URL изображения | - |
| `is_primary` | BOOLEAN | Основное изображение | - |
| `sort_order` | INT | Порядок отображения | - |
| `created_at` | TIMESTAMP | Дата создания | - |

**Связи:**
- `N:1` → `Products` (много изображений принадлежат одному товару)

---

## 8. **Colors** (Цвета)
Доступные цвета для товаров.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(50) | Название цвета | - |
| `hex_code` | VARCHAR(7) | HEX код цвета | - |
| `created_at` | TIMESTAMP | Дата создания | - |

**Связи:**
- `N:N` → `Product_Variants` (через варианты товаров)

---

## 9. **Sizes** (Размеры)
Доступные размеры: Small, Medium, Large, X-Large и т.д.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `name` | VARCHAR(20) | Название размера | - |
| `abbreviation` | VARCHAR(10) | Аббревиатура (S, M, L, XL) | - |
| `sort_order` | INT | Порядок сортировки | - |
| `created_at` | TIMESTAMP | Дата создания | - |

**Связи:**
- `N:N` → `Product_Variants` (через варианты товаров)

---

## 10. **Product_Variants** (Варианты товаров)
Комбинации цвета и размера для каждого товара.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `color_id` | INT (FK) | ID цвета | → `Colors.id` |
| `size_id` | INT (FK) | ID размера | → `Sizes.id` |
| `sku` | VARCHAR(100) UNIQUE | Артикул варианта | - |
| `stock_quantity` | INT | Количество на складе | - |
| `price_adjustment` | DECIMAL(10,2) | Корректировка цены | - |
| `is_available` | BOOLEAN | Доступен ли вариант | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Products` (много вариантов принадлежат одному товару)
- `N:1` → `Colors` (много вариантов используют один цвет)
- `N:1` → `Sizes` (много вариантов используют один размер)

---

## 11. **Product_Dress_Styles** (Связь товаров и стилей)
Промежуточная таблица для связи многие-ко-многим.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `dress_style_id` | INT (FK) | ID стиля | → `Dress_Styles.id` |
| `created_at` | TIMESTAMP | Дата создания | - |

**Связи:**
- `N:1` → `Products`
- `N:1` → `Dress_Styles`

---

## 12. **Cart_Items** (Корзина)
Товары в корзине пользователя.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `user_id` | INT (FK) | ID пользователя | → `Users.id` |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `variant_id` | INT (FK) | ID варианта товара | → `Product_Variants.id` |
| `quantity` | INT | Количество | - |
| `price_snapshot` | DECIMAL(10,2) | Цена на момент добавления | - |
| `created_at` | TIMESTAMP | Дата добавления | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Users` (много товаров в корзине принадлежат одному пользователю)
- `N:1` → `Products` (много записей корзины ссылаются на один товар)
- `N:1` → `Product_Variants` (много записей корзины ссылаются на один вариант)

---

## 13. **Orders** (Заказы)
Информация о заказах.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `user_id` | INT (FK) | ID пользователя | → `Users.id` |
| `order_number` | VARCHAR(50) UNIQUE | Номер заказа | - |
| `status` | ENUM | Статус заказа | - |
| | | ('pending', 'processing', 'shipped', 'delivered', 'cancelled') | |
| `subtotal` | DECIMAL(10,2) | Сумма товаров | - |
| `discount_amount` | DECIMAL(10,2) | Сумма скидки | - |
| `delivery_fee` | DECIMAL(10,2) | Стоимость доставки | - |
| `total_amount` | DECIMAL(10,2) | Итоговая сумма | - |
| `promo_code_id` | INT (FK) NULL | ID промокода | → `Promo_Codes.id` |
| `shipping_address_id` | INT (FK) | ID адреса доставки | → `Addresses.id` |
| `billing_address_id` | INT (FK) | ID адреса оплаты | → `Addresses.id` |
| `payment_method` | VARCHAR(50) | Способ оплаты | - |
| `payment_status` | ENUM | Статус оплаты | - |
| | | ('pending', 'paid', 'failed', 'refunded') | |
| `notes` | TEXT | Примечания к заказу | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Users` (много заказов принадлежат одному пользователю)
- `1:N` → `Order_Items` (один заказ содержит много товаров)
- `N:1` → `Promo_Codes` (много заказов могут использовать один промокод)
- `N:1` → `Addresses` (для адреса доставки)
- `N:1` → `Addresses` (для адреса оплаты)

---

## 14. **Order_Items** (Товары в заказе)
Детали товаров в заказе.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `order_id` | INT (FK) | ID заказа | → `Orders.id` |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `variant_id` | INT (FK) | ID варианта товара | → `Product_Variants.id` |
| `product_name` | VARCHAR(255) | Название товара (снимок) | - |
| `variant_details` | VARCHAR(255) | Детали варианта (снимок) | - |
| `quantity` | INT | Количество | - |
| `unit_price` | DECIMAL(10,2) | Цена за единицу | - |
| `subtotal` | DECIMAL(10,2) | Сумма (quantity × unit_price) | - |
| `created_at` | TIMESTAMP | Дата создания | - |

**Связи:**
- `N:1` → `Orders` (много товаров принадлежат одному заказу)
- `N:1` → `Products` (много записей заказа ссылаются на один товар)
- `N:1` → `Product_Variants` (много записей заказа ссылаются на один вариант)

---

## 15. **Promo_Codes** (Промокоды)
Промокоды для скидок.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `code` | VARCHAR(50) UNIQUE | Код промокода | - |
| `description` | TEXT | Описание акции | - |
| `discount_type` | ENUM('percentage', 'fixed') | Тип скидки | - |
| `discount_value` | DECIMAL(10,2) | Значение скидки | - |
| `min_order_amount` | DECIMAL(10,2) | Минимальная сумма заказа | - |
| `max_discount_amount` | DECIMAL(10,2) | Максимальная сумма скидки | - |
| `usage_limit` | INT | Лимит использований | - |
| `used_count` | INT | Количество использований | - |
| `valid_from` | TIMESTAMP | Дата начала действия | - |
| `valid_until` | TIMESTAMP | Дата окончания действия | - |
| `is_active` | BOOLEAN | Активен ли промокод | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `1:N` → `Orders` (один промокод может быть использован в нескольких заказах)

---

## 16. **Reviews** (Отзывы)
Отзывы пользователей о товарах.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `product_id` | INT (FK) | ID товара | → `Products.id` |
| `user_id` | INT (FK) | ID пользователя | → `Users.id` |
| `rating` | INT | Оценка (1-5 звезд) | - |
| `title` | VARCHAR(255) | Заголовок отзыва | - |
| `comment` | TEXT | Текст отзыва | - |
| `is_verified_purchase` | BOOLEAN | Подтвержденная покупка | - |
| `is_approved` | BOOLEAN | Одобрен модератором | - |
| `helpful_count` | INT | Количество "полезно" | - |
| `created_at` | TIMESTAMP | Дата создания | - |
| `updated_at` | TIMESTAMP | Дата обновления | - |

**Связи:**
- `N:1` → `Products` (много отзывов принадлежат одному товару)
- `N:1` → `Users` (много отзывов написаны одним пользователем)

---

## 17. **Newsletter_Subscribers** (Подписчики рассылки)
Email-подписчики для рассылки новостей и предложений.

| Поле | Тип | Описание | Связи |
|------|-----|----------|-------|
| `id` | INT (PK) | Уникальный идентификатор | - |
| `email` | VARCHAR(255) UNIQUE | Email подписчика | - |
| `is_active` | BOOLEAN | Активна ли подписка | - |
| `subscribed_at` | TIMESTAMP | Дата подписки | - |
| `unsubscribed_at` | TIMESTAMP NULL | Дата отписки | - |

**Связи:**
- Нет прямых связей

---

## Индексы для оптимизации

### Users
- `idx_email` на `email`
- `idx_created_at` на `created_at`

### Products
- `idx_category_id` на `category_id`
- `idx_brand_id` на `brand_id`
- `idx_slug` на `slug`
- `idx_is_new_arrival` на `is_new_arrival`
- `idx_is_top_selling` на `is_top_selling`
- `idx_is_active` на `is_active`

### Product_Variants
- `idx_product_id` на `product_id`
- `idx_color_size` на `(color_id, size_id)`
- `idx_sku` на `sku`

### Orders
- `idx_user_id` на `user_id`
- `idx_order_number` на `order_number`
- `idx_status` на `status`
- `idx_created_at` на `created_at`

### Cart_Items
- `idx_user_id` на `user_id`
- `idx_product_variant` на `(product_id, variant_id)`

### Reviews
- `idx_product_id` на `product_id`
- `idx_user_id` на `user_id`
- `idx_is_approved` на `is_approved`

---

## Основные бизнес-правила

1. **Цены товаров**: `final_price = base_price - (base_price × discount_percentage / 100)`
2. **Рейтинг товара**: Автоматически пересчитывается при добавлении нового отзыва
3. **Количество отзывов**: Обновляется триггером при добавлении/удалении отзыва
4. **Статус заказа**: Изменяется последовательно (pending → processing → shipped → delivered)
5. **Промокоды**: Проверяются на валидность (дата, лимит использований, минимальная сумма)
6. **Корзина**: Очищается после успешного оформления заказа
7. **Варианты товаров**: Должна быть хотя бы одна комбинация цвет+размер для каждого товара

---

## Примечания по реализации

- Все таблицы используют `InnoDB` для поддержки транзакций и внешних ключей
- Цены хранятся в формате `DECIMAL(10,2)` для точности
- Используется `soft delete` для товаров и категорий (поле `is_active`)
- Снимки данных (snapshots) в заказах защищают от изменения цен и названий
- Индексы созданы для часто используемых запросов (поиск, фильтрация, сортировка)
