@php use Carbon\Carbon; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-50 p-6 rounded-lg shadow">
                        <h1 class="text-2xl font-semibold mb-4">Détails du Projet</h1>
                        <div class="mb-4">
                            <h5 class="text-xl font-medium text-gray-800">Nom</h5>
                            <p class="text-gray-600">{{ $projet->nom }}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-xl font-medium text-gray-800">Description</h5>
                            <p class="text-gray-600">{{ $projet->description }}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-xl font-medium text-gray-800">Date début</h5>
                            <p class="text-gray-600">{{ Carbon::parse($projet->date_fin)->format('d M Y') }}</p>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-xl font-medium text-gray-800">Date fin</h5>
                            <p class="text-gray-600">{{ Carbon::parse($projet->date_fin)->format('d M Y ') }}</p>
                        </div>
                        <a href="{{ route('projects.index') }}" style="color: black;background: #0c5460"  class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md shadow-sm text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
