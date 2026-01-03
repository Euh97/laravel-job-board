<x-layout title="Blog Posts">
   

    @forelse ($posts as $post)
        <div class="mb-4 p-4 border rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700">{{ $post->body }}</p>
        </div>
    @empty
        <p>No blog posts available.</p>
    @endforelse

    {{ $posts->links() }}

</x-layout>