<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Build;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class PcBuildController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pcBuilds = Build::where('user_id', $user->id)->get(); 

        
        return view('dashboard')->with('pcBuilds', $pcBuilds);

    }

    public function create()
    {
        return view('pc_builds.create');
    }

    public function getModelForComponentType($type)
    {
        $typeModelMap = [
            'cpu' => \App\Models\Cpu::class,
            'cooler' => \App\Models\Cooler::class,
            'gpu' => \App\Models\Gpu::class,
            'motherboard' => \App\Models\Motherboard::class,
            'case' => \App\Models\PcCase::class,
            'powersupply' => \App\Models\PowerSupply::class,
            'ram' => \App\Models\Ram::class,
            'storage' => \App\Models\Storage::class,
        ];

        $type = strtolower($type);

        if (array_key_exists($type, $typeModelMap)) {
            return app($typeModelMap[$type]);
        }

        return null;
    }

    public function selectComponent($type)
    {
        $model = $this->getModelForComponentType($type);
        if (!$model) {
            return redirect()->back()->withErrors(['msg' => 'Invalid component type selected.']);
        }

        $components = $model::all();

        return view('pc_builds.select_component', [
            'type' => $type,
            'components' => $components,
        ]);
    }

    protected function calculateTotalPrice($build)
{
    return 0; // Placeholder
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $build = new Build();
    $build->user_id = Auth::id();
    $build->name = $validatedData['name'];

    $build->cpu_id = session('selected_components.cpu_id');
    $build->cooler_id = session('selected_components.cooler_id');
    $build->gpu_id = session('selected_components.gpu_id');
    $build->motherboard_id = session('selected_components.motherboard_id');
    $build->case_id = session('selected_components.case_id');
    $build->powersupply_id = session('selected_components.powersupply_id');
    $build->ram_id = session('selected_components.ram_id');
    $build->storage_id = session('selected_components.storage_id');

    $build->total_price = $this->calculateTotalPrice([
        $build->cpu_id,
        $build->cooler_id,
        $build->gpu_id,
        $build->motherboard_id,
        $build->case_id,
        $build->powersupply_id,
        $build->ram_id,
        $build->storage_id,
    ]);

    $build->save();

    session()->forget('selected_components');

    return redirect()->route('pcbuilds.index')->with('success', 'New PC Build created successfully!');
}

public function addComponentToSession(Request $request, $type, $componentId)
{
    session(['selected_components.' . $type => $componentId]);

    return redirect()->route('pcbuilds.create');
}


}
