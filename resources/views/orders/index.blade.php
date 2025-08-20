<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Bestellingen') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        @foreach($orders as $order)
            <div class="border-b py-4">
                <p><strong>Product:</strong> {{ $order->product }}</p>
                <p><strong>Maat:</strong> {{ $order->size }}</p>
                <p><strong>Kleur:</strong> {{ $order->color }}</p>
                <p><strong>Naam:</strong> {{ $order->custom_name ?? '-' }}</p>
                <p><strong>Aantal:</strong> {{ $order->quantity }}</p>
                <p><strong>Prijs:</strong> €{{ $order->price }}</p>
                <p class="text-gray-500 text-sm">Besteld op: {{ $order->created_at->format('d-m-Y H:i') }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
