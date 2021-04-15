<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;

    /**
     * ProfileController constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }


    public function index()
    {
        $permissions = $this->repository->paginate();
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(StoreUpdatePermissionRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    public function show($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(StoreUpdatePermissionRequest $request, $id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permission->update($request->all());
        return redirect()->route('profiles.index');

    }

    public function destroy($id)
    {
        if (!$permission = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permission->delete();
        return redirect()->route('profiles.index');
    }


    public function search(Request $request)
    {
        $filters = $request->only('filter');


        $permissions = $this->repository->where(function ($query) use ($request) {
            if ($request->filter) {
                $query->where('name', $request->filter)->orWhere('description', 'LIKE', "%{$request->filter}%");
            }

        })->paginate();


        return view('admin.pages.permissions.index', compact('permissions', 'filters'));
    }
}
