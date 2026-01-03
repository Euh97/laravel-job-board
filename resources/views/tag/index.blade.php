<x-layout :title="$title">
   

    @forelse ($tags as $tag)
        <div class="mb-4 p-4 border rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-2">{{ $tag->title }}</h2>
        </div>
    @empty
        <p>No tatgs available.</p>
    @endforelse

</x-layout>