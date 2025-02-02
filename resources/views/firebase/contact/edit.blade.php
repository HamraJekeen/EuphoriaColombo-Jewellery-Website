@livewire('partials.navbar')
<x-guest-layout>
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        
        <div class="flex h-full items-center">
            <main class="w-full max-w-md mx-auto p-0">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-4 sm:p-7">
                        <div class="text-center">
                            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Edit Inquiry</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                <!-- Have any questions? Fill out the form below, and we'll get back to you. -->
                            </p>
                        </div>

                        <hr class="my-5 border-slate-300">

                        <!-- Inquiry Form -->
                        <form action="{{ route('contacts.update', $id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label class="block">Name:</label>
                            <input type="text" name="name" value="{{ $inquiry['name'] }}" class="w-full border p-2">

                            <label class="block mt-2">Email:</label>
                            <input type="email" name="email" value="{{ $inquiry['email'] }}" class="w-full border p-2" readonly>

                            <label class="block mt-2">Subject:</label>
                            <input type="text" name="subject" value="{{ $inquiry['subject'] }}" class="w-full border p-2">

                            <label class="block mt-2">Message:</label>
                            <textarea name="message" class="w-full border p-2">{{ $inquiry['message'] }}</textarea>

                            <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
                        </form>
                        <!-- End Inquiry Form -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Inquiry</h1>

        <form action="{{ route('contacts.update', $id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block">Name:</label>
            <input type="text" name="name" value="{{ $inquiry['name'] }}" class="w-full border p-2">

            <label class="block mt-2">Email:</label>
            <input type="email" name="email" value="{{ $inquiry['email'] }}" class="w-full border p-2" readonly>

            <label class="block mt-2">Subject:</label>
            <input type="text" name="subject" value="{{ $inquiry['subject'] }}" class="w-full border p-2">

            <label class="block mt-2">Message:</label>
            <textarea name="message" class="w-full border p-2">{{ $inquiry['message'] }}</textarea>

            <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div> -->
</x-guest-layout>
@livewire('partials.footer') 