@props(['paymentMethods', 'cashbox'])

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Forma de Pagamento *</label>
        <select name="payment_method_id" class="input-focus w-full px-4 py-3 border border-gray-300 rounded-lg bg-white">
           @foreach($paymentMethods as $method)
                <option value="{{ $method->id }}" {{ $method->id == old('payment_method_id') ? 'selected' : '' }}>
                    {{ $method->name }}
                </option>
           @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Caixa *</label>
        <select name="cashbox_id" class="input-focus w-full px-4 py-3 border border-gray-300 rounded-lg bg-white">
            <option value="">Selecione...</option>
            @foreach($cashbox as $box)
                <option value="{{ $box->id }}" {{ $box->id == old('cashbox_id') ? 'selected' : '' }}>
                    {{ $box->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
