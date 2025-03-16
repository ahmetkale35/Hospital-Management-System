# Hospital-Management-System

Hospital-Management-System is a Laravel-based Hospital Management System designed to streamline clinical operations. It provides modules for managing patients, appointments, and staff, offering a user-friendly dashboard for administrators and medical staff.

## 🚀 Features
- User authentication & role-based access control  
- Patient and appointment management  
- Admin dashboard  
- Responsive UI with Tailwind CSS  
- Database migrations & seeders

## 🛠 Tech Stack
- Laravel (PHP)  
- MySQL  
- Tailwind CSS  
- Blade templating engine

## 📚 About The Project
Hospital-Management-System is built to simplify hospital management by digitalizing core workflows such as patient admissions, appointment scheduling, and role-based staff management. It aims to reduce paperwork and improve operational efficiency in clinics and hospitals by providing a centralized and secure system.

## 🌱 Future Improvements
- Implement RESTful API for external integrations
- Notification system (email/SMS) for patients and staff
- Real-time notifications for upcoming appointments and emergency alerts
- Multi-department support for larger hospitals or healthcare facilities
- Advanced data analytics dashboard for healthcare performance tracking

##📸 Screenshots
![login](https://github.com/user-attachments/assets/8172b0d1-1b0d-4540-963d-bab5b90f3b89)

![main](https://github.com/user-attachments/assets/c6db0235-d3d3-45cd-bf6d-8db505c04bbe)

![güncelle](https://github.com/user-attachments/assets/a758b746-f8ba-4146-8c5a-6d6c6258fbbe)

## ⚙️ Installation

```bash
git clone https://github.com/ahmetkale35/Hospital-Management-System.git
cd Hospital-Management-System
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
php artisan migrate --seed
php artisan serve


