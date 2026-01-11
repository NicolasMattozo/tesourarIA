<x-layouts.app title="Nova Transação">

    <x-navbar />
    <div class="flex flex-col min-h-screen md:ml-64">
        <div class="flex-1">
            <x-page-header title="Nova Transação" subtitle="Registre entradas, saídas e transferências entre caixas" />

            <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

                <!-- Mensagem de sucesso e de erro-->
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-red-800">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulário principal -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-xl font-bold text-gray-800">Registrar Nova Transação</h2>
                    </div>

                    <x-form method="POST" action="{{ route('transactions.store') }}" x-data="{ type: 'income' }" name="Transação">
                        <!-- Tipo de Transação" subtitle="Registre entradas, saídas e transferências entre caixas" /> -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de Movimentação *
                            </label>

                            <div class="grid grid-cols-2 gap-4">

                                <!-- Income -->
                                <label
                                    class="relative flex flex-col items-center p-4 border-2 rounded-xl cursor-pointer transition-colors bg-white hover:border-emerald-500"
                                    :class="type === 'income' ? 'border-emerald-500' : 'border-gray-300'">
                                    <input type="radio" name="type" value="income" x-model="type"
                                        class="absolute opacity-0">

                                    <span class="text-3xl mb-2">↑</span>
                                    <span class="font-medium"
                                        :class="type === 'income' ? 'text-emerald-600' : 'text-emerald-700'">
                                        Entrada
                                    </span>
                                    <span class="text-xs text-gray-500 mt-1">
                                        Dinheiro que entra
                                    </span>
                                </label>

                                <!-- Expense -->
                                <label
                                    class="relative flex flex-col items-center p-4 border-2 rounded-xl cursor-pointer transition-colors bg-white hover:border-red-500"
                                    :class="type === 'expense' ? 'border-red-500' : 'border-gray-300'">
                                    <input type="radio" name="type" value="expense" x-model="type"
                                        class="absolute opacity-0">

                                    <span class="text-3xl mb-2">↓</span>
                                    <span class="font-medium"
                                        :class="type === 'expense' ? 'text-red-600' : 'text-red-700'">
                                        Saída
                                    </span>
                                    <span class="text-xs text-gray-500 mt-1">
                                        Dinheiro que sai
                                    </span>
                                </label>

                            </div>
                        </div>


                        <x-input-value />

                        <x-input-method-payment :paymentMethods="$paymentMethods" :cashbox="$cashbox" />

                        <x-input-category-sector :financialSector="$financialSector" :events="$events" />

                        <!-- Comprovante -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Comprovante / Anexo</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label
                                            class="relative cursor-pointer rounded-md font-medium text-amber-600 hover:text-amber-500">
                                            <span>Selecionar arquivo</span>
                                            <input type="file" class="sr-only" accept="image/*,.pdf">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, PDF até 10MB</p>
                                </div>
                            </div>
                        </div>


                        <!-- Botões de ação -->
                      

                    </x-form>
                </div>

            </main>
        </div>

        <x-footer />
    </div>

</x-layouts.app>
