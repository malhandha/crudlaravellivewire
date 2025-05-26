<div>
    @if (session()->has('message'))
</div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


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
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 100) }}</td> 
                <td class="text-center">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button wire:click="destroy({{ $post->id }})"
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
{{ $posts->links() }}
</div>
