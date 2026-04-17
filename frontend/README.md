# Frontend Setup Instructions

## Quick Start

1. Install dependencies:
```bash
npm install
```

2. Create `.env` file from `.env.example`:
```bash
cp .env.example .env
```

3. Update `.env` with your configuration:
- `REACT_APP_API_URL` - Backend API URL
- `REACT_APP_STRIPE_PUBLIC_KEY` - Your Stripe public key

4. Start the development server:
```bash
npm start
```

The application will open at `http://localhost:3000`

## Available Scripts

- `npm start` - Start development server
- `npm build` - Build for production
- `npm test` - Run tests
- `npm eject` - Eject from create-react-app (irreversible)

## Project Structure

```
src/
├── components/    - Reusable UI components
├── pages/         - Page-level components
├── services/      - API calls and utilities
└── App.js         - Main app component
```

## Pages

- **Home** - Landing page
- **Products** - Product listing
- **Product Detail** - Individual product page
- **Cart** - Shopping cart
- **Checkout** - Payment processing
- **Login** - User login
- **Signup** - User registration
- **Admin Dashboard** - Admin panel
