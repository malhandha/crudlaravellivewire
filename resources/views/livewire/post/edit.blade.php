<div>
    <div class="card">
        <div class="card-header">
            <strong>Edit Post (Komponen Livewire)</strong>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="postId">
                <div class="form-group">
                    <label for="title">TITLE</label>
                    <input type="text" id="title" wire:model="title"
                        class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Title">
                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">KONTEN</label>
                    <textarea id="content" wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="4"
                        placeholder="Masukkan Konten"></textarea>
                    @error('content')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">UPDATE POST</button>
            </form>
        </div>
    </div>
</div>
