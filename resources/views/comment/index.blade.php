<x-layout title="Comments">
    @forelse ($comments as $comment)
        <div class="mb-4 p-4 border rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-2">Comment by {{ $comment->user_id }}</h2>
            <p class="text-gray-700">{{ $comment->content }}</p> 
            <p class="text-sm text-gray-500 mt-2">On Post : <a href="/blog/{{$comment->post->id}}">{{ $comment->post->title }}</a></p>
        </div>
    @empty
        <p>No comments available.</p>
    @endforelse
</x-layout>