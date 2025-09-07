<?php

use function Livewire\Volt\{state, mount, action};
use App\Models\Memo;

state(['memo' => null]);

$delete = action(function () {
    $this->memo->delete();
    return redirect()->route('memos.index')->with('success', 'メモを削除しました。');
});

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

                <div class="prose max-w-none mb-6">
                    {!! nl2br(e($memo->body)) !!}
                </div>

                <div class="flex justify-between items-center mt-8">
                    <a href="{{ route('memos.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        戻る
                    </a>
                    <div class="space-x-4">
                        <a href="{{ route('memos.edit', $memo) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            編集
                        </a>
                        <button wire:click="delete" wire:confirm="本当にこのメモを削除しますか？"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            削除
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
