<x-default-layout title="KRS" section_title="Add New KRS">
    <div class="grid grid-cols-3">
        <form action="{{ route('krs.store') }}" method="POST"
              class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow col-span-3 md:col-span-2">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="student_id">Student</label>
                <select name="student_id" id="student_id"
                        class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50"
                        {{ $selectedStudent ? 'disabled' : '' }}>
                    <option value="" disabled {{ !$selectedStudent ? 'selected' : '' }}>Select Student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id_student }}" 
                                {{ $selectedStudent && $selectedStudent->id_student == $student->id_student ? 'selected' : '' }}>
                            {{ $student->name }} ({{ $student->student_id_number }})
                        </option>
                    @endforeach
                </select>
                @if($selectedStudent)
                    <input type="hidden" name="student_id" value="{{ $selectedStudent->id }}">
                @endif
                @error('student_id')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id"
                        class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled selected>Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id_subject }}">
                            {{ $subject->name }} ({{ $subject->subject_code }})
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="semester">Semester</label>
                <select name="semester" id="semester"
                        class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled selected>Select Semester</option>
                    @foreach (range(1, 8) as $semester)
                        <option value="{{ $semester }}">{{ $semester }}</option>
                    @endforeach
                </select>
                @error('semester')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="academic_year">Academic Year</label>
                <input type="text" id="academic_year" name="academic_year"
                       class="px-3 py-2 border border-zinc-300 bg-slate-50"
                       placeholder="e.g., 2023/2024">
                @error('academic_year')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="self-end flex gap-2">
                <a href="{{ route('krs.index') }}"
                   class="bg-slate-50 border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Cancel</span>
                </a>
                <button type="submit"
                        class="bg-blue-50 border border-blue-500 text-blue-500 px-3 py-2 flex items-center gap-2 cursor-pointer">
                    <i class="ph ph-floppy-disk block text-blue-500"></i>
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
