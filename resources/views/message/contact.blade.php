@php use Carbon\Carbon;
 use Illuminate\Support\Facades\Auth;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 20px">
            {{ __('Projets') }}
        </h2>
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">Users Liste</a>
        <a href="{{ route('projects.index') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-    4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;" >Liste des project
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Projects List</h3>

                    <table class="min-w-full divide-y divide-gray-200" style="margin-top: 20px">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name User
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date d'envoie
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($messages as $message)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $message->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $message->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $message->commentaire }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Carbon::parse($message->create_at)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('contact.lu', $message->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">Signer comme lu </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
