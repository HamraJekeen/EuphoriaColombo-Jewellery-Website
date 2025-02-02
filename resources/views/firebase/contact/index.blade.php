@livewire('partials.navbar')



<x-guest-layout>
<a href="{{ route('contacts.view') }}"class="flex items-center justify-end mt-4 mr-8">
    <button type="button" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 focus:outline-none">
        View Inquiries
    </button>
</a>
        @if(session('success'))
            <div class="w-full max-w-md mx-auto mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md">
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="w-full max-w-md mx-auto mt-4 p-3 bg-green-100 border border-red-400 text-green-red rounded-lg shadow-md">
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
        @endif

    
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        
        <div class="flex h-full items-center">
            <main class="w-full max-w-md mx-auto p-0">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 sm:p-7">
                        <div class="text-center">
                            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Inquiry Form</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Have any questions? Fill out the form below, and we'll get back to you.
                            </p>
                        </div>

                        <hr class="my-5 border-slate-300">

                        <!-- Inquiry Form -->
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            
                            <!-- Name -->
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Full Name</label>
                                <input type="text" id="name" name="name" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required autofocus>
                            </div>

                            <!-- Email -->
                            <div class="mt-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                                <input type="email" id="email" name="email" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required>
                            </div>

                            <!-- Subject -->
                            <div class="mt-4">
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-white">Subject</label>
                                <input type="text" id="subject" name="subject" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required>
                            </div>

                            <!-- Message -->
                            <div class="mt-4">
                                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-white">Message</label>
                                <textarea id="message" name="message" rows="4" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-md hover:bg-indigo-700 focus:outline-none">
                                    Save
                                </button>
                            </div>
                        </form>
                        <!-- End Inquiry Form -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-guest-layout>

@livewire('partials.footer')
