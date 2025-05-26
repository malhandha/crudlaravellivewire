<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Opsional

    // ... (method destroy Anda) ...
    public function destroy($id)
    {
        // dd('Method destroy() dipanggil dengan ID: ' . $id);
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            session()->flash('message', 'Post berhasil dihapus.');
        } else {
            session()->flash('error', 'Gagal menghapus post, data tidak ditemukan.');
        }
    }

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(5)
        ]); // <-- HAPUS ->layout('layouts.app') DARI SINI
    }
}
