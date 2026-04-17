# E-commerce Website Project

A full-stack e-commerce platform built with React (frontend), PHP (backend), and MySQL (database).

## Project Structure

```
Ecomm/
├── frontend/                 # React application
│   ├── src/
│   │   ├── components/       # Reusable React components
│   │   ├── pages/            # Page components
│   │   ├── services/         # API service calls
│   │   ├── App.js
│   │   └── index.js
│   ├── public/
│   │   └── index.html
│   └── package.json
├── backend/                  # PHP API
│   ├── src/                  # PHP classes
│   ├── public/
│   │   └── index.php         # API entry point
│   ├── routes/               # API routes
│   └── composer.json
├── database/
│   └── schema.sql            # MySQL database schema
└── README.md
```

## Features

- **User Authentication**: Login/Signup with JWT tokens
- **Product Catalog**: Browse and manage products
- **Shopping Cart**: Add/remove items from cart
- **Checkout**: Secure payment processing with Stripe
- **Order Management**: Track orders and order history
- **Admin Dashboard**: Manage products, orders, and users

## Tech Stack

- **Frontend**: React 18, React Router, Axios, Stripe
- **Backend**: PHP 7.4+, JWT Authentication
- **Database**: MySQL 5.7+
- **Payment**: Stripe API

## Setup Instructions

### Prerequisites

- Node.js 16+ (for frontend)
- PHP 7.4+ (for backend)
- MySQL 5.7+ (for database)
- npm or yarn

### 1. Database Setup

```sql
-- Create database
CREATE DATABASE ecommerce_db;

-- Import schema
mysql -u root -p ecommerce_db < database/schema.sql
```

### 2. Backend Setup

```bash
cd backend

# Copy environment file
cp .env.example .env

# Install dependencies
composer install

# Start PHP server
php -S localhost:3001 -t public/
```

Update `.env` with your database credentials and API keys.

### 3. Frontend Setup

```bash
cd frontend

# Copy environment file
cp .env.example .env

# Install dependencies
npm install

# Start development server
npm start
```

Update `.env` with your API URL and Stripe public key.

## API Endpoints

### Authentication
- `POST /api/auth/login` - User login
- `POST /api/auth/signup` - User registration

### Products
- `GET /api/products` - Get all products
- `GET /api/products/:id` - Get product details
- `POST /api/products` - Create product (admin)
- `PUT /api/products/:id` - Update product (admin)
- `DELETE /api/products/:id` - Delete product (admin)

### Cart
- `GET /api/cart` - Get cart items
- `POST /api/cart` - Add to cart
- `PUT /api/cart/:id` - Update cart item
- `DELETE /api/cart/:id` - Remove from cart

### Orders
- `GET /api/orders` - Get user orders
- `POST /api/orders` - Create order
- `GET /api/orders/:id` - Get order details
- `PUT /api/orders/:id/status` - Update order status (admin)

## Environment Variables

### Frontend (.env)
```
REACT_APP_API_URL=http://localhost:3001/api
REACT_APP_STRIPE_PUBLIC_KEY=pk_test_your_key_here
```

### Backend (.env)
```
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=ecommerce_db
JWT_SECRET=your_jwt_secret_key_here
STRIPE_SECRET_KEY=sk_test_your_key_here
STRIPE_PUBLIC_KEY=pk_test_your_key_here
```

## Development

### Frontend Development
```bash
cd frontend
npm start  # Runs on http://localhost:3000
```

### Backend Development
```bash
cd backend
php -S localhost:3001 -t public/  # Runs on http://localhost:3001
```

## Building for Production

### Frontend
```bash
cd frontend
npm run build  # Creates optimized build in build/ folder
```

### Backend
Deployment depends on your hosting provider. Ensure PHP and MySQL are installed and configured.

## Security Considerations

- Use HTTPS in production
- Keep JWT_SECRET secure
- Validate all user inputs
- Use CORS policies appropriately
- Store sensitive data securely
- Use password hashing (bcrypt)
- Implement rate limiting
- Regular security updates

## Contributing

1. Create a feature branch
2. Make commits
3. Submit a pull request

## License

MIT License - See LICENSE file for details

## Support

For issues or questions, please create an issue in the repository.
