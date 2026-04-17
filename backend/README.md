# Backend Setup Instructions

## Quick Start

1. Install Composer dependencies:
```bash
composer install
```

2. Create `.env` file from `.env.example`:
```bash
cp .env.example .env
```

3. Update `.env` with your configuration:
- Database credentials
- JWT_SECRET - Generate a secure secret key
- Stripe API keys

4. Set up the database:
```bash
mysql -u root -p < ../database/schema.sql
```

5. Start the PHP development server:
```bash
php -S localhost:3001 -t public/
```

The API will be available at `http://localhost:3001/api`

## Project Structure

```
src/
├── Database.php   - Database connection
├── Auth.php       - JWT authentication
├── User.php       - User management
├── Product.php    - Product operations
└── Order.php      - Order management

public/
└── index.php      - API entry point

routes/
└── [Router files]
```

## API Testing

You can test the API endpoints using tools like:
- Postman
- CURL
- Insomnia
- Thunder Client

Example:
```bash
curl http://localhost:3001/api/products
```

## Database

Run the schema file to create tables:
```bash
mysql -u root -p ecommerce_db < database/schema.sql
```

## Security Notes

- Generate a secure JWT_SECRET
- Use environment variables for sensitive data
- Never commit `.env` file to version control
- Use HTTPS in production
- Implement rate limiting
- Validate all inputs
