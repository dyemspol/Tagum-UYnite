<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Community')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#122333] min-h-screen" x-data>

    {{-- Navbar --}}
    <livewire:verify-user />
    @include('components.navbar')
    @include('components.postCardModal')
    <livewire:edit-profile :user="$user" />
    @if (!Auth::check())
        <livewire:login-form />
    @endif
    <livewire:comment-modal />

        
    <livewire:create-post />
    <livewire:notif-modal />
    <div class="pt-[140px]">

        {{-- PAGE CONTENT --}}
        <div class="flex justify-center px-5 sm:px-10">
            <div class="text-white w-full max-w-[650px]" x-data="{ activeTab: 'posts' }">


                {{-- profile name and picture section --}}
                <div class="flex items-center gap-5 mb-7">
                    <div class="h-32 w-32 flex-shrink-0">
                        <img class="w-full h-full rounded-full object-cover border-2 border-[#1e3246]"
                            src="{{ $user->profile_photo ? asset($user->profile_photo) : asset('img/noprofile.jpg') }}" alt="Profile Picture">
                    </div>
                    <div class="">
                        <p class="text-white text-3xl">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <div class="flex gap-2 items-center mt-1">
                            <p class="text-white text-sm opacity-60">{{ $user->reports->count() }} Total Post</p>
                            <button @click="$dispatch('open-edit-profile')"
                                class="px-3 py-1 border border-white text-white text-xs rounded hover:opacity-80 transition">
                                Edit
                            </button>
                           <div>
                            @if($user->is_verified)
                                <span class="inline-flex items-center gap-1 text-green-500 text-xs" title="Verified">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                    </svg>
                                    Verified
                                </span>
                            @elseif($verificationStatus)
                                <span class="text-yellow-500 text-xs">Pending</span>
                            @else
                                <button onclick="document.getElementById('verifyUserAccountModal').style.display='flex'"
                                    class="px-3 py-1 border border-white text-white text-xs rounded hover:opacity-80 transition">
                                    Verify Now
                                </button>
                            @endif




                           </div>
                        </div>
                    </div>
                </div>


                <div class="flex gap-12 my-3">
                    <p class="cursor-pointer pb-1 transition-all duration-200" @click="activeTab = 'posts'"
                        :class="activeTab === 'posts' ? 'text-[#31A871] border-b-2 border-[#31A871] opacity-100' :
                            'text-white opacity-60 hover:opacity-100'">
                        Posts
                    </p>
                    <p class="cursor-pointer pb-1 transition-all duration-200" @click="activeTab = 'track'"
                        :class="activeTab === 'track' ? 'text-[#31A871] border-b-2 border-[#31A871] opacity-100' :
                            'text-white opacity-60 hover:opacity-100'">
                        Track issue
                    </p>
                </div>
                <hr class="mb-7 opacity-60 z-10 ">
                <div id="postsSection" x-show="activeTab === 'posts'" class=" space-y-3  mx-auto w-full">
                    @forelse($user->reports as $post)
                        <livewire:post-card :post="$post" :key="$post->id" />
                    @empty
                        <div class="text-white text-center opacity-50 py-10"> You can't post if you are not verified..</div>
                    @endforelse
                </div>



                <div id="trackIssueSection" x-show="activeTab === 'track'" class="flex flex-col justify-center"
                    style="display: none;">
                    @forelse($user->reports as $post)
                        <div class="bg-[#0f1f2f] border border-[#1e3246] px-3 py-3 rounded-lg w-full max-w-[50em]">
                            <div class="flex items-center justify-between gap-3 mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full rounded-full object-cover"
                                            src="{{ $user->profile_photo ? $user->profile_photo : asset('img/noprofile.jpg') }}" alt="profile">
                                    </div>
                                    <div class="leading-tight">
                                        <p class="text-white text-sm">{{ $user->first_name }} {{ $user->last_name }}</p>
                                        <p class="text-xs text-[#9fb1c5]">
                                            {{ $post->created_at->format('F j, Y') }} <span
                                                class="mx-1">•</span>
                                            {{ $post->title }}</p>
                                    </div>
                                    
                                </div>
                                <span
                                    class="text-sm {{ $post->report_status == 'resolved' ? 'bg-lime-500' : 'bg-amber-400' }} text-[#122333] px-3 py-1 rounded-2xl">
                                    {{ ucfirst(str_replace('_', ' ', $post->report_status)) }}
                                </span>
                            </div>
                            <p class="text-white text-base">{{ $post->content }}</p>
                        </div>
                    @empty
                        <div class="text-white text-center opacity-50 py-10">No posts yet.</div>
                    @endforelse
                </div>

            </div>


        </div>

    </div>


    
    @vite('resources/js/notifModalToggle.js')
    @vite('resources/js/postPreview.js')
    @vite('resources/js/autocompleteLocation.js')
    @stack('scripts')
        <script>
        // Global store to toggle the shared comment modal from any component
        document.addEventListener('alpine:init', () => {
            Alpine.store('commentModal', {
                open: false,
                show() {
                    this.open = true;
                },
                hide() {
                    this.open = false;
                }
            });

            Alpine.store('notificationModal', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });
        });
    </script>
</body>



</html>
