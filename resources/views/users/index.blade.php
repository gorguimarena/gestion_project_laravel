<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 20px">
            {{ __('Gestion des Utilisateurs') }}
        </h2>

            <a href="{{ route('projects.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 80px 0 12px 0;">Projects List</a>
            <a href="{{ route('users.contacts') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">List des messages</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-gray-50 p-6 rounded-lg shadow">
                        <h1 class="text-2xl font-semibold mb-4">Liste des Utilisateurs</h1>

                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle actuel</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Changer le rôle</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="role" class="form-select mt-1 block w-full">
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            <button type="submit" style="color: black;background: #0c5460" class="mt-2 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md shadow-sm text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Mettre à jour
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

