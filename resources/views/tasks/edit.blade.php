@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Task</button>
        <a href="{{ route('dashboard') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection