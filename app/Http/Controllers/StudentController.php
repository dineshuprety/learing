<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Mail\StudentStore;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{

    // public function __invoke()
    // {
    //     dd(route('create'));
    //     $classes = Level::all()->map(fn($class) => [
    //         'id' => $class->id,
    //         'image' => url($class->id)

    //     ]);

    //     dd($classes);
    // }

    public function create()
    {
        // get all classes
        $classes = Level::select('id', 'name')->get();
        // return blade
        return view('index', [
            'classes' => $classes
        ]);
    }

    public function store(StudentRequest $request)
    {
        // dd($request->all());
        //validation
        $request->validated();
        // image upload
        $imagePath = $request->file('image')->storeAs(
            'student',
            Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension(),
            'public'
        );
        //store data
        Student::create([
            'level_id' => $request->class,
            'name' => $request->name,
            'image' => $imagePath
        ]);

        // mail tigger
        Mail::to('dineshuprety500@gmail.com')->send(new StudentStore($request->name));

        return redirect(route('create'))->with(['success' => 'data created']);
    }

    public function edit(Student $student)
    {
        return view('edit', [
            'student' => $student,
            'classes' => Level::all()
        ]);
    }

    public function update(Student $student, Request $request)
    {
       $student->update([
        'name' => $request->name,
       ]);

       return redirect(route('create'));
    }

    
}
