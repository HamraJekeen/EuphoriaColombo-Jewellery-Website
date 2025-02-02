<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-slate-500">Order Details</h1>

  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
    <!-- Card for Customer -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl" id="customerCard">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg">
          <!-- SVG for Customer Icon -->
          <svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Customer
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <div id="customerName"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card for Order Date -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl" id="orderDateCard">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg">
          <!-- SVG for Calendar Icon -->
          <svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 22h14" />
            <path d="M5 2h14" />
            <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
            <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Order Date
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800" id="orderDate"></h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Card for Order Status -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl" id="orderStatusCard">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg">
          <!-- SVG for Status Icon -->
          <svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
            <path d="m12 12 4 10 1.7-4.3L22 16Z" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Order Status
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <span id="orderStatus"></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card for Payment Status -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl" id="paymentStatusCard">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg">
          <!-- SVG for Payment Icon -->
           <svg class="flex-shrink-0 size-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
            <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
            <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              Payment Status
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <span id="paymentStatus"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Grid -->

  <!-- Order Details Table and Shipping Address -->
  <div class="flex flex-col md:flex-row gap-4 mt-4">
    <div class="md:w-3/4">
      <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
        <table class="w-full" id="orderItemsTable">
          <thead>
            <tr>
              <th class="text-left font-semibold">Product</th>
              <th class="text-left font-semibold">Price</th>
              <th class="text-left font-semibold">Quantity</th>
              <th class="text-left font-semibold">Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- Order items will be inserted dynamically -->
          </tbody>
        </table>
      </div>

      <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4" id="shippingAddressCard">
        <h1 class="font-3xl font-bold text-slate-500 mb-3">Shipping Address</h1>
        <div class="flex justify-between items-center">
          <div id="shippingAddress"></div>
        </div>
      </div>

    </div>

    <!-- Order Summary -->
    <div class="md:w-1/4">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Summary</h2>
        <div class="flex justify-between mb-2">
          <span>Subtotal</span>
          <span id="subtotal"></span>
        </div>
        <div class="flex justify-between mb-2">
          <span>Taxes</span>
          <span>LKR 0.00</span>
        </div>
        <div class="flex justify-between mb-2">
          <span>Shipping</span>
          <span>LKR 0.00</span>
        </div>
        <hr class="my-2">
        <div class="flex justify-between mb-2">
          <span class="font-semibold">Grand Total</span>
          <span id="grandTotal"></span>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const token = "4|xHlLMNcnfS3m1tdKvavIOBcSvylQVHzuRgb4heXb90943ade"; 
  const pathSegments = window.location.pathname.split('/');
  const orderId = pathSegments[pathSegments.length - 1]; // Get the last segment of the URL

  if (!orderId) {
    console.error('Order ID is missing in the URL.');
    return;
  }

  // Fetch data from APIs
  axios.all([
    axios.get(`/api/orders/${orderId}`, { headers: { Authorization: `Bearer ${token}` } }), // Fetch order details
    axios.get(`/api/order-items?order_id=${orderId}`, { headers: { Authorization: `Bearer ${token}` } }), // Fetch order items
    axios.get(`/api/addresses?order_id=${orderId}`, { headers: { Authorization: `Bearer ${token}` } }) // Fetch address
  ])
  .then(axios.spread((orderRes, orderItemsRes, addressRes) => {
    const order = orderRes.data.data; // Order details
    const orderItems = orderItemsRes.data.data; // Order items
    const address = addressRes.data.data[0]; // Customer address

    // Populate Customer Details
    document.getElementById('customerName').textContent = address.first_name + " "+address.last_name || 'N/A';

    // Populate Order Date
    const orderDate = new Date(order.created_at).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' });
    document.getElementById('orderDate').textContent = orderDate;

    // Populate Order Status
    const statusColors = {
      'new': 'bg-blue-500',
      'processing': 'bg-yellow-500',
      'delivered': 'bg-green-700',
      'shipped': 'bg-green-500',
      'cancelled': 'bg-red-500'
    };
    document.getElementById('orderStatus').innerHTML = `
      <span class="py-1 px-3 rounded text-white shadow ${statusColors[order.status] || 'bg-gray-500'}">${order.status || 'Unknown'}</span>
    `;

    // Populate Payment Status
    const paymentColors = {
      'pending': 'bg-blue-500',
      'paid': 'bg-green-600',
      'failed': 'bg-red-500'
    };
    document.getElementById('paymentStatus').innerHTML = `
      <span class="py-1 px-3 rounded text-white shadow ${paymentColors[order.payment_status] || 'bg-gray-500'}">${order.payment_status || 'Unknown'}</span>
    `;

    // Populate Product Details Table
    const productTable = document.querySelector('#orderItemsTable tbody');
    if (orderItems.length > 0) {
      let productHTML = '';
      orderItems.forEach(item => {
        const price = Number(item.unit_amount) || 0;
        const quantity = Number(item.quantity) || 0;
        const total = price * quantity;
        const imageUrl = `/storage/${item.product.image[0]}`;

        productHTML += `
          <tr>
            <td class="py-4">
              <div class="flex items-center">
                <img class="h-16 w-16 mr-4" src="${imageUrl}" alt="${item.product.name}">
                <span class="font-semibold">${item.product.name}</span>
              </div>
            </td>
            <td class="py-4">LKR ${price.toFixed(2)}</td>
            <td class="py-4">${quantity}</td>
            <td class="py-4">LKR ${total.toFixed(2)}</td>
          </tr>
        `;
      });
      productTable.innerHTML = productHTML;
    } else {
      productTable.innerHTML = '<tr><td colspan="4" class="text-center py-4 text-gray-500">No products found.</td></tr>';
    }

    // Populate Shipping Address
    document.getElementById('shippingAddress').innerHTML = `
      <p>${address.street_address}, ${address.city}, ${address.province}, ${address.zip_code}</p>
      <p class="font-semibold">Phone: ${address.phone}</p>
    `;

    // Populate Order Summary
    document.getElementById('subtotal').textContent = `LKR ${order.grand_total}`;
    document.getElementById('grandTotal').textContent = `LKR ${order.grand_total}`;
  }))
  .catch(error => {
    console.error('Error fetching order data:', error);
    alert('Failed to load order details. Please try again.');
  });
});
</script>
