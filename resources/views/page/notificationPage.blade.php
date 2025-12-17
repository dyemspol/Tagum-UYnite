@extends('layout.app')

@section('title', 'Notifications')

@section('content')
    <div class="flex justify-center px-5 sm:px-10">
        <div class="w-full max-w-[650px] text-white space-y-5">
            <h1 class="text-2xl font-semibold">Notifications</h1>

            <div class="bg-[#0f1f2f] border border-[#1e3246] rounded-lg p-4 space-y-3">
                @forelse($notifications as $notif)
                    <div class="flex items-start gap-3 p-3 rounded-md hover:bg-[#234156] transition-colors duration-150">
                        <div class="w-10 h-10 shrink-0">
                            <img class="w-full h-full rounded-full object-cover"
                                src="{{ $notif->user->profile_photo ? $notif->user->profile_photo : asset('img/noprofile.jpg') }}"
                                alt="User">
                        </div>
                        <div class="flex-1">
                            <p class="text-xs sm:text-sm">
                                <span class="font-semibold">{{ $notif->user->username }}</span>
                                @if($notif->type === 'comment')
                                    commented on your post:
                                    <span class="text-[#9fb1c5] italic">
                                        "{{ Str::limit($notif->content, 50) }}"
                                    </span>
                                @else
                                    liked your post
                                @endif
                            </p>
                            <p class="text-[10px] text-[#9fb1c5] mt-1">
                                {{ $notif->created_at->diffForHumans() }}
                                @if(isset($notif->report))
                                    · {{ $notif->report->title }}
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 text-sm py-10">
                        No notifications yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection


