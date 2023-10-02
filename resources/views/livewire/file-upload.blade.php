<div>
    {{-- Stop trying to control. --}}
    <div>
        <input type="file" wire:model="file">
    
        @if ($uploadProgress)
            <progress max="100" value="{{ $uploadProgress }}"></progress> {{ $uploadProgress }}%
        @endif
    </div>

    
</div>
