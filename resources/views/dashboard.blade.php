<x-default-layout title="Dashboard" section_title="Dashboard">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="px-6 py-4 bg-sky-50 border hover:border-l-4 border-sky-400 space-y-1.5 shadow duration-200">
            <div class="text-zinc-600 text-sm">Total Students</div>
            <div class="text-2xl font-bold">{{ $activeStudents }}</div>
        </div>

        <div class="px-6 py-4 bg-green-50 border hover:border-l-4 border-green-400 space-y-1.5 shadow duration-200">
            <div class="text-zinc-600 text-sm">Total Majors</div>
            <div class="text-2xl font-bold">{{ $totalMajors }}</div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 mt-4">
        <div class="col-span-3 sm:col-span-2 overflow-x-auto">
            <table class="min-w-full bg-white shadow">
                <thead>
                    <tr class="border-b border-zinc-200 text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Code</th>
                        <th class="py-3 px-6 text-left">Majors</th>
                        <th class="py-3 px-6 text-center">Total Students</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 text-sm font-light">
                    @foreach ($studentsByMajor as $data)    
                    <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                        <td class="py-3 px-6 text-left">{{ $data->majors->code }}</td>
                        <td class="py-3 px-6 text-left">{{ $data->majors->name}}</td>
                        <td class="py-3 px-6 text-center">{{ $data->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
