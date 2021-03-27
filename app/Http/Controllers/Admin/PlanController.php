<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    private $repository;

    /**
     * PlanController constructor.
     * @param Plan $plan
     */
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {

        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlanRequest $request)
    {
        $data = $request->all();

        if (isset($request->name)) {
            $data['url'] = Str::kebab($request->name);
        }

        $this->repository->create($data);
        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', compact('plan'));
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        $plan->delete();
        return redirect()->route('plans.index');
    }

    public function search(StoreUpdatePlanRequest $request)
    {
        if (isset($request->filter)) {
            $filters = $request->except('_token');
        } else {
            $filters = '';
        }
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', ['plans' => $plans, 'filters' => $filters]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlanRequest $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }
}
