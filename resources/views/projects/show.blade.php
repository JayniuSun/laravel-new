<!-- show blade -->
 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $project->name }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $project->description }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong>Created At:</strong> {{ $project->created_at }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong>Last Updated:</strong> {{ $project->updated_at }}
                        </p>
                        @if ($project->due_date)
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Due Date:</strong> {{ $project->due_date }}
                            </p>
                        @endif
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="mt-4 w-64 h-64 object-cover rounded-md">
                    </div>

                    <div class="flex space-x-2 mt-6">
                        <a href="{{ route('projects.edit', $project->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                        </form>
                        <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back to Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>