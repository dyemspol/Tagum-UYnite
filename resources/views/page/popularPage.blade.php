@extends('layout.app')

@section('title', 'Popular Post')

@section('content')
<!-- RESOLVED STORIES -->
@auth
<!-- RESOLVED STORIES -->
<div class="flex justify-center mb-6">
    <div class="w-[85%] max-w-[45em] lg:w-[41%] xl:w-[50%]">
        <!-- SCROLL CONTAINER (SCROLLMENU CONCEPT) -->
        <div class="overflow-x-auto whitespace-nowrap scroll-stories smooth-scroll pb-4 hide-scrollbar">

            @foreach($reports as $story)
            <!-- STORY -->
            <div @click="Livewire.dispatch('open-modal', { id: {{ $story->id }} })"
                class="inline-block relative w-32 h-56 rounded-2xl overflow-hidden group cursor-pointer border border-[#2a2d3a] shadow-xl hover:shadow-blue-500/10 transition-all duration-300 mr-4 align-top whitespace-normal">
                <img src="{{ $story->postImages->first()->cdn_url }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/80"></div>
                <div class="absolute top-3 left-3">
                    <div class="w-10 h-10 p-0.5 rounded-full bg-green-500 shadow-lg shadow-blue-500/20">
                        <img src="{{ $story->user->profile_photo }}"
                            class="w-full h-full rounded-full object-cover border-2 border-[#12151e]">
                    </div>
                </div>
                <div class="absolute bottom-3 left-3 right-3">
                    <p class="text-[10px] text-blue-400 font-bold uppercase tracking-widest mb-0.5 flex items-center gap-1">
                        <i class="fa-solid fa-check-circle"></i>{{ $story->report_status }}
                    </p>
                    <p class="text-white text-xs font-bold leading-tight line-clamp-2">
                        {{ $story->user->first_name . ' ' . $story->user->last_name}}
                    </p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endauth

<div class="">
    <livewire:post-feed type="popular" />
</div>

<livewire:resolved-story-modal />
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollContainer = document.querySelector(".scroll-stories");

        if (scrollContainer) {
            scrollContainer.addEventListener("wheel", (e) => {
                e.preventDefault(); // stop vertical scroll
                scrollContainer.scrollBy({
                    left: e.deltaY, // move horizontally based on wheel
                    behavior: "smooth" // smooth animation
                });
            });
        }
    });
</script>
@endsection