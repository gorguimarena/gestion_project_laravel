@php use Carbon\Carbon;
 use Illuminate\Support\Facades\Auth;
 @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 20px">
            {{ __('Projets') }}
        </h2>
        @if($isAdmin)
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">Users Liste</a>
        @endif
        @if($isAdmin)
            <a href="{{ route('users.contacts') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">List des messages</a>
        @endif
        @if(!$isAdmin)
            <a href="{{ route('users.contact') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;">Contacter</a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Projects List</h3>

                    @if($isAdmin)
                        <a href="{{ route('projects.create') }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-    4 inline-block " style="color: black;background: #0c5460;margin: 20px 0 12px 0;" >Add
                            Project</a>
                    @endif


                    <table class="min-w-full divide-y divide-gray-200" style="margin-top: 20px">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End Date
                            </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($projets as $projet)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $projet->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $projet->nom }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $projet->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Carbon::parse($projet->date_debut)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Carbon::parse($projet->date_fin)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <a href="{{ route('projects.show', $projet->id) }}"
                                       class="text-blue-500 hover:text-blue-700" style="color: black;background: #0c5460;margin: 20px 0 12px 0;padding: 6px;border-radius: 5px">details</a>
                                @if($isAdmin)

                                        <a href="{{ route('projects.edit', $projet->id) }}"
                                           class="text-blue-500 hover:text-blue-700"  style="color: black;background: #0c5460;margin: 20px 0 12px 0;padding: 6px;border-radius: 5px">Edit</a>
                                        <form action="{{ route('projects.destroy', $projet->id) }}" method="POST"
                                              style="display:inline;" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700"  style="color: white;background: #0c5460;padding: 3px;border-radius: 5px">Delete
                                            </button>
                                        </form>

                                @endif
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
