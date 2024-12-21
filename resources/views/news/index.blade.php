<!DOCTYPE html>
<html>
<head>
    <title>CRUD Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-start">
                    <h2>Daftar Berita</h2>
                </div>
                <div class="float-end">
                    <a class="btn btn-success" href="{{ route('news.create') }}">Tambah Berita</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th width="280px">Aksi</th>
            </tr>
            @foreach ($news as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <form action="{{ route('news.destroy',$item->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('news.edit',$item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $news->links() !!}
    </div>
</body>
</html>