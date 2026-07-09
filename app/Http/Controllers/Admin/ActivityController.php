<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderByDesc('event_date')->paginate(10);

        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.form', ['activity' => new Activity()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activities.form', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            if ($activity->image) {
                Storage::disk('public')->delete($activity->image);
            }
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->image) {
            Storage::disk('public')->delete($activity->image);
        }
        $activity->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'event_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
        unset($validated['image']);

        return $validated;
    }
}
