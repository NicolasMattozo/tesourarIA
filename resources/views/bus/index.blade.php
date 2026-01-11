<x-layouts.app title="Ônibus">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">
            <x-page-header title="Ônibus" subtitle="Registre Ônibus" />

            <x-content-wrapper>

                @if (session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif

                @if ($errors->any())
                    <x-alert type="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alert>
                @endif

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Ônibus
                        </h2>

                        <div class="flex items-center gap-4">
                            <span class="text-sm text-amber-700">
                                {{ $buses->count() }} Ônibus registrado(s)
                            </span>

                            <x-action-button href="{{ route('bus.create') }}">
                                + Novo Ônibus
                            </x-action-button>
                        </div>
                    </x-card-header>

                    <div class="p-6">
                        <x-table>
                            <thead class="bg-linear-to-r from-amber-50 to-amber-50/50">
                                <tr>
                                    <x-table-th>Evento do Ônibus</x-table-th>
                                    <x-table-th class="hidden sm:table-cell">Capacidade</x-table-th>
                                    <x-table-th>Preço</x-table-th>
                                    <x-table-th class="text-center">Ações</x-table-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-amber-50 bg-white">
                                @forelse ($buses as $id => $bus)
                                    <tr onclick="window.location='{{ route('bus.edit', $bus->id) }}'"
                                        class="cursor-pointer hover:bg-amber-50/70 transition">
                                        <x-table-td class="font-medium">
                                            {{ $events[$id]->name }}
                                        </x-table-td>

                                        <x-table-td class="hidden sm:table-cell">
                                            {{ $bus->capacity }}
                                        </x-table-td>

                                        <x-table-td>
                                            {{ $bus->price }}
                                        </x-table-td>

                                        <x-table-td class="text-center">
                                            <form action="{{ route('bus.destroy', $bus) }}" method="POST"
                                                onsubmit="event.stopPropagation(); return confirm('Excluir?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="event.stopPropagation()"
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                    Excluir
                                                </button>

                                                <button type="button"
                                                    class="ml-4 text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    onclick="event.stopPropagation(); window.location='{{ route('bus.passengers.index', $bus->id) }}'">
                                                    Gerenciar Passageiros
                                                </button>

                                            </form>
                                        </x-table-td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center text-sm text-gray-500">
                                            Nenhum evento registrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>

                </x-card>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

</x-layouts.app>
