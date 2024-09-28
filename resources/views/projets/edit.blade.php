
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">Modifier le Projet</h1>
                    <form action="{{ route('projects.update', $projet->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ $projet->nom }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>{{ $projet->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date_debut" class="block text-sm font-medium text-gray-700">Date début</label>
                            <input type="datetime-local" id="date_debut" name="date_debut" value="{{ \Carbon\Carbon::parse($projet->date_debut)->format('Y-m-d\TH:i') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_fin" class="block text-sm font-medium text-gray-700">Date fin</label>
                            <input type="datetime-local" id="date_fin" name="date_fin" value="{{ \Carbon\Carbon::parse($projet->date_fin)->format('Y-m-d\TH:i') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        </div>
                        <button type="submit" style="color: black;background: #0c5460"  class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md shadow-sm text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Mettre à jour
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
