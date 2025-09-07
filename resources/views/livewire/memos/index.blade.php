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
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">メモ一覧</h2>
                        <a href="{{ route('memos.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            新規作成
                        </a>
                    </div>
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
