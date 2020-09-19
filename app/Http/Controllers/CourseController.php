<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();

        $categories = Category::all();

        return view('admin.courses.create', compact('course', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        Course::create($request->except('confirm_password'));
        return redirect()->route('courses.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $video_link = $course->video_link;

        if(Str::contains($course->video_link, ['https://www.youtube.com/watch?v='])){
            $youtube_video_id = Str::between($course->video, 'watch?v=', '&');
            $video_link = 'https://www.youtube.com/embed/' . $youtube_video_id;
        }

        $categories = Category::all();
        return view('admin.courses.show', compact('course','categories' ,'video_link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        //Storage::delete('/public/img/' . $course->image_link);
        //$course->update($this->makeImage($request));

        return redirect()->route('courses.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', true);
    }

    /**
     * Matricular-se no curso
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function enroll(Course $course)
    {
        
        return redirect()->route('courses.enroll')->with('success', true);
    }
}
