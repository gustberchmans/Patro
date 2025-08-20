<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $artikel->titel }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
        @if($artikel->afbeelding)
            <img src="{{ asset('storage/' . $artikel->afbeelding) }}" alt="Afbeelding" class="w-full h-64 object-cover rounded mb-4">
        @endif

        <p class="text-sm text-gray-500 mb-2">Gepubliceerd op {{ $artikel->publicatiedatum->format('d-m-Y') }}</p>

        <div class="text-gray-700 dark:text-gray-300">
            {!! nl2br(e($artikel->content)) !!}
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Comments</h3>

            {{-- List comments --}}
            @foreach($artikel->comments as $comment)
                <div class="border-b border-gray-300 mb-2 pb-2">
                    <p class="text-sm text-gray-600">
                        <strong>{{ $comment->user->username ?? $comment->user->name }}</strong> 
                        <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    </p>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach

            {{-- Form only if logged in --}}
            @auth
                <form action="{{ route('comments.store', $artikel) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="comment" rows="3" class="w-full border rounded p-2" placeholder="Laat een reactie achter..." required></textarea>
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Verstuur</button>
                </form>
            @else
                <p class="text-sm text-gray-500">Log in om een reactie te plaatsen.</p>
            @endauth
        </div>
    </div>
</x-app-layout>
