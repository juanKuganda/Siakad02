<x-default-layout title="Subject" section_title="Subject">
    @if (session('success'))
    <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @can('store-student')
    <div class="flex">
        <a href="{{ route('subject.create') }}"
        class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
        <i class="ph ph-plus block text-green-500"></i>
        <div>Add Subject</div>
    </a>
</div>
@endcan

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead> 
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Subject Code</th>
                    <th class="py-3 px-6 text-center">Description</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($subject as $item)
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration  }}</td>
                    <td class="py-3 px-6 text-left">{{ $item->name }}</td>
                    <td class="py-3 px-6 text-center">{{ $item->subject_code }}</td>
                    <td class="py-3 px-6 text-center">{{ $item->description }}</td>
                    <td class="py-3 px-6 flex justify-center gap-1">
                        <a href="{{ route('subject.show', 1) }}"
                           class="bg-blue-50 border border-blue-500 p-2 inline-block">
                            <i class="ph ph-eye block text-blue-500"></i>
                        </a>
                        @can('store-student')
                        <a href="{{ route('subject.edit', 1) }}"
                           class="bg-yellow-50 border border-yellow-500 p-2 inline-block">
                            <i class="ph ph-note-pencil block text-yellow-500"></i>
                        </a>
                       <form onsubmit="return confirm('Are you sure you want to delete this subject?')"
                        action="{{ route('subject.destroy', $item->id_subject) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="bg-red-50 border cursor-pointer border-red-500 p-2">
                                <i class="ph ph-trash-simple block text-red-500"></i>
                            </button>
                     
                        </form>
                        @endcan
                    </td>
                </tr>

                @empty
                     <td class="py-4 text-center text-zinc-500" colspan="7">
                        No Subject found
                    </td>
                @endforelse

            </tbody>
        </table>
    </div>
</x-default-layout>
