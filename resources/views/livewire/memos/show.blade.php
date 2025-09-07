<?php

use function Livewire\Volt\{state, mount};
use App\Models\Memo;

state(['memo' => null]);

mount(function (Memo $memo) {
    $this->memo = $memo;
});

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold mb-2">{{ $memo->title }}</h1>
                    <div class="text-sm text-gray-500">
                        作成日時: {{ $memo->created_at->format('Y年m月d日 H:i') }}
                        @if ($memo->updated_at->ne($memo->created_at))
                            <span class="ml-4">
                                更新日時: {{ $memo->updated_at->format('Y年m月d日 H:i') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="prose max-w-none">
                    {!! nl2br(e($memo->body)) !!}
                </div>


            </div>
        </div>
    </div>
</div>
