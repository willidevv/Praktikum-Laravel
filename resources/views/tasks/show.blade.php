@extends('layouts.main')

@section('content')
    <h1>Detail Tugas</h1>
    
    <h3>{{ $task->title }}</h3>
    <p><strong>Deskripsi:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Tanggal Jatuh Tempo:</strong> {{ $task->due_date }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
