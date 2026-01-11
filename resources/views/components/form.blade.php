@props(['attributes' => [], 'method' => null, 'action', 'name' => null])

<form class="p-6 space-y-8" method="{{ $method ?? 'POST' }}" action="{{ $action }}" {{ $attributes }}>
    @csrf
    {{ $slot }}


    <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
        <!-- Cancelar precisa voltar uma página-->
        <a href="{{ url()->previous() }}"
           class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
            Cancelar
        </a>
        <button type="submit"
            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
            Registrar {{ $name ?? 'Item' }}
        </button>
    </div>
</form>
