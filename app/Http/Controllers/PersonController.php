<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\PersonRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\PersonResources;
use App\Models\Person;
use Inertia\Inertia;

class PersonController extends Controller
{
    public function index()
    {
        return Inertia::render('Person/Index', [
            'title' => "Users",
            'users' => PersonResources::collection(
                Person::orderByDesc('created_at')->paginate(5)
            )
        ]);
    }

    public function create()
    {
        return Inertia::render('Person/Create', [
            'title' => "Users",
        ]);
    }

    public function store(PersonRequest $request)
    {
        Person::create($request->validated());
        return redirect()->route('main.person');
    }

    public function show(Person $person)
    {
        return Inertia::render('Person/Show', [
            'person' => $person
        ]);
    }

    public function edit(Person $person)
    {
        return Inertia::render('Person/Edit', [
            'person' => $person
        ]);
    }

    public function update(Person $person, UpdateRequest $request)
    {
        $person->update($request->validated());
        return redirect()->route('main.person');
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->back();
    }
}
