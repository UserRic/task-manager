@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Task Manager</h1>

    {{-- Success message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Create Task Form --}}
    <form method="POST" action="{{ route('tasks.store') }}" class="mb-6 bg-white p-4 rounded shadow">
        @csrf
        <div class="mb-3">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-3">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Task</button>
    </form>

    {{-- Task List --}}
    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2">Title</th>
                <th class="text-left px-4 py-2">Description</th>
                <th class="text-left px-4 py-2">Status</th>
                <th class="text-left px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $task->title }}</td>
                <td class="px-4 py-2">{{ $task->description }}</td>
                <td class="px-4 py-2">{{ $task->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-4 py-4 text-gray-500">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection