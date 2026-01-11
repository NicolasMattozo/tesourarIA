<x-layouts.app title="Editar Ônibus">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header title="Editar Ônibus" subtitle="Atualize as informações do Ônibus" />

            <x-content-wrapper>

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Editar Ônibus
                        </h2>
                    </x-card-header>

                    <div class="p-6">
                        <x-form method="POST" action="{{ route('bus.update', $bus) }}" name="Ônibus">
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Evento *</label>
                                <select name="event_id"
                                    class="input-focus w-full px-4 py-3 border border-gray-300 rounded-lg bg-white">
                                    <option value="">Selecione um evento</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}"
                                            {{ old('event_id', $bus->event_id) == $event->id ? 'selected' : '' }}>
                                            {{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <x-input.input label="Capacidade" name="capacity" type="number"
                                placeholder="Digite a capacidade do Ônibus" :value="old('capacity', $bus->capacity)" required />

                            <x-input.input label="Preço" name="price" type="number" step="0.01"
                                placeholder="Digite o preço do Ônibus" :value="old('price', $bus->price)" required />

                        </x-form>
                    </div>

                </x-card>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

</x-layouts.app>
