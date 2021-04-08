<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    protected $repository;

    /**
     * ProfileController constructor.
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }


    public function index()
    {
        $profiles = $this->repository->paginate();
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfileRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    public function update(StoreUpdateProfileRequest $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());
        return redirect()->route('profiles.index');

    }

    public function destroy($id)
    {
        //
    }
}
