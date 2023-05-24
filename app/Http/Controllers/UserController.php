<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResources;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Person/Index', [
            'title' => 'Person',
            'users' => UserResources::collection(
                User::all()
            )->resolve()
        ]);
    }

    public function show(User $user)
    {
        return $user;
    }

//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        return Inertia::render('Person/Create', [
//            'title' => 'Person'
//        ]);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(UserRequest $request)
//    {
//        Person::create($request->validated());
//        return redirect()->route('person.index');
//    }
//
//    /**
//     * Display the specified resource.
//     */
//
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Person $person)
//    {
//        return Inertia::render('Person/Edit', [
//            '$person' => $person
//        ]);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(UpdateRequest $request, Person $person)
//    {
//        $person->update($request->validated());
//        return redirect()->route('person.index');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Person $person)
//    {
//        $person->delete();
//        return redirect()->route('person.index');
//    }
}
