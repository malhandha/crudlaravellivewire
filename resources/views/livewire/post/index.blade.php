{{-- @extends('layouts.app')
@section('content') --}}
    <div> {{-- Ini adalah elemen root di dalam section Anda --}}
        {{-- Tempatkan Flash Message di sini --}}
        @if (session()->has('message'))
            {{-- <div class="alert alert-success"> --}}
                {{-- {{ session('message') }} --}}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- Akhir dari Flash Message --}}

        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">CONTENT</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                {{-- Menggunakan @forelse untuk menangani jika $posts kosong --}}
                @forelse($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 100) }}</td> {{-- Saya tambahkan Str::limit untuk membatasi panjang konten di index --}}
                    <td class="text-center">
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        <button
                            wire:click="destroy({{ $post->id }})"
                            onclick="return confirm('Anda yakin ingin menghapus post ini: \'{{ $post->title }}\'?') || event.stopImmediatePropagation()"
                            class="btn btn-sm btn-danger">
                            DELETE
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">
                        Belum ada post.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }} {{-- Pastikan WithPagination sudah di-use di komponen Index.php --}}
    </div>
{{-- @endsection --}}