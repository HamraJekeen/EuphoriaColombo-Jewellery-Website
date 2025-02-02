<div>
<div class="bg-white">
  <div class="w-full h-screen bg-[url('/public/images/chainpro.jpg')] bg-cover bg-center flex flex-col justify-end py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative -top-80 text-center">
        <h1 class="block text-1xl text-black sm:text-2xl lg:text-4xl lg:leading-tight">
          Shop Here<span class="text-blue-600"></span>
        </h1>
        <div class="mt-7 grid gap-3 w-full sm:inline-flex">
          <a href="/register"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins rounded-lg">
      <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
        <div class="flex flex-wrap mb-24 -mx-3">
          <div class="w-full pr-2 lg:w-1/4 lg:block">
            <div class="p-4 mb-5 bg-white border border-gray-200">
              <h2 class="text-2xl font-bold"> Categories</h2>
              <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
              <ul>
                @foreach ($categories as $category)
                  <li class="mb-4" wire:key="{{$category->id}}">
                    <label for="{{$category->slug}}" class="flex items-center ">
                      <input type="checkbox" wire:model.live="selected_categories" id="{{$category->slug}}" value="{{$category->id}}" class="w-4 h-4 mr-2">
                      <span class="text-lg">{{$category->name}}</span>
                    </label>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="p-4 mb-5 bg-white border border-gray-200">
              <h2 class="text-2xl font-bold">Product Status</h2>
              <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
              <ul>
                <li class="mb-4">
                  <label for="featured" class="flex items-center">
                    <input type="checkbox" id="featured" wire:model.live="featured" value="1" class="w-4 h-4 mr-2">
                    <span class="text-lg">Featured Products</span>
                  </label>
                </li>
                <li class="mb-4">
                  <label for="on_sale" class="flex items-center">
                    <input type="checkbox" id="on_sale" wire:model.live="on_sale" value="1" class="w-4 h-4 mr-2">
                    <span class="text-lg">On Sale</span>
                  </label>
                </li>
              </ul>
            </div>
            <div class="p-4 mb-5 bg-white border border-gray-200">
              <h2 class="text-2xl font-bold">Price</h2>
              <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
              <div>
                <div class="font-semibold">{{Number::currency($price_range,'LKR')}}</div>
                <input type="range" wire:model.live="price_range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" max="4000" value="1000" step="500">
                <div class="flex justify-between ">
                  <span class="inline-block text-lg font-bold text-blue-400 ">{{Number::currency(500,'LKR')}}</span>
                  <span class="inline-block text-lg font-bold text-blue-400 ">{{Number::currency(4000,'LKR')}}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full px-3 lg:w-3/4">
            <div class="px-3 mb-4">
              <div class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex">
                <div class="flex items-center justify-between">
                  <select wire:model.live="sort" class="block w-40 text-base bg-gray-100 cursor-pointer">
                    <option value="latest">Sort by latest</option>
                    <option value="price">Sort by Price</option>
                  </select>
                </div>
              </div>
            </div>
            <!--product items start-->
          <!-- <div id="products-container" class="flex flex-wrap items-center">
                Products will be injected here dynamically  
              </div> -->

            <!--product items start-->
            <div class="flex flex-wrap items-center">
              @foreach ($products as $product )
              <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{$product->id}}">
                <div class="border border-gray-300">
                  <div class="relative bg-gray-200">
                    <a href="/products/{{$product->slug}}">
                      <img src="{{url('storage', $product->image[0])}}" alt="{{$product->name}}" class="object-cover w-full h-56 mx-auto">
                    </a>
                  </div>
                  <div class="p-3 ">
                    <div class="flex items-center justify-between gap-2 mb-2">
                      <h3 class="text-xl font-medium">{{$product->name}}</h3>
                    </div>
                    <p class="text-lg ">
                      <span class="text-green-600">{{Number::currency($product->price,'LKR')}}</span>
                    </p>
                  </div>
                  <div class="flex justify-center p-4 border-t border-gray-300">
                    <a wire:click.prevent='addToCart({{$product->id}})' href="#" class="text-gray-500 flex items-center space-x-2 hover:text-red-500">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                        <path d="..."/>
                      </svg>
                      <span wire:loading.remove wire:target='addToCart({{$product->id}})'>Add to Cart</span>
                      <span wire:loading wire:target='addToCart({{$product->id}})'>Adding...</span>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="flex justify-end mt-6">
              {{$products->links()}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


<!-- when trying axios only the product is display but other functionalities like add to cart is not working -->

<!-- <script>


// document.addEventListener("DOMContentLoaded", function () {
//     const productsContainer = document.getElementById("products-container");

//     axios.get('/api/products', {
//         headers: {
//             Accept: "application/json"
//         }
//     })
//     .then(response => {
//         const products = response.data.data; // Adjust if needed

//         productsContainer.innerHTML = products.map(product => `
//             <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3">
//                 <div class="border border-gray-300">
//                     <div class="relative bg-gray-200">
//                         <a href="/products/${product.slug}">
//                             <img src="${product.image}" alt="${product.name}" class="object-cover w-full h-56 mx-auto">
//                         </a>
//                     </div>
//                     <div class="p-3">
//                         <h3 class="text-xl font-medium">${product.name}</h3>
//                         <p class="text-lg text-green-600">LKR ${product.price}</p>
//                     </div>
//                     <div class="flex justify-center p-4 border-t border-gray-300">
//                         <button onclick="addToCart(${product.id}, ${product.price})" class="text-gray-500 hover:text-red-500">
//                             Add to Cart
//                         </button>
//                     </div>
//                 </div>
//             </div>
//         `).join('');
//     })
//     .catch(error => {
//         console.error("Error fetching products:", error);
//         productsContainer.innerHTML = '<p class="text-red-500">Failed to load products.</p>';
//     });
// });

// // Add product to cart
// document.getElementById('add-to-cart').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent default form submission

//     const productId = document.getElementById('product_id').value;
//     const quantity = document.getElementById('quantity').value;
//     const orderId = document.getElementById('order_id') ? document.getElementById('order_id').value : null; // Optional

//     if (productId && quantity > 0) {
//         // POST request using Axios
//         axios.post('/api/order-items', {
//             product_id: productId,
//             quantity: quantity,
//             order_id: orderId // Pass order_id if available
//         }, {
//             headers: {
//                 Authorization: `Bearer 4|xHlLMNcnfS3m1tdKvavIOBcSvylQVHzuRgb4heXb90943ade` // Replace with actual token
//             }
//         })
//         .then(response => {
//             alert('Product added to cart successfully!');
//             location.reload(); // Reload page to update cart items
//         })
//         .catch(error => {
//             console.error(error);
//             alert('Failed to add product to cart. Please try again.');
//         });
//     } else {
//         alert('Please select a valid quantity.');
//     }
// });

//</script> -->

<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    const productsContainer = document.getElementById("products-container");

    axios.get('/api/products', {
        headers: {
            Accept: "application/json"
        }
    })
    .then(response => {
        const products = response.data.data; // Adjust if response structure is different

        // Clear existing content
        productsContainer.innerHTML = products.map(product => `
            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3">
                <div class="border border-gray-300">
                    <div class="relative bg-gray-200">
                        <a href="/products/${product.slug}">
                            <img src="${product.image}" alt="${product.name}" class="object-cover w-full h-56 mx-auto">
                        </a>
                    </div>
                    <div class="p-3">
                        <h3 class="text-xl font-medium">${product.name}</h3>
                        <p class="text-lg text-green-600">LKR ${product.price}</p>
                    </div>
                    <div class="flex justify-center p-4 border-t border-gray-300">
                        <button onclick="addToCart(${product.id})" class="text-gray-500 hover:text-red-500">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    })
    .catch(error => {
        console.error("Error fetching products:", error);
        productsContainer.innerHTML = '<p class="text-red-500">Failed to load products.</p>';
    });
});
</script>

