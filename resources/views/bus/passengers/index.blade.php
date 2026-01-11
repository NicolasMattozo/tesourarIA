<x-layouts.app title="Gerenciar Ônibus">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header title="Gerenciar Ônibus" subtitle="Alocação de passageiros" />

            <x-content-wrapper>

                <div x-data="{
                    candidates: @js($candidates),
                    passengers: @js($passengers->map(fn($p) => $p->user)),
                    capacity: {{ $bus->capacity }},
                    busId: {{ $bus->id }},
                    busPrice: {{ $bus->price }},
                    
                    canAddPassenger(candidate) {
                        return candidate.total_paid >= this.busPrice && 
                               !this.isPassenger(candidate.id) && 
                               this.passengers.length < this.capacity;
                    },
                    
                    isPassenger(userId) {
                        return this.passengers.some(p => p.id === userId);
                    },
                    
                    async addPassenger(candidate) {
                        try {
                            const formData = new FormData();
                            formData.append('user_id', candidate.id);
                            
                            const response = await fetch('{{ route('bus.passengers.store', $bus) }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });
                            
                            if (response.ok) {
                                this.passengers.push(candidate);
                                this.candidates = this.candidates.filter(c => c.id !== candidate.id);
                            } else {
                                const errorData = await response.json();
                                console.error('Erro do servidor:', errorData);
                                alert('Erro ao adicionar passageiro');
                            }
                        } catch (error) {
                            console.error('Erro:', error);
                            alert('Erro ao adicionar passageiro');
                        }
                    },
                    
                    async removePassenger(passenger) {
                        try {
                            const formData = new FormData();
                            formData.append('_method', 'DELETE');
                            
                            const response = await fetch(`/bus/${this.busId}/passengers/${passenger.id}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });
                            
                            if (response.ok) {
                                this.passengers = this.passengers.filter(p => p.id !== passenger.id);
                                this.candidates.push(passenger);
                            } else {
                                const errorData = await response.json();
                                console.error('Erro do servidor:', errorData);
                                alert('Erro ao remover passageiro');
                            }
                        } catch (error) {
                            console.error('Erro:', error);
                            alert('Erro ao remover passageiro');
                        }
                    }
                }">


                    {{-- ALERTAS --}}
                    @if (session('success'))
                        <x-alert type="success">
                            {{ session('success') }}
                        </x-alert>
                    @endif

                    {{-- 🔹 RESUMO DO ÔNIBUS --}}
                    <x-card class="mb-6">
                        <x-card-header>
                            <h2 class="text-lg font-bold text-gray-800">
                                Informações do Ônibus
                            </h2>
                        </x-card-header>

                        <div class="p-6 grid grid-cols-1 sm:grid-cols-4 gap-4">
                            <div>
                                <span class="text-sm text-gray-500">Evento</span>
                                <p class="font-medium">{{ $event->name }}</p>
                            </div>

                            <div>
                                <span class="text-sm text-gray-500">Capacidade</span>
                                <p class="font-medium" x-text="capacity"></p>
                            </div>

                            <div>
                                <span class="text-sm text-gray-500">Ocupadas</span>
                                <p class="font-medium" x-text="passengers.length"></p>
                            </div>

                            <div>
                                <span class="text-sm text-gray-500">Vagas Livres</span>
                                <p class="font-medium" x-text="capacity - passengers.length"></p>
                            </div>
                        </div>
                    </x-card>

                    {{-- 🔸 CANDIDATOS AO ÔNIBUS --}}
                    <x-card class="mb-6">
                        <x-card-header>
                            <h2 class="text-lg font-bold text-gray-800">
                                Usuários do Evento
                            </h2>
                        </x-card-header>

                        <div class="p-6">
                            <x-table>
                                <thead>
                                    <tr>
                                        <x-table-th>Usuário</x-table-th>
                                        <x-table-th>Total Pago</x-table-th>
                                        <x-table-th>Falta</x-table-th>
                                        <x-table-th>Status</x-table-th>
                                        <x-table-th class="text-center">Ação</x-table-th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template x-for="candidate in candidates" :key="candidate.id">
                                        <tr>
                                            <x-table-td>
                                                <span x-text="candidate.name"></span>
                                            </x-table-td>

                                            <x-table-td>
                                                <span x-text="'R$ ' + candidate.total_paid.toFixed(2).replace('.', ',')"></span>
                                            </x-table-td>

                                            <x-table-td>
                                                <span x-text="'R$ ' + Math.max(0, busPrice - candidate.total_paid).toFixed(2).replace('.', ',')"></span>
                                            </x-table-td>

                                            <x-table-td>
                                                <span x-show="candidate.total_paid >= busPrice" class="text-green-600 font-medium">Apto</span>
                                                <span x-show="candidate.total_paid < busPrice" class="text-amber-600 font-medium">Pendente</span>
                                            </x-table-td>

                                            <x-table-td class="text-center">
                                                <button 
                                                    x-show="canAddPassenger(candidate)"
                                                    @click="addPassenger(candidate)"
                                                    class="text-blue-600 hover:underline text-sm font-medium transition-all hover:scale-105">
                                                    Adicionar
                                                </button>
                                                <span x-show="!canAddPassenger(candidate)" class="text-gray-400 text-sm">—</span>
                                            </x-table-td>
                                        </tr>
                                    </template>
                                </tbody>
                            </x-table>
                        </div>
                    </x-card>

                    {{-- 🔹 PASSAGEIROS DO ÔNIBUS --}}
                    <x-card>
                        <x-card-header>
                            <h2 class="text-lg font-bold text-gray-800">
                                Passageiros do Ônibus
                            </h2>
                        </x-card-header>

                        <div class="p-6">
                            <x-table>
                                <thead>
                                    <tr>
                                        <x-table-th>Usuário</x-table-th>
                                        <x-table-th class="text-center">Ação</x-table-th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template x-for="passenger in passengers" :key="passenger.id">
                                        <tr class="animate-fade-in">
                                            <x-table-td>
                                                <span x-text="passenger.name"></span>
                                            </x-table-td>

                                            <x-table-td class="text-center">
                                                <button 
                                                    @click="removePassenger(passenger)"
                                                    class="text-red-600 hover:underline text-sm font-medium transition-all hover:scale-105">
                                                    Remover
                                                </button>
                                            </x-table-td>
                                        </tr>
                                    </template>
                                    
                                    <tr x-show="passengers.length === 0">
                                        <td colspan="2" class="text-center text-sm text-gray-500 py-4">
                                            Nenhum passageiro alocado.
                                        </td>
                                    </tr>
                                </tbody>
                            </x-table>
                        </div>
                    </x-card>

                </div>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
    </style>

</x-layouts.app>