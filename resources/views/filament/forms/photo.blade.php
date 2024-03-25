<div>
    <img src="{{ Storage::url($this->image) }}" class="w-full object-cover border rounded-xl h-40" alt="">
    <div class="mt-4">
        <x-input label="Attachment" type="file" wire:model="attachment" />
    </div>
</div>
