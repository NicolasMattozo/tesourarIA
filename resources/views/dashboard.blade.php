<x-layouts.app title="Nova Transação">

    <x-navbar />

    <x-page-header title="Dashboard" subtitle="Visão geral da Mocidade - Atualizada em tempo real" />
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <!-- Cards principais -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                    <p class="text-sm font-medium text-emerald-600">Total Entradas</p>
                    <p class="text-3xl font-bold text-emerald-700 mt-2">R$ 12.500,00</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                    <p class="text-sm font-medium text-red-600">Total Saídas</p>
                    <p class="text-3xl font-bold text-red-700 mt-2">R$ 8.200,00</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                    <p class="text-sm font-medium text-amber-800">Saldo Consolidado</p>
                    <p class="text-3xl font-bold text-amber-900 mt-2">R$ 4.300,00</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                    <p class="text-sm font-medium text-blue-700">Saldo por Forma</p>
                    <div class="mt-3 space-y-1 text-sm">
                        <div class="flex justify-between">
                            <span>Dinheiro</span>
                            <span class="font-semibold">R$ 2.000,00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Pix</span>
                            <span class="font-semibold">R$ 2.300,00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caixas Ativos -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Caixas Ativos</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-amber-900">Dinheiro Físico</h3>
                            <span class="text-2xl font-bold text-amber-800">R$ 2.000,00</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">Movimentações recentes:</p>
                        <ul class="space-y-2 text-sm">
                            <li class="flex justify-between text-emerald-700"><span>Entrada - Oferta Jovens</span><span>+ R$
                                    500,00</span></li>
                            <li class="flex justify-between text-red-700"><span>Saída - Compra Material</span><span>- R$
                                    200,00</span></li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-blue-800">Pix</h3>
                            <span class="text-2xl font-bold text-blue-700">R$ 2.300,00</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">Movimentações recentes:</p>
                        <ul class="space-y-2 text-sm">
                            <li class="flex justify-between text-emerald-700"><span>Entrada - Doação Especial</span><span>+
                                    R$ 700,00</span></li>
                            <li class="flex justify-between text-red-700"><span>Saída - Retiro</span><span>- R$
                                    300,00</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Gráficos (placeholders mais elegantes) -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Visão Gráfica</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-72 flex items-center justify-center">
                        <div class="text-center text-gray-400">Gráfico: Entradas × Saídas (Mensal)</div>
                    </div>
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-72 flex items-center justify-center">
                        <div class="text-center text-gray-400">Gráfico: Gastos por Setor</div>
                    </div>
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-72 flex items-center justify-center">
                        <div class="text-center text-gray-400">Gráfico: Arrecadação por Evento</div>
                    </div>
                </div>
            </div>

            <!-- Transações recentes - versão mais clean -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-12">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Transações Recentes</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Valor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Forma</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Comprovante</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10/06/2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Oferta Culto Jovens</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-700">Entrada</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-700">R$ 500,00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Dinheiro</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-emerald-600">✔️</td>
                            </tr>
                            <!-- demais linhas... -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cards de eventos e controle de parcelas lado a lado -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-12">
                <!-- Evento Ativo -->
                <div class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-xl shadow-sm border border-amber-100 p-7">
                    <h3 class="text-xl font-bold text-amber-900 mb-5">Evento Ativo: Retiro 2024</h3>
                    <div class="space-y-3 text-amber-800">
                        <div class="flex justify-between">
                            <span>Total arrecadado:</span>
                            <span class="font-bold">R$ 3.000,00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Total gasto:</span>
                            <span class="font-bold">R$ 2.200,00</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t border-amber-200 font-bold text-lg">
                            <span>Saldo do evento:</span>
                            <span class="text-emerald-700">R$ 800,00</span>
                        </div>
                    </div>
                </div>

                <!-- Controle de Parcelas -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-50/70 rounded-xl shadow-sm border border-blue-100 p-7">
                    <h3 class="text-xl font-bold text-blue-900 mb-5">Controle de Parcelas - Retiro</h3>
                    <div class="space-y-3 text-blue-800">
                        <div class="flex justify-between">
                            <span>Total de parcelas:</span><span class="font-bold">30</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Parcelas pagas:</span><span class="font-bold">18</span>
                        </div>
                        <div class="flex justify-between text-red-700 font-medium">
                            <span>Parcelas pendentes:</span><span class="font-bold">12</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t border-blue-200">
                            <span>Valor restante:</span>
                            <span class="font-bold">R$ 1.200,00</span>
                        </div>
                    </div>
                </div>
            </div>

        </main>


    <x-footer />

</x-layouts.app>
