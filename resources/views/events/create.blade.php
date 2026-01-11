<x-layouts.app title="Novo Evento">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header 
                title="Novo Evento" 
                subtitle="Crie um novo evento" 
            />

            <x-content-wrapper>

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Registrar Novo Evento
                        </h2>
                    </x-card-header>

                    <div class="p-6">

                        <x-form 
                            method="POST" 
                            action="{{ route('events.store') }}" 
                            x-data="{ type: 'income' }"
                            name="Evento"
                        >

                            <x-input.input
                                label="Nome do Evento"
                                name="name"
                                type="text"
                                placeholder="Digite o nome do evento"
                                required
                            />

                            <x-input.input
                                label="Tipo de Evento"
                                name="type"
                                type="text"
                                placeholder="Digite o tipo de evento (ex: Conferência, Workshop)"
                                required
                            />

                            <x-input.input
                                label="Data de Início"
                                name="start_date"
                                type="date"
                                required
                            />

                            <x-input.input
                                label="Data de Fim"
                                name="end_date"
                                type="date"
                            />

                        </x-form>

                    </div>

                </x-card>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

</x-layouts.app>
