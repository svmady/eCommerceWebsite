# E-commerce Website Development Guide

This is the main development guide for the E-commerce Website project.

## Quick Start

### 1. Set Up Frontend

```bash
cd frontend
npm install
cp .env.example .env
npm start
```

Frontend runs on: http://localhost:3000

### 2. Set Up Backend

```bash
cd backend
composer install
cp .env.example .env
php -S localhost:3001 -t public/
```

Backend runs on: http://localhost:3001

### 3. Set Up Database

```bash
# Create database
mysql -u root -p
> CREATE DATABASE ecommerce_db;

# Import schema
mysql -u root -p ecommerce_db < database/schema.sql
```

## Project Stack

- **Frontend**: React 18 with React Router
- **Backend**: PHP 7.4+ with JWT authentication
- **Database**: MySQL
- **Payment**: Stripe integration
- **Authentication**: JWT tokens

## Key Features

✅ User authentication (login/signup)
✅ Product catalog with search
✅ Shopping cart management
✅ Secure checkout with Stripe
✅ Order tracking
✅ Admin dashboard
✅ Responsive design

## Folder Structure

```
Ecomm/
├── frontend/          # React application
├── backend/           # PHP API
├── database/          # MySQL schema
├── README.md          # Main documentation
├── DOCUMENTATION.md   # Technical details
├── SETUP_CHECKLIST.md # Setup tasks
└── EXTENSIONS.md      # Recommended VS Code extensions
```

## Important Files

- [README.md](README.md) - Project overview
- [SETUP_CHECKLIST.md](SETUP_CHECKLIST.md) - Setup tasks
- [DOCUMENTATION.md](DOCUMENTATION.md) - Technical documentation
- [database/schema.sql](database/schema.sql) - Database schema
- [frontend/README.md](frontend/README.md) - Frontend guide
- [backend/README.md](backend/README.md) - Backend guide

## Environment Variables

### Frontend (.env)
```
REACT_APP_API_URL=http://localhost:3001/api
REACT_APP_STRIPE_PUBLIC_KEY=pk_test_your_key
```

### Backend (.env)
```
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=ecommerce_db
JWT_SECRET=your_secret_key
STRIPE_SECRET_KEY=sk_test_your_key
```

## Development Commands

### Frontend
- `npm install` - Install dependencies
- `npm start` - Start dev server
- `npm build` - Build for production
- `npm test` - Run tests

### Backend
- `composer install` - Install dependencies
- `php -S localhost:3001 -t public/` - Start server

## Common Issues

### Port Already in Use
```bash
# Kill process on port
# Windows: netstat -ano | findstr :3001
# Mac/Linux: lsof -i :3001
```

### Database Connection Failed
- Check MySQL is running
- Verify credentials in .env
- Ensure database exists

### CORS Errors
- Check backend CORS headers
- Verify frontend API URL in .env

## Next Steps

1. ✅ Project initialized
2. Install dependencies (frontend & backend)
3. Set up MySQL database
4. Configure environment variables
5. Start development servers
6. Begin feature implementation

## Resources

- [React Documentation](https://react.dev)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Stripe Documentation](https://stripe.com/docs)
- [JWT Guide](https://jwt.io/introduction)

## Support & Help

- Check DOCUMENTATION.md for technical details
- Review endpoint documentation in README.md
- See SETUP_CHECKLIST.md for setup tasks
- Check individual README files in frontend/ and backend/

---

**Last Updated**: April 2026
**Project Status**: ✅ Project scaffolding complete - Ready for development
