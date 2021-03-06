<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Phattarachai\LineNotify\Facade\Line;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->paginate(10);
        return view('tasks.index',[
           'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->detail = $request->input('detail');
        $task->due_date = $request->input('due_date');
        $task->user_id = Auth::user()->id;
//        $task->user_id = Auth::id();
//        $task->user_id = $request->user()->id;
        $task->save();

        Line::send("\n มีการเพิ่ม Tasks โดย {$task->user_id}\n
                    Title: {$task->title}\n
                    Detail: {$task->detail}\n
                    Due-Date: {$task->due_date}");

        $tagsWithComma = trim($request->input('tags'));
        $this->updateTagNames($task, $tagsWithComma);
        return redirect()->route('tasks.index');
    }

    private function updateTagNames($task, $tagsWithComma){
        if ($tagsWithComma) {
            $tag_ids = [];
            $tag_names = explode(",",$tagsWithComma);
            foreach ($tag_names as $name){
                $name = trim($name);
                if ($name){
                    $tag = Tag::firstOrCreate(['name'=>$name]);
                    array_push($tag_ids,$tag->id);
                }
            }
            $task->tags()->sync($tag_ids);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show',[
            'task'=>$task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',[
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->input('title');
        $task->detail = $request->input('detail');
        $task->due_date = $request->input('due_date');
        $task->save();

        $tagsWithComma = trim($request->input('tags'));
        $this->updateTagNames($task, $tagsWithComma);
        return redirect()->route('tasks.show',['task'=>$task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request  $request, Task $task)
    {
        if ($request->confirm === "Confirm"){
            $task->delete();
            return  redirect()->route('tasks.index');
        }
        return redirect()->back();
    }
}
