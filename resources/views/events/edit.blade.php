<x-layouts.app title="Editar Evento">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header title="Editar Evento" subtitle="Atualize as informações do evento" />

            <x-content-wrapper>

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Editar Evento
                        </h2>
                    </x-card-header>

                    <div class="p-6">
                        <x-form method="POST" action="{{ route('events.update', $event) }}" name="Evento">
                            @method('PUT')

                            <x-input.input label="Nome do Evento" name="name" type="text"
                                placeholder="Digite o nome do evento" :value="old('name', $event->name)" required />

                            <x-input.input label="Tipo de Evento" name="type" type="text"
                                placeholder="Digite o tipo de evento" :value="old('type', $event->type)" required />

                            <x-input.input label="Data de Início" name="start_date" type="date" :value="old('start_date', $event->start_date)"
                                required />

                            <x-input.input label="Data de Fim" name="end_date" type="date" :value="old('end_date', $event->end_date)" />

                        </x-form>
                    </div>

                </x-card>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

</x-layouts.app>
