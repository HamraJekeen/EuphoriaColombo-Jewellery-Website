<div x-data="{ mobileMenuOpen: false }">
    <header class="sticky top-0 z-50 w-full bg-white shadow-md dark:bg-gray-800">
        <nav class="container mx-auto px-10 lg:px-8 xl:px-10">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0 text-xl font-semibold dark:text-white">
                Euphoria Colombo
                </a>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button 
                        type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
                    >
                        <svg 
                            class="h-6 w-6" 
                            :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg 
                            class="h-6 w-6" 
                            :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }"
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a wire:navigate href="/" class="nav-link {{ request()->is('/') ? 'text-blue-600' : 'text-gray-500' }}">
                        Home
                    </a>
                    <a wire:navigate href="/categories" class="nav-link {{ request()->is('categories') ? 'text-blue-600' : 'text-gray-500' }}">
                        Categories
                    </a>
                    <a wire:navigate href="/products" class="nav-link {{ request()->is('products') ? 'text-blue-600' : 'text-gray-500' }}">
                        Products
                    </a>
                    
                    <!-- Cart -->
                    <a wire:navigate href="/cart" class="nav-link flex items-center {{ request()->is('cart') ? 'text-blue-600' : 'text-gray-500' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="mr-1">Cart</span>
                        <span class="bg-blue-50 text-blue-600 text-xs font-medium px-1.5 py-0.5 rounded-full border border-blue-200">
                            {{$total_count}}
                        </span>
                    </a>

                    <!-- Auth Menu -->
                    @guest
                        <a wire:navigate href="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2M12 3a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                            </svg>
                            Log in
                        </a>
                    @endguest

                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button 
                                @click="open = !open"
                                @click.away="open = false"
                                class="flex items-center text-gray-500 hover:text-gray-600"
                            >
                                <span class="mr-2">{{ auth()->user()->name }}</span>
                                <svg 
                                    class="h-4 w-4 transition-transform"
                                    :class="{ 'rotate-180': open }"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div 
                                x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-gray-700"
                                style="z-index: 9999;"
                            >
                                <div class="py-1">
                                    <a wire:navigate href="/my-orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                        My Orders
                                    </a>
                                    <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                        My Account
                                    </a> -->
                                </div>
                                <div class="py-1">
                                    <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-red-900/20">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu -->
            <div 
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="md:hidden"
            >
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a wire:navigate href="/" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'text-blue-600' : 'text-gray-500' }} hover:bg-gray-50">
                        Home
                    </a>
                    <a wire:navigate href="/categories" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('categories') ? 'text-blue-600' : 'text-gray-500' }} hover:bg-gray-50">
                        Categories
                    </a>
                    <a wire:navigate href="/products" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('products') ? 'text-blue-600' : 'text-gray-500' }} hover:bg-gray-50">
                        Products
                    </a>
                    <a wire:navigate href="/cart" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('cart') ? 'text-blue-600' : 'text-gray-500' }} hover:bg-gray-50">
                        Cart <span class="bg-blue-50 text-blue-600 text-xs font-medium px-1.5 py-0.5 rounded-full border border-blue-200">{{$total_count}}</span>
                    </a>
                    
                    @guest
                        <a wire:navigate href="/login" class="block w-full px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700 text-center">
                            Log in
                        </a>
                    @endguest

                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button 
                                @click="open = !open"
                                class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-500"
                            >
                                <span>{{ auth()->user()->name }}</span>
                                <svg 
                                    class="ml-2 h-4 w-4 transition-transform"
                                    :class="{ 'rotate-180': open }"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div 
                                x-show="open"
                                class="mt-2 space-y-1 px-3"
                            >
                                <a wire:navigate href="/my-orders" class="block py-2 text-base text-gray-500 hover:text-gray-900">
                                    My Orders
                                </a>
                                <!-- <a href="#" class="block py-2 text-base text-gray-500 hover:text-gray-900">
                                    My Account
                                </a> -->
                                <a href="/logout" class="block py-2 text-base text-red-600 hover:text-red-700">
                                    Logout
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <style>
        .nav-link {
            @apply font-medium hover:text-gray-600 transition-colors duration-200;
        }
    </style>
</div>