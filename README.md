# 📌 Mini CRM System

Laravel 11 va MySQL asosida qurilgan kichik CRM (Customer Relationship Management) loyhasi.  
Loyha orqali mijozlar, ularning kontaktlari va ularga bog‘liq vazifalarni boshqarish mumkin.

## 🚀 Texnologiyalar
- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend:** Blade, TailwindCSS
- **Database:** MySQL
- **Auth:** Laravel Breeze (login/ro‘yxatdan o‘tish, rollar)

## ✨ Xususiyatlar
- 👤 **Auth + Roles (Admin, User)**  
- 🧑‍💼 **Customer management** (qo‘shish, tahrirlash, o‘chirish)  
- 📞 **Contact info** (telefon, email, kompaniya)  
- 📝 **Tasks/Notes** (mijozlarga bog‘langan vazifalar)  
- 🔎 **Search & Filter** (customerlar ichida qidirish)  
- 📊 **Dashboard** (mijozlar statistikasi)  
- 📅 **Task status & due date** (pending, done)  

## ⚙️ O‘rnatish
1. Loyhani clone qiling:
   ```bash
   git clone https://github.com/USERNAME/REPO.git
   cd REPO
## Composer orqali dependency’larni o‘rnating:

  composer install


## .env faylini sozlang:

  cp .env.example .env


## So‘ng .env faylda database nomi, foydalanuvchi va parolni yozing:

  DB_DATABASE=crm_db
  DB_USERNAME=root
  DB_PASSWORD=


## Laravel app key yarating:

  php artisan key:generate


## Migration va seederlarni ishga tushiring:

  php artisan migrate --seed  


## Auth tizimini tayyorlang (agar hali o‘rnatilmagan bo‘lsa):

  php artisan breeze:install
  npm install && npm run dev


## Serverni ishga tushiring:

  php artisan serve


👉 Endi loyha http://127.0.0.1:8000
 da ishlaydi.
