import { useParams } from 'react-router-dom';

function ProductDetail() {
  const { id } = useParams();

  return (
    <div className="product-detail">
      <h1>Product Detail</h1>
      <p>Product ID: {id}</p>
      <p>Product details and purchase information will be displayed here.</p>
    </div>
  );
}

export default ProductDetail;
