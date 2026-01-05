<x-layout :title="$title">
    <div class="mb-4 p-4 border rounded-lg shadow-sm">
        <h2 class="text-2xl font-semibold mb-2">Comment by {{ $comment->user_id }}</h2>
        <p class="text-gray-700">{{ $comment->content }}</p> 
        @if($comment->post)
            <h3>Related Post:</h3>
            <p class="text-gray-700">{{ $comment->post->title }}</p>
            <a href="/blog/{{$comment->post->id}}" class="text-blue-500 underline">View Post</a>
        @endif
    </div>
</x-layout>