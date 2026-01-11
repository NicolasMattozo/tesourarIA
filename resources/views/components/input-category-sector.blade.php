@props(['financialSector', 'events'])
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Evento</label>
        <select name="event_id" class="input-focus w-full px-4 py-3 border border-gray-300 rounded-lg bg-white">
            <option value="">— Nenhum —</option>
            @foreach ($events as $event)
                <option value="{{ $event->id }}" {{ $event->id == old('event_id') ? 'selected' : '' }}>
                    {{ $event->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Setor Financeiro</label>
        <select name="financial_sector_id" class="input-focus w-full px-4 py-3 border border-gray-300 rounded-lg bg-white">
            <option value="">— Nenhum —</option>
            @foreach ($financialSector as $sector)
                <option value="{{ $sector->id }}" {{ $sector->id == old('financial_sector_id') ? 'selected' : '' }}>
                    {{ $sector->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div x-data="{
            open: false,
            search: '',
            selected: null,
            options: [
                { id: 1, name: 'João' },
                { id: 2, name: 'Maria' },
                { id: 3, name: 'Carlos' },
                { id: 4, name: 'Ana Paula' },
            ]
        }" class="relative w-full">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Responsável
            </label>

            <!-- Botão do select -->
            <button type="button" @click="open = !open"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-left flex justify-between items-center">
                <span x-text="selected ? selected.name : '— Nenhum —'"></span>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div x-show="open" @click.outside="open = false" x-transition
                class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <!-- Busca -->
                <div class="p-2">
                    <input type="text" x-model="search" placeholder="Buscar responsável..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring">
                </div>

                <!-- Lista -->
                <ul class="max-h-48 overflow-y-auto">
                    <template x-for="option in options.filter(o => o.name.toLowerCase().includes(search.toLowerCase()))"
                        :key="option.id">
                        <li>
                            <button type="button"
                                @click="
                                selected = option;
                                open = false;
                                search = '';
                            "
                                class="w-full px-4 py-2 text-left hover:bg-gray-100" x-text="option.name"></button>
                        </li>
                    </template>

                    <li x-show="options.filter(o => o.name.toLowerCase().includes(search.toLowerCase())).length === 0"
                        class="px-4 py-2 text-gray-500 text-sm">
                        Nenhum resultado
                    </li>
                </ul>
            </div>

            <!-- Valor real enviado no form -->
            <input name="user_id" type="hidden" :value="selected?.id">
    </div>

</div>
