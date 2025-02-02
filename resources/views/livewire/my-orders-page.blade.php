<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
  <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Status</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Amount</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($my_orders as $order )
             @php
             
              $status = '';
              $payment_status = '';

              if($order->status == 'new'){
                $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">New</span>';
              }
              if($order->status == 'processing'){
                $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Processing</span>';
              }
              if($order->status == 'delivered'){
                $status = '<span class="bg-green-700 py-1 px-3 rounded text-white shadow">Delivered</span>';
              }
              if($order->status == 'shipped'){
                $status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Shipped</span>';
              }
              if($order->status == 'cancelled'){
                $status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">Cancelled</span>';
              }
              if($order->payment_status == 'pending'){
                $payment_status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Pending</span>';
              }
              if($order->payment_status == 'paid'){
                $payment_status = '<span class="bg-green-600 py-1 px-3 rounded text-white shadow">Paid</span>';
              }
              if($order->payment_status == 'failed'){
                $payment_status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">failed</span>';
              }
             @endphp
              <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800" wire:key ='{{ $order->id }}'>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $order->created_at->format('d-m-Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{!! $status !!}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{!! $payment_status !!}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{Number::currency($order->grand_total,'LKR') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                  <a href="/my-orders/{{ $order->id }}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View Details</a>
                </td>
              </tr>
              @endforeach
              

             

              

            </tbody>
          </table>
        </div>
      </div>
      {{$my_orders->links()}}
    </div>
  </div>
</div>




<!-- NOTE -->

<!-- in here i am using the bearer token for the admin login to fetch detail.. but my order page blade should show the order of the particular login user. but when i tried using the admin  token in the order page blade it shows all the orders of the admin not the particular user order. how -->


<!-- ///////
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
    <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Status</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Amount</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody id="orders-table">
                             Orders will be inserted here dynamically 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchOrders();
    });

    function fetchOrders() {
      const token = "4|xHlLMNcnfS3m1tdKvavIOBcSvylQVHzuRgb4heXb90943ade";
        axios.get('/api/orders', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                withCredentials: true
            })
            .then(response => {
                let orders = response.data.data;
                let ordersTable = document.getElementById('orders-table');
                ordersTable.innerHTML = '';

                orders.forEach(order => {
                    let status = getStatusBadge(order.status);
                    let paymentStatus = getPaymentBadge(order.payment_status);
                    let formattedAmount = new Intl.NumberFormat('en-LK', { style: 'currency', currency: 'LKR' }).format(order.grand_total);

                    let row = `
                        <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">${order.id}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">${new Date(order.created_at).toLocaleDateString()}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">${status}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">${paymentStatus}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">${formattedAmount}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <a href="/my-orders/${order.id}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View Details</a>
                            </td>
                        </tr>
                    `;
                    ordersTable.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching orders:', error));
    }

    function getStatusBadge(status) {
        const statusMap = {
            'new': '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">New</span>',
            'processing': '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Processing</span>',
            'shipped': '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Shipped</span>',
            'delivered': '<span class="bg-green-700 py-1 px-3 rounded text-white shadow">Delivered</span>',
            'cancelled': '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">Cancelled</span>'
        };
        return statusMap[status] || '<span class="bg-gray-500 py-1 px-3 rounded text-white shadow">Unknown</span>';
    }

    function getPaymentBadge(paymentStatus) {
        const paymentMap = {
            'pending': '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Pending</span>',
            'paid': '<span class="bg-green-600 py-1 px-3 rounded text-white shadow">Paid</span>',
            'failed': '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">Failed</span>'
        };
        return paymentMap[paymentStatus] || '<span class="bg-gray-500 py-1 px-3 rounded text-white shadow">Unknown</span>';
    }
</script> -->
