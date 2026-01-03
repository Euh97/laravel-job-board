<x-layout title="{{$post->title}}">
    <article class="prose lg:prose-xl mx-auto my-8">
        <h1>{{ $post->title }}</h1>
        <p class="text-gray-500">By {{ $post->author }} on {{ $post->created_at->format('F j, Y') }}</p>
        <div>
            {!! nl2br(e($post->body)) !!}
        </div>
        <h2 class="mt-8">Comments</h2>
         @foreach ($post->comments as $comment)
                <div class="mt-4 p-3 bg-gray-100 rounded">
                    <p class="text-sm text-gray-600"><strong>{{ $comment->user_id }}:</strong> {{ $comment->content }}</p>
                </div>
                
        @endforeach
    </article>

</x-layout>