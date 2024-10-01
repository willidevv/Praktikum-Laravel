@extends('layouts.main')

@section('content')
    <h1>Buat Tugas Baru</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="" disabled selected>--Pilih opsi--</option>
                <option value="pending">Di tunda</option>
                <option value="completed">Selesai</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Tugas</button>
    </form>
@endsection
