<x-layouts.app title="Transações">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header 
                title="Transações" 
                subtitle="Registre entradas, saídas e transferências entre caixas" 
            />

            <x-content-wrapper>

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Lista de Transações
                        </h2>

                        <div class="flex items-center gap-4">
                            <span class="text-sm text-amber-700 whitespace-nowrap">
                                {{ $transactions->count() }} registro{{ $transactions->count() !== 1 ? 's' : '' }}
                            </span>

                            <x-action-button href="{{ route('transactions.create') }}">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Nova Transação
                            </x-action-button>
                        </div>
                    </x-card-header>

                    <div class="p-6">
                        <x-table>

                            <thead class="bg-linear-to-r from-amber-50 to-amber-50/50">
                                <tr>
                                    <x-table-th>Data</x-table-th>
                                    <x-table-th>Tipo</x-table-th>
                                    <x-table-th>Valor</x-table-th>
                                    <x-table-th>Caixa</x-table-th>
                                    <x-table-th>Método</x-table-th>
                                    <x-table-th>Usuário</x-table-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-amber-50 bg-white">
                                @forelse ($transactions as $transaction)
                                    <tr class="hover:bg-amber-50/70 transition group">

                                        <x-table-td class="whitespace-nowrap font-medium text-amber-900">
                                            {{ $transaction->created_at->format('d/m/Y H:i') }}
                                        </x-table-td>

                                        <x-table-td>
                                            @if ($transaction->type === 'income')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                                                           bg-emerald-100 text-emerald-800 ring-1 ring-emerald-200/70">
                                                    Entrada
                                                </span>
                                            @elseif ($transaction->type === 'expense')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                                                           bg-rose-100 text-rose-800 ring-1 ring-rose-200/70">
                                                    Saída
                                                </span>
                                            @endif
                                        </x-table-td>

                                        <x-table-td 
                                            class="whitespace-nowrap font-semibold 
                                            {{ $transaction->type === 'income' ? 'text-emerald-700' : 'text-rose-700' }}">
                                            R$ {{ number_format($transaction->amount, 2, ',', '.') }}
                                        </x-table-td>

                                        <x-table-td class="whitespace-nowrap text-amber-700">
                                            {{ $transaction->cashbox->name }}
                                        </x-table-td>

                                        <x-table-td class="whitespace-nowrap text-amber-700">
                                            {{ $transaction->paymentMethod->name }}
                                        </x-table-td>

                                        <x-table-td class="whitespace-nowrap text-amber-800">
                                            {{ $transaction->user->name }}
                                        </x-table-td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-6 text-center text-sm text-gray-500">
                                            Nenhuma transação registrada.
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
