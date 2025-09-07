<?php

use App\Models\Memo;
use function Livewire\Volt\{state};

state([
    'memos' => fn() => auth()->user()->memos()->latest()->get(),
]);

?>

<div>
    <div class="space-y-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">メモ一覧</h2>
                    <div class="space-y-4">
                        @foreach ($memos as $memo)
                            <div class="border p-4 rounded-lg hover:bg-gray-50">
                                <a href="{{ route('memos.show', $memo) }}" class="block">
                                    <h3 class="text-lg font-semibold">{{ $memo->title }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
