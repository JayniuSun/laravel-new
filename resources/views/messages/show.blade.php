<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Message Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $messages->name }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Email:</strong> {{ $messages->email }}</p>
                        @if ($messages->company)
                            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Company:</strong> {{ $messages->company }}</p>
                        @endif
                        @if ($messages->phone)
                            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Phone:</strong> {{ $messages->phone }}</p>
                        @endif
                        <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Message:</strong> {{ $messages->message }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong>Received At:</strong> {{ $messages->created_at->format('M d, Y H:i') }}
                        </p>
                    </div>

                    <div class="flex space-x-2 mt-6">
                        <form action="{{ route('messages.destroy', $messages->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                        </form>
                        <a href="{{ route('messages.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back to Messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>