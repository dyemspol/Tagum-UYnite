<div class="">
    @foreach($posts as $post)
        {{-- Reusing your existing components based on type or just generic post card --}}
         @if($type === 'popular')
            <livewire:popular-post :post="$post" :key="$post->id"/>
         @else
            <livewire:latest-post :post="$post" :key="$post->id"/>
         @endif
    @endforeach

    @if($posts->isEmpty())
        <div class="text-white text-center py-10 opacity-50">
            No posts found.
        </div>
    @endif
</div>
