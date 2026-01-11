<x-layouts.app title="Eventos">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">
            <x-page-header title="Eventos" subtitle="Registre eventos e atividades" />

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
                            Lista de Eventos
                        </h2>

                        <div class="flex items-center gap-4">
                            <span class="text-sm text-amber-700">
                                {{ $events->count() }} Evento{{ $events->count() !== 1 ? 's' : '' }}
                            </span>

                            <x-action-button href="{{ route('events.create') }}">
                                + Novo Evento
                            </x-action-button>
                        </div>
                    </x-card-header>

                    <div class="p-6">
                        <x-table>
                            <thead class="bg-linear-to-r from-amber-50 to-amber-50/50">
                                <tr>
                                    <x-table-th>Nome</x-table-th>
                                    <x-table-th class="hidden sm:table-cell">Tipo</x-table-th>
                                    <x-table-th>Início</x-table-th>
                                    <x-table-th class="hidden sm:table-cell">Fim</x-table-th>
                                    <x-table-th class="text-center">Ações</x-table-th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-amber-50 bg-white">
                                @forelse ($events as $event)
                                    <tr onclick="window.location='{{ route('events.edit', $event->id) }}'"
                                        class="cursor-pointer hover:bg-amber-50/70 transition">
                                        <x-table-td class="font-medium">
                                            {{ $event->name }}
                                        </x-table-td>

                                        <x-table-td class="hidden sm:table-cell">
                                            {{ $event->type }}
                                        </x-table-td>

                                        <x-table-td>
                                            {{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') : 'N/A' }}
                                        </x-table-td>

                                        <x-table-td class="hidden sm:table-cell">
                                            {{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') : 'N/A' }}
                                        </x-table-td>

                                        <x-table-td class="text-center">
                                            <form action="{{ route('events.destroy', $event) }}" method="POST"
                                                onsubmit="event.stopPropagation(); return confirm('Excluir?')"
                                                class="flex flex-col items-center gap-2">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="event.stopPropagation()"
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                    Excluir
                                                </button>

                                                <button type="button"
                                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                    onclick="event.stopPropagation(); window.location='{{ route('event.participants.index', $event->id) }}'">
                                                    Participantes
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
