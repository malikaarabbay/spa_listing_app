<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        $listings = Listing::mostRecent()
            ->filter($filters)
            ->withoutSold()
            ->paginate(10)
            ->withQueryString();

        return inertia(
            'Listing/Index', [
            'filters' => $filters,
            'listings' => $listings
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        $listing->images->transform(function ($image) {
            $image->src = asset('storage/' . $image->filename);
            return $image;
        });

        $offer = !Auth::user() ?
            null : $listing->offers()->byMe()->first();


        return inertia(
            'Listing/Show', [
            'listing' => $listing,
            'offerMade' => $offer
        ]);
    }
}
