<x-layouts.app title="Participantes do Evento">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header
                title="Participantes do Evento"
                subtitle="Gerencie quem participa deste evento"
            />

            <x-content-wrapper>

                {{-- ALERTAS --}}
                @if (session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif

                @if ($errors->any())
                    <x-alert type="error">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alert>
                @endif

                {{-- CARD PRINCIPAL --}}
                <div class="bg-white rounded-lg shadow p-6 space-y-6">

                    {{-- Nome do evento --}}
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">
                            {{ $event->name }}
                        </h2>
                        <p class="text-sm text-gray-500">
                            Clique nos usuários para adicionar ou remover do evento
                        </p>
                    </div>

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('event.participants.store', $event->id) }}">
                        @csrf

                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div
                            x-data="participantsManager(
                                {{ $users->toJson() }},
                                {{ $participants->pluck('id')->toJson() }}
                            )"
                            class="grid grid-cols-1 md:grid-cols-2 gap-6"
                        >

                            {{-- COLUNA ESQUERDA --}}
                            <div class="space-y-3">
                                <h3 class="font-semibold text-gray-700">
                                    Usuários disponíveis
                                </h3>

                                <input
                                    type="text"
                                    placeholder="Buscar usuário..."
                                    x-model="searchAvailable"
                                    class="w-full border rounded px-3 py-2 text-sm"
                                >

                                <ul class="border rounded max-h-72 overflow-y-auto divide-y">
                                    <template x-for="user in filteredAvailable()" :key="user.id">
                                        <li
                                            @click="addParticipant(user)"
                                            class="px-3 py-2 cursor-pointer hover:bg-blue-50 text-sm"
                                        >
                                            <span x-text="user.name"></span>
                                        </li>
                                    </template>

                                    <li
                                        x-show="filteredAvailable().length === 0"
                                        class="px-3 py-2 text-sm text-gray-500 text-center"
                                    >
                                        Nenhum usuário encontrado
                                    </li>
                                </ul>
                            </div>

                            {{-- COLUNA DIREITA --}}
                            <div class="space-y-3">
                                <h3 class="font-semibold text-gray-700">
                                    Participantes do evento
                                </h3>

                                <input
                                    type="text"
                                    placeholder="Buscar participante..."
                                    x-model="searchSelected"
                                    class="w-full border rounded px-3 py-2 text-sm"
                                >

                                <ul class="border rounded max-h-72 overflow-y-auto divide-y">
                                    <template x-for="user in filteredSelected()" :key="user.id">
                                        <li
                                            @click="removeParticipant(user)"
                                            class="px-3 py-2 cursor-pointer hover:bg-red-50 text-sm flex justify-between items-center"
                                        >
                                            <span x-text="user.name"></span>
                                            <span class="text-red-500 text-xs">
                                                Remover
                                            </span>
                                        </li>
                                    </template>

                                    <li
                                        x-show="filteredSelected().length === 0"
                                        class="px-3 py-2 text-sm text-gray-500 text-center"
                                    >
                                        Nenhum participante adicionado
                                    </li>
                                </ul>
                            </div>

                            {{-- INPUTS OCULTOS --}}
                            <template x-for="user in selected" :key="'hidden-' + user.id">
                                <input type="hidden" name="participants[]" :value="user.id">
                            </template>

                        </div>

                        {{-- AÇÕES --}}
                        <div class="flex justify-end pt-6 border-t mt-6">
                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium"
                            >
                                Salvar participantes
                            </button>
                        </div>

                    </form>

                </div>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

    {{-- ALPINE --}}
    <script>
        function participantsManager(users, selectedIds) {
            return {
                allUsers: users,
                selected: users.filter(u => selectedIds.includes(u.id)),
                searchAvailable: '',
                searchSelected: '',

                get available() {
                    return this.allUsers.filter(
                        u => !this.selected.some(s => s.id === u.id)
                    )
                },

                addParticipant(user) {
                    this.selected.push(user)
                },

                removeParticipant(user) {
                    this.selected = this.selected.filter(u => u.id !== user.id)
                },

                filteredAvailable() {
                    return this.available.filter(u =>
                        u.name.toLowerCase().includes(this.searchAvailable.toLowerCase())
                    )
                },

                filteredSelected() {
                    return this.selected.filter(u =>
                        u.name.toLowerCase().includes(this.searchSelected.toLowerCase())
                    )
                }
            }
        }
    </script>

</x-layouts.app>
