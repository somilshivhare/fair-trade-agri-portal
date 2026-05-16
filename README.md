# Fair Trade Agri Portal 🌾

[![Laravel 13](https://img.shields.io/badge/Laravel-13.x-red.svg)](https://laravel.com)
[![PHP 8.3](https://img.shields.io/badge/PHP-8.3-blue.svg)](https://php.net)
[![MongoDB](https://img.shields.io/badge/Database-MongoDB-green.svg)](https://mongodb.com)
[![Tailwind CSS 4.0](https://img.shields.io/badge/CSS-Tailwind_4.0-38b2ac.svg)](https://tailwindcss.com)

A comprehensive digital ecosystem designed to empower farmers, streamline agricultural trade, and ensure fair pricing through technology. The **Fair Trade Agri Portal** connects farmers directly with buyers, transporters, and government procurement systems.

## 🚀 Key Features

### 👨‍🌾 Farmer Empowerment
- **Product Management**: List crops with detailed specifications and images.
- **Dynamic Bidding**: Receive and negotiate bids from multiple buyers.
- **KYC Onboarding**: Secure identity verification for trusted trading.
- **MSP Dashboard**: Real-time access to Minimum Support Prices.

### 🛒 Buyer Marketplace
- **Transparent Sourcing**: Browse products directly from verified farmers.
- **Strategic Bidding**: Place bids and counter-offers during negotiations.
- **Order Tracking**: Monitor the lifecycle of purchases from farm to warehouse.

### 🚛 Integrated Logistics
- **Transporter Network**: Dedicated role for managing pickups and deliveries.
- **Cost Estimation**: Automated transport cost calculation based on distance and volume.
- **Real-time Status**: Live updates on shipment progress.

### 🏛️ Government Portal
- **Procurement System**: Direct selling channel to government agencies.
- **Mandi Price Tracking**: Automated scraping and syncing of local Mandi prices.
- **Tender Management**: Official tenders for large-scale agricultural procurement.

### 🛠️ Technical Excellence
- **Multilingual**: Support for English, Hindi, Marathi, Gujarati, and Punjabi.
- **Matching Engine**: Intelligent algorithm to connect supply with demand.
- **Analytics**: Comprehensive insights into market trends and pricing history.

## 💻 Tech Stack

- **Backend**: [Laravel 13](https://laravel.com) (PHP 8.3+)
- **Database**: [MongoDB](https://www.mongodb.com/) (NoSQL for flexible data modeling)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade), [Tailwind CSS 4.0](https://tailwindcss.com/), [Vite 8.0](https://vitejs.dev/)
- **Architecture**: Service-oriented with dedicated Matching and Notification services.

## 🛠️ Installation & Setup

### Prerequisites
- PHP 8.3+
- Composer
- Node.js & npm
- MongoDB Server

### Quick Start
Clone the repository and run the automated setup script:

```bash
git clone https://github.com/somilshivhare/fair-trade-agri-portal.git
cd fair-trade-agri-portal
composer run setup
```

The setup script handles:
1. Dependency installation (Composer & NPM)
2. Environment configuration (`.env`)
3. Application key generation
4. Database migrations
5. Frontend asset compilation

### Running for Development
Use the concurrent development command to start all necessary services (Server, Vite, Queue, and Logs):

```bash
composer run dev
```

## 📜 Project Structure

- `app/Http/Controllers`: Role-based logic (Admin, Farmer, Buyer, Transporter).
- `app/Models`: MongoDB-compatible Eloquent models.
- `app/Services`: Core business logic (Matching, Transport, Notifications).
- `app/Console/Commands`: Automated tasks for price scraping and bid expiration.
- `resources/views`: Multilingual Blade templates with Tailwind CSS 4.0.

## 🤝 Contributing

We welcome contributions! Please follow the standard Laravel contribution guidelines.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

---
*Built with ❤️ for the Agricultural Community.*
