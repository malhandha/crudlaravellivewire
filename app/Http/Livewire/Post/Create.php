<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $content;

    public function store()
    {
        
        // dd('Method store() dipanggil', $this->title, $this->content); // COBA 1: Cek apakah method dipanggil & properti terisi

        $this->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        // dd('Validasi berhasil. Data:', ['title' => $this->title, 'content' => $this->content]); // COBA 2: Cek data setelah validasi

        try {
            $post = Post::create([
                'title'   => $this->title,
                'content' => $this->content,
            ]);

            // dd('Setelah Post::create()', $post); // COBA 3: Cek hasil dari Post::create()

            if ($post) {
                session()->flash('message', 'Data Berhasil Disimpan.');
                return redirect()->route('post.index');
                // dd('Data BERHASIL disimpan. ID Post: ' . $post->id); // Bisa juga cek di sini jika redirect bermasalah
            } else {
                dd('Data GAGAL disimpan, Post::create() tidak menghasilkan objek Post.'); // COBA 4: Jika $post bernilai null/false
            }
        } catch (\Exception $e) {
            // Tangkap semua jenis error/exception yang mungkin terjadi saat create
            dd('Terjadi Exception saat create:', $e->getMessage(), $e); // COBA 5: Cek jika ada error saat create
        }
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
