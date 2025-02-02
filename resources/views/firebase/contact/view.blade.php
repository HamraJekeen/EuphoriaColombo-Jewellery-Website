@livewire('partials.navbar')
<x-guest-layout>
        @if(session('success'))
            <div class="w-full max-w-md mx-auto mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md">
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="w-full max-w-md mx-auto mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md">
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
        @endif
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Submitted Inquiries</h1>

        <table class="min-w-full bg-white border border-gray-300 shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Name</th>
                    <!-- <th class="px-4 py-2 border">Email</th> -->
                    <th class="px-4 py-2 border">Subject</th>
                    <th class="px-4 py-2 border">Message</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $key => $inquiry)
                    <tr class="text-center border">
                        <td class="px-4 py-2">{{ $inquiry['name'] }}</td>
                        <!-- <td class="px-4 py-2 inquiry-email">{{ $inquiry['email'] }}</td> -->
                        <td class="px-4 py-2">{{ $inquiry['subject'] }}</td>
                        <td class="px-4 py-2">{{ $inquiry['message'] }}</td>
                        <td class="px-4 py-2">
                            <button class="edit-btn bg-yellow-500 text-white px-3 py-1 rounded-md" data-id="{{ $key }}" data-email="{{ $inquiry['email'] }}">Edit</button>
                            <button class="delete-btn bg-red-600 text-white px-3 py-1 rounded-md" data-id="{{ $key }}" data-email="{{ $inquiry['email'] }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript to Authenticate Email -->
    <script>
        function authenticateEmail(action, inquiryId, correctEmail) {
            let enteredEmail = prompt("Enter the email used to submit this inquiry:");

            if (enteredEmail === correctEmail) {
                if (action === 'edit') {
                    window.location.href = `/contacts/edit/${inquiryId}`;
                } else if (action === 'delete') {
                    if (confirm('Are you sure you want to delete this inquiry?')) {
                        window.location.href = `/contacts/delete/${inquiryId}`;
                    }
                }
            } else {
                alert("Incorrect email. Action denied.");
            }
        }

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inquiryId = this.getAttribute('data-id');
                let correctEmail = this.getAttribute('data-email');
                authenticateEmail('edit', inquiryId, correctEmail);
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                let inquiryId = this.getAttribute('data-id');
                let correctEmail = this.getAttribute('data-email');
                authenticateEmail('delete', inquiryId, correctEmail);
            });
        });
    </script>
</x-guest-layout>

@livewire('partials.footer')
