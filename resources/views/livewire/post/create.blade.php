<div> {{-- Ini adalah satu elemen root paling luar --}}
    <div class="card">
        <div class="card-body">
            <form> {{-- Atau <form wire:submit.prevent="store"> jika Anda ingin kembali ke cara itu --}}
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Masukkan Title">
                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KONTEN</label>
                    <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="4"
                        placeholder="Masukkan Konten"></textarea>
                    @error('content')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Untuk tes saat ini, kita pakai wire:click --}}
                <button type="button" wire:click="store" class="btn btn-primary">SIMPAN</button>
                {{-- Jika ingin kembali ke wire:submit, tombolnya jadi: --}}
                {{-- <button type="submit" class="btn btn-primary">SIMPAN</button> --}}
            </form>
        </div>
    </div>
</div>
