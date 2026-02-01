<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Your Messages</h3>
                    <a href="{{ route('messages.delete-all') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete all</a>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($messages->isEmpty())
                        <p>You have no messages yet.</p>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($messages as $message)
                                <li class="py-4">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-md font-medium">{{ $message->name }} ({{ $message->email }})</h4>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $message->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                    @if ($message->company)
                                        <p class="text-sm text-gray-600 dark:text-gray-300">Company: {{ $message->company }}</p>
                                    @endif
                                    @if ($message->phone)
                                        <p class="text-sm text-gray-600 dark:text-gray-300">Phone: {{ $message->phone }}</p>
                                    @endif
                                    <p class="mt-2 text-gray-800 dark:text-gray-200">{{ $message->message }}</p>
                                    <div class="mt-3 flex space-x-2">
                                        <a href="{{ route('messages.show', $message->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">View</a>
                                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
