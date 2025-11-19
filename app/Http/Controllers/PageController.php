<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $listings = [
            (object) [
                'name' => 'Maplewood Family House',
                'location' => 'Quezon City, Metro Manila',
                'price' => ' 7,200,000',
                'image' => 'images/listing1.png',
                'bedroom' => 4,
                'sqft' => 250,
                'category' => 'House & Lot',
                'category_cover' => 'images/category1.png',
                'created_at' => '2025-01-02 10:15:23',
            ],
            (object) [
                'name' => 'The Horizon Suites',
                'location' => 'Ortigas Center, Pasig City',
                'price' => ' 5,600,000',
                'image' => 'images/listing2.png',
                'bedroom' => 3,
                'sqft' => 980,
                'category' => 'Apartment',
                'category_cover' => 'images/category2.png',
                'created_at' => '2025-01-05 14:42:10',
            ],
            (object) [
                'name' => 'Seaview Grand Villa',
                'location' => 'Lapu-Lapu City, Cebu',
                'price' => ' 15,600,000',
                'image' => 'images/listing3.png',
                'bedroom' => 5,
                'sqft' => 1400,
                'category' => 'Vacation Villa',
                'category_cover' => 'images/category3.png',
                'created_at' => '2025-01-08 09:20:54',
            ],
            (object) [
                'name' => 'MetroWork Commercial Hub',
                'location' => 'Makati Central Business District',
                'price' => ' 22,300,000',
                'image' => 'images/listing4.png',
                'bedroom' => 0,
                'sqft' => 2100,
                'category' => 'Commercial Spaces',
                'category_cover' => 'images/category4.png',
                'created_at' => '2025-01-10 11:05:33',
            ],
            (object) [
                'name' => 'Sunvale Green Estates',
                'location' => 'Dasmariñas City, Cavite',
                'price' => ' 3,900,000',
                'image' => 'images/listing5.png',
                'bedroom' => 0,
                'sqft' => 300,
                'category' => 'Vacant Lot',
                'category_cover' => 'images/category5.png',
                'created_at' => '2025-01-12 08:18:47',
            ],
            (object) [
                'name' => 'Blue Ridge Condo Loft',
                'location' => 'BGC, Taguig City',
                'price' => ' 9,800,000',
                'image' => 'images/listing6.png',
                'bedroom' => 2,
                'sqft' => 620,
                'category' => 'Commercial Spaces',
                'category_cover' => 'images/category6.png',
                'created_at' => '2025-01-15 16:30:12',
            ],
            (object) [
                'name' => 'Palmcrest Suburban Home',
                'location' => 'Mandaue City, Cebu',
                'price' => ' 6,400,000',
                'image' => 'images/listing7.png',
                'bedroom' => 3,
                'sqft' => 350,
                'category' => 'House & Lot',
                'category_cover' => 'images/category7.png',
                'created_at' => '2025-01-18 13:50:05',
            ],
            (object) [
                'name' => 'Skylight Executive Studio',
                'location' => 'Davao City Center',
                'price' => ' 2,800,000',
                'image' => 'images/listing8.png',
                'bedroom' => 1,
                'sqft' => 280,
                'category' => 'Vacation Villa',
                'category_cover' => 'images/category8.png',
                'created_at' => '2025-01-20 17:12:39',
            ],
        ];


        $categories = array_map(fn($item) => $item->category, $listings);

        $categoryCounts = array_count_values($categories);

        $uniqueListings = collect($listings)
            ->unique('category')
            ->values();

        $listingCount = count($listings);

        $latestListing = collect($listings)
            ->sortByDesc('created_at')
            ->take(3)
            ->values();



        return view('pages.home', compact('uniqueListings', 'categoryCounts', 'listingCount', 'latestListing'));
    }
}
