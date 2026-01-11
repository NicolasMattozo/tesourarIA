<x-layouts.app title="Novo Usuario">

    <x-navbar />

    <x-page-container class="md:ml-64">
        <div class="flex-1">

            <x-page-header title="Novo Usuario" subtitle="Crie um novo usuario no sistema." />

            <x-content-wrapper>

                <x-card>

                    <x-card-header>
                        <h2 class="text-xl font-bold text-gray-800">
                            Registrar Novo Usuario
                        </h2>
                    </x-card-header>

                    <div class="p-6">

                        <x-form method="POST" action="{{ route('users.store') }}" name="Usuario">

                            <x-input.input label="Nome do Usuario" name="name" type="text"
                                placeholder="Digite o nome do usuario" required />

                            <div>
                                <label class="block mb-1 text-sm font-semibold text-gray-700" for="church_section_id">
                                    Setor do Usuario
                                </label>
                                <select name="church_section_id"
                                    class="input-focus w-full px-3 py-2 border border-gray-300 rounded-lg bg-white"
                                    required>
                                    <option value="">Selecione o setor do usuario</option>
                                    @foreach ($churchSections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div x-data="rolesSelect()" class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Papéis do Usuário
                                </label>

                                <template x-for="(role, index) in roles" :key="index">
                                    <div class="flex items-center gap-3">
                                        <select x-model="roles[index]" name="roles[]" required
                                            class="input-focus w-full px-3 py-2 border border-gray-300 rounded-lg bg-white">
                                            <option value="">Selecione o papel do usuário</option>

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <button type="button" @click="remove(index)" x-show="roles.length > 1"
                                            class="text-red-600 text-sm font-medium">
                                            Remover
                                        </button>
                                    </div>
                                </template>

                                <button type="button" @click="add()" class="text-blue-600 text-sm font-medium">
                                    + Adicionar outro papel
                                </button>
                            </div>

                        </x-form>

                    </div>

                </x-card>

            </x-content-wrapper>
        </div>

        <x-footer />
    </x-page-container>

    <script>
        function rolesSelect() {
            return {
                roles: [''],

                add() {
                    this.roles.push('')
                },

                remove(index) {
                    this.roles.splice(index, 1)
                }
            }
        }
    </script>


</x-layouts.app>
