<!-- buatkan index project -->
 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Your Project Types</h3>
                        <a href="{{ route('project-types.delete-all') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete all</a>
                        <a href="{{ route('project_types.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Project Types</a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($project_types->isEmpty())
                        <p>You haven't created any project types yet.</p>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($project_types as $project_types)
                                <li class="py-4 flex justify-between items-center">
                                    <div>
                                        <a href="{{ route('project_types.show', $project_types->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline text-lg font-medium">{{ $project_types->types_name }} </a>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($project_types->types_name, 70) }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($project_types->keterangan, 70) }}</p>
                                        
                                        
                                    </div>
                                    <div class="flex space-x-2">
                                        <!-- show -->
                                         
                                        <a href="{{ route('project_types.show', $project_types->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 text-sm">View</a>
                                        
                                        <a href="{{ route('project_types.edit', $project_types->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-sm">Edit</a>
                                        <form action="{{ route('project_types.destroy', $project_types->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">Delete</button>
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