<?php

use function Livewire\Volt\{state, rules, mount};
use App\Models\Memo;

state(['memo' => null, 'title' => '', 'body' => '']);

rules(['title' => 'required|max:50', 'body' => 'required|max:2000']);

mount(function ($memo) {
    $this->memo = Memo::findOrFail($memo);
    $this->title = $this->memo->title;
    $this->body = $this->memo->body;
});

$update = function () {
    $validated = $this->validate();

    $this->memo->update([
        'title' => $validated['title'],
        'body' => $validated['body'],
    ]);

    session()->flash('status', 'メモを更新しました。');

    $this->redirect(route('memos.show', $this->memo));
};

?>

<div>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form wire:submit="update">
            <div>
                <x-input-label for="title" value="タイトル" />
                <x-text-input id="title" wire:model="title" class="block w-full mt-1" type="text" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="body" value="本文" />
                <x-textarea id="body" wire:model="body" class="block w-full mt-1" required />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="mt-4 space-x-2">
                <x-primary-button>更新</x-primary-button>
                <x-secondary-button type="button" wire:click="$navigate('{{ route('memos.show', $memo) }}')">
                    キャンセル
                </x-secondary-button>
            </div>
        </form>
    </div>
</div>
