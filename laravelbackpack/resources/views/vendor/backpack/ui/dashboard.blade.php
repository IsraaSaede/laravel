@extends(backpack_view('blank'))

@section('content')

<div class="row mt-4">

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary mb-4">
            <div class="card-body text-center py-4">
                <div style="font-size: 3rem;">👨‍🏫</div>
                <h2 class="mt-2 mb-0">{{ \App\Models\Teacher::count() }}</h2>
                <p class="mb-0 mt-1">Teachers</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ backpack_url('teacher') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-success mb-4">
            <div class="card-body text-center py-4">
                <div style="font-size: 3rem;">🏫</div>
                <h2 class="mt-2 mb-0">{{ \App\Models\Classroom::count() }}</h2>
                <p class="mb-0 mt-1">Classrooms</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ backpack_url('classroom') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-warning mb-4">
            <div class="card-body text-center py-4">
                <div style="font-size: 3rem;">🎒</div>
                <h2 class="mt-2 mb-0">{{ \App\Models\Student::count() }}</h2>
                <p class="mb-0 mt-1">Students</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ backpack_url('student') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger mb-4">
            <div class="card-body text-center py-4">
                <div style="font-size: 3rem;">📚</div>
                <h2 class="mt-2 mb-0">{{ \App\Models\Subject::count() }}</h2>
                <p class="mb-0 mt-1">Subjects</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ backpack_url('subject') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header"><strong>Recent Students</strong></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Classroom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Student::with('classroom')->latest()->take(5)->get() as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->classroom->name ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header"><strong>Classrooms & Teachers</strong></div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Classroom</th>
                            <th>Teacher</th>
                            <th>Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Classroom::with(['teacher','students'])->take(5)->get() as $classroom)
                        <tr>
                            <td>{{ $classroom->name }}</td>
                            <td>{{ $classroom->teacher->name ?? '-' }}</td>
                            <td>{{ $classroom->students->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
