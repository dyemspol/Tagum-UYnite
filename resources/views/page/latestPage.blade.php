@extends('layout.app')

@section('title', 'Latest Post')

@section('content')
<!-- RESOLVED STORIES -->
<div class="flex justify-center mb-6">
    <div class="w-[85%] max-w-[45em] lg:w-[41%] xl:w-[50%]">
        <!-- SCROLL CONTAINER (SCROLLMENU CONCEPT) -->
        <div class="overflow-x-auto whitespace-nowrap scroll-stories smooth-scroll pb-4 hide-scrollbar">
            
            @php
                $stories = [
                    ['name' => 'Juan Dela Cruz', 'img' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=juan'],
                    ['name' => 'Maria Santos', 'img' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=maria'],
                    ['name' => 'Harold Perales', 'img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=harold'],
                    ['name' => 'Melody Maida', 'img' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=melody'],
                    ['name' => 'Rons Agoy', 'img' => 'https://images.unsplash.com/photo-1520333789090-1afc82db536a?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=rons'],
                    ['name' => 'Ana Reyes', 'img' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=ana'],
                    ['name' => 'Liza Soberano', 'img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=300&q=80', 'profile' => 'https://i.pravatar.cc/150?u=liza'],
                ];
            @endphp

            @foreach($stories as $story)
                <!-- STORY -->
                <div @click="$dispatch('open-story', { 
                        name: '{{ $story['name'] }}', 
                        profile: '{{ $story['profile'] }}',
                        images: ['{{ $story['img'] }}', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80']
                     })"
                     class="inline-block relative w-32 h-56 rounded-2xl overflow-hidden group cursor-pointer border border-[#2a2d3a] shadow-xl hover:shadow-blue-500/10 transition-all duration-300 mr-4 align-top whitespace-normal">
                    <img src="{{ $story['img'] }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-linear-to-b from-black/40 via-transparent to-black/80"></div>
                    <div class="absolute top-3 left-3">
                        <div class="w-10 h-10 p-0.5 rounded-full bg-blue-500 shadow-lg shadow-blue-500/20">
                            <img src="{{ $story['profile'] }}"
                                class="w-full h-full rounded-full object-cover border-2 border-[#12151e]">
                        </div>
                    </div>
                    <div class="absolute bottom-3 left-3 right-3">
                        <p class="text-[10px] text-blue-400 font-bold uppercase tracking-widest mb-0.5 flex items-center gap-1">
                            <i class="fa-solid fa-check-circle"></i>Resolved
                        </p>
                        <p class="text-white text-xs font-bold leading-tight line-clamp-2">
                            {{ $story['name'] }}
                        </p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>

<div class="">
    <livewire:post-feed type="latest" />
</div>

@include('components.resolvedStoryModal')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const scrollContainer = document.querySelector(".scroll-stories");

    if(scrollContainer) {
        scrollContainer.addEventListener("wheel", (e) => {
            e.preventDefault(); // stop vertical scroll
            scrollContainer.scrollBy({
                left: e.deltaY,   // move horizontally based on wheel
                behavior: "smooth" // smooth animation
            });
        });
    }
  });
</script>
@endsection
