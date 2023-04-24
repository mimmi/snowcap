<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Itinerary;
use App\Models\Package;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Auth;

class AdministratorController extends Controller
{
    public function dashboard(Request $request) {
        $stats = [
            'users' => User::all()->count(),
            'bookings' => Booking::all()->count(),
            'packages' => Package::all()->count()
        ];

        return Inertia::render('Administrator/Dashboard', [
            'stats' => $stats
        ]);
    }

    public function users(Request $request) {
        $users = User::all();

        return Inertia::render('Administrator/Users', [
            'users' => $users
        ]);
    }

    public function promote(Request $request) {
        $request->validate([
            'id' => ['required', 'exists:users,id']
        ]);

        $user = User::find($request->get('id'));
        $user->administrator = true;
        $user->save();

        return redirect()->back()->with('success', 'User promoted to Administrator');
    }

    public function demote(Request $request) {
        $request->validate([
            'id' => ['required', 'exists:users,id', Rule::notIn(Auth::user()->id)]
        ]);

        $user = User::find($request->get('id'));
        $user->administrator = false;
        $user->save();

        return redirect()->back()->with('success', 'User removed from Administrators');
    }

    public function packages(Request $request) {
        $packages = Package::all();

        return Inertia::render('Administrator/Packages', [
            'packages' => $packages
        ]);
    }

    public function packageCreate(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required'],
                'days' => ['required', 'numeric'],
                'expiry' => ['required', 'date', 'after:today']
            ]);

            $package = Package::create($request->only([
                'name',
                'days',
                'expiry'
            ]));

            session()->flash('success', 'Package has been saved successfully.');
            return redirect()->route('admin.package.details', ['id' => $package->id]);
        }
        return Inertia::render('Administrator/PackageCreate');
    }

    public function packageDetails(Request $request, int $id) {
        $package = Package::with(['itinerary','photos'])->findOrFail($id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => ['required'],
                'days' => ['required', 'numeric'],
                'expiry' => ['required', 'date', 'after:today']
            ]);

            $package->update($validated);

            session()->flash('success', 'Package has been updated successfully.');
            return redirect()->route('admin.package.details', ['id' => $package->id]);
        }

        return Inertia::render('Administrator/PackageDetails', [
            'package' => $package
        ]);
    }

    public function photos(Request $request, int $id) {
        $package = Package::with(['photos'])->findOrFail($id);

        return Inertia::render('Administrator/Photos', [
            'package' => $package
        ]);
    }

    public function addPhoto(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'exists:packages,id'],
            'caption' => ['required'],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uploadedFile = $request->file('photo');
        $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
        $path = $uploadedFile->storeAs('public/photo', $fileName);
        $publicPath = '/storage/photo/' . $fileName;

        $photo = Photo::create([
            'caption' => $validated['caption'],
            'file' => $publicPath,
            'package_id' => $validated['id']
        ]);

        session()->flash('success', 'Photo added to package.');
        return redirect()->route('admin.package.details', ['id' => $validated['id']]);
    }

    public function removePhoto(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'exists:photos,id']
        ]);

        Photo::find($request->get('id'))->delete();
        return redirect()->back()->with('success', 'Photo deleted');
    }

    public function itinerary(Request $request, int $id) {
        $package = Package::with(['itinerary'])->findOrFail($id);

        return Inertia::render('Administrator/Itinerary', [
            'package' => $package
        ]);
    }

    public function addItineraryItem(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'exists:packages,id'],
            'name' => ['required'],
            'type' => ['required', 'in:travel,hotel,activity']
        ]);

        $itineraryItem = Itinerary::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'package_id' => $validated['id']
        ]);

        session()->flash('success', 'Item added to package.');
        return redirect()->route('admin.package.itinerary', ['id' => $validated['id']]);
    }

    public function removeItineraryItem(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'exists:itineraries,id']
        ]);

        Itinerary::find($validated['id'])->delete();
        return redirect()->back()->with('success', 'Item deleted');
    }

    public function bookings(Request $request) {
        $bookings = Booking::with(['user', 'package'])->get();

        return Inertia::render('Administrator/Bookings', [
            'bookings' => $bookings
        ]);
    }
}
