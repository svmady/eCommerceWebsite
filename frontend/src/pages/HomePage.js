import { useState, useEffect } from 'react';

function HomePage() {
  return (
    <div className="home-page">
      <div className="hero-section">
        <h1>Welcome to EcommStore</h1>
        <p>Your ultimate destination for quality products</p>
        <button className="cta-button">Shop Now</button>
      </div>
      
      <div className="featured-section">
        <h2>Featured Products</h2>
        <p>Browse our collection of bestsellers and new arrivals.</p>
      </div>
    </div>
  );
}

export default HomePage;
