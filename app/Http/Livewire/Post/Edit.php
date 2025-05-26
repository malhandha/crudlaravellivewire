<?php

namespace App\Http\Livewire\Post;

use App\Models\Post; // Pastikan ini ada jika belum
use Livewire\Component;

class Edit extends Component
{
    public $postId;
    public $title;
    public $content;

    public function mount($id) // $id akan diterima dari :id="$postId"
    {
        // dd('Mounting Edit (Embedded) with ID: ' . $id); // Boleh diaktifkan untuk tes awal
        $post = Post::find($id);
        if ($post) {
            $this->postId  = $post->id;
            $this->title   = $post->title;
            $this->content = $post->content;
        } else {
            // Handle jika post tidak ditemukan, misalnya redirect atau abort
            // return redirect()->route('post.index')->with('error', 'Post tidak ditemukan');
        }
    }

    public function update()
    {
        // dd('Metode update() dari KOMPONEN EDIT (Embedded) dipanggil!', $this->postId, $this->title, $this->content); // <-- HAPUS ATAU KOMENTARI INI

        $this->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        if ($this->postId) {
            $post = Post::find($this->postId);

            if ($post) {
                $post->update([ // Pastikan $fillable di Model Post sudah benar
                    'title'   => $this->title,
                    'content' => $this->content,
                ]);
            }
        }

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit'); // Merujuk ke file di resources/views/livewire/post/edit.blade.php
    }
}
