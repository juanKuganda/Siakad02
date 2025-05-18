<x-default-layout title="KRS" section_title="Kartu Rencana Studi">
    @if (session('success'))
    <div class="bg-green-50 border border-green-500 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <div class="mb-2">
        <form action="{{ route('krs.index') }}" method="GET" class="flex gap-2">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}"
                   placeholder="Search by Student ID or Name" 
                   class="px-3 py-2 border border-zinc-300 bg-slate-50">
            <button type="submit" 
                    class="bg-blue-50 border border-blue-500 text-blue-500 px-4 py-2">
                Search
            </button>
        </form>
    </div>

    @if($student)
    <div class="bg-white shadow mb-2 border border-zinc-300">
        <div class="p-4 border-b border-zinc-200">
            <h3 class="font-semibold">Student Information</h3>
        </div>
        <div class="p-4 grid grid-cols-2 gap-2">
            <div>
                <p class="text-zinc-500">Name</p>
                <p class="font-medium">{{ $student->name }}</p>
            </div>
            <div>
                <p class="text-zinc-500">Student ID</p>
                <p class="font-medium">{{ $student->student_id_number }}</p>
            </div>
            <div>
                <p class="text-zinc-500">Major</p>
                <p class="font-medium">{{ $student->majors->name }}</p>
            </div>
            <div>
                <p class="text-zinc-500">Status</p>
                <p class="font-medium">{{ $student->status }}</p>
            </div>
        </div>
        <div class="p-4 border-t border-zinc-200">
            <a href="{{ route('krs.create', ['student_id' => $student->id]) }}"
               class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 inline-flex items-center gap-2">
                <i class="ph ph-plus block text-green-500"></i>
                <span>Add Subject</span>
            </a>
        </div>
    </div>
    @endif

    <div class="w-full  overflow-hidden">
        <table class="w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Subject</th>
                    <th class="py-3 px-6 text-center">Semester</th>
                    <th class="py-3 px-6 text-center">Academic Year</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($krs as $item)
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-3 text-left">{{ $loop->iteration }}</td>
                    <td class="py-3 px-3 text-left">{{ $item->subject->name }}</td>
                    <td class="py-3 px-3 text-center">{{ $item->semester }}</td>
                    <td class="py-3 px-3 text-center">{{ $item->academic_year }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 text-center text-zinc-500">
                        @if($student)
                            No KRS data found for this student
                        @else
                            Search for a student to view their KRS
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>