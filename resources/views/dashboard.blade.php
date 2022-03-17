<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-euro-one leading-tight">
            {{ __('Controle de Vendas - Eureciclo') }}
        </h2>
    </x-slot>

    @include('sales.index')
</x-app-layout>
