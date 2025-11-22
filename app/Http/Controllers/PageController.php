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
                'type' => 'buy',
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
                'type' => 'buy',
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
                'type' => 'rent',
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
                'type' => 'rent',
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
                'type' => 'rent',
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
                'type' => 'rent',
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
                'type' => 'buy',
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
                'type' => 'buy',
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
    public function aboutUs()
    {
        return view('pages.about-us');
    }
    public function properties(Request $request)
    {
        // Your static listings (as Collection for easier filtering)
        $listings = collect([
            (object) [
                'id' => 1,
                'name' => 'Maplewood Family House',
                'location' => 'Quezon City, Metro Manila',
                'price' => 7200000,
                'price_formatted' => '7,200,000',
                'image' => 'images/listing1.png',
                'bedroom' => 4,
                'sqft' => 250,
                'category' => 'House & Lot',
                'type' => 'buy',
                'created_at' => '2025-01-02 10:15:23',
            ],
            (object) [
                'id' => 2,
                'name' => 'The Horizon Suites',
                'location' => 'Ortigas Center, Pasig City',
                'price' => 5600000,
                'price_formatted' => '5,600,000',
                'image' => 'images/listing2.png',
                'bedroom' => 3,
                'sqft' => 980,
                'category' => 'Apartment',
                'type' => 'buy',
                'created_at' => '2025-01-05 14:42:10',
            ],
            (object) [
                'id' => 3,
                'name' => 'Seaview Grand Villa',
                'location' => 'Lapu-Lapu City, Cebu',
                'price' => 15600000,
                'price_formatted' => '15,600,000',
                'image' => 'images/listing3.png',
                'bedroom' => 5,
                'sqft' => 1400,
                'category' => 'Vacation Villa',
                'type' => 'rent',
                'created_at' => '2025-01-08 09:20:54',
            ],
            (object) [
                'id' => 4,
                'name' => 'MetroWork Commercial Hub',
                'location' => 'Makati Central Business District',
                'price' => 22300000,
                'price_formatted' => '22,300,000',
                'image' => 'images/listing4.png',
                'bedroom' => 0,
                'sqft' => 2100,
                'category' => 'Commercial Spaces',
                'type' => 'rent',
                'created_at' => '2025-01-10 11:05:33',
            ],
            (object) [
                'id' => 5,
                'name' => 'Sunvale Green Estates',
                'location' => 'Dasmariñas City, Cavite',
                'price' => 3900000,
                'price_formatted' => '3,900,000',
                'image' => 'images/listing5.png',
                'bedroom' => 0,
                'sqft' => 300,
                'category' => 'Vacant Lot',
                'type' => 'rent',
                'created_at' => '2025-01-12 08:18:47',
            ],
            (object) [
                'id' => 6,
                'name' => 'Blue Ridge Condo Loft',
                'location' => 'BGC, Taguig City',
                'price' => 9800000,
                'price_formatted' => '9,800,000',
                'image' => 'images/listing6.png',
                'bedroom' => 2,
                'sqft' => 620,
                'category' => 'Commercial Spaces',
                'type' => 'rent',
                'created_at' => '2025-01-15 16:30:12',
            ],
            (object) [
                'id' => 7,
                'name' => 'Palmcrest Suburban Home',
                'location' => 'Mandaue City, Cebu',
                'price' => 6400000,
                'price_formatted' => '6,400,000',
                'image' => 'images/listing7.png',
                'bedroom' => 3,
                'sqft' => 350,
                'category' => 'House & Lot',
                'type' => 'buy',
                'created_at' => '2025-01-18 13:50:05',
            ],
            (object) [
                'id' => 8,
                'name' => 'Skylight Executive Studio',
                'location' => 'Davao City Center',
                'price' => 2800000,
                'price_formatted' => '2,800,000',
                'image' => 'images/listing8.png',
                'bedroom' => 1,
                'sqft' => 280,
                'category' => 'Vacation Villa',
                'type' => 'buy',
                'created_at' => '2025-01-20 17:12:39',
            ],
        ]);

        // === FILTERING ===
        $query = $listings;

        // Search
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $query = $query->filter(
                fn($item) =>
                str_contains(strtolower($item->name), $search) ||
                    str_contains(strtolower($item->location), $search)
            );
        }

        // Listing Type (Buy/Rent) — you can add a 'type' field later if needed
        // For now, we skip or you can simulate it

        // Category checkboxes
        if ($request->has('category') && is_array($request->category) && count($request->category) > 0) {
            $query = $query->whereIn('category', $request->category);
        }

        // Price range
        if ($request->filled('price_min') && $request->price_min > 0) {
            $query = $query->where('price', '>=', (int)$request->price_min);
        }
        if ($request->filled('price_max') && $request->price_max > 0) {
            $query = $query->where('price', '<=', (int)$request->price_max);
        }

        // Floor area (sqft)
        if ($request->filled('floor_min') && $request->floor_min > 0) {
            $query = $query->where('sqft', '>=', (int)$request->floor_min);
        }
        if ($request->filled('floor_max') && $request->floor_max > 0) {
            $query = $query->where('sqft', '<=', (int)$request->floor_max);
        }

        // Location
        if ($request->filled('location')) {
            $location = strtolower($request->location);
            $query = $query->filter(fn($item) => str_contains(strtolower($item->location), $location));
        }

        // Only filter if user actually selected Buy or Rent
        if ($request->filled('type') && in_array($request->type, ['buy', 'rent'])) {
            $query = $query->where('type', $request->type);
        }

        // === SORTING ===
        $sort = $request->get('sort', 'latest');

        $query = match ($sort) {
            'oldest'       => $query->sortBy('created_at'),
            'price_asc'    => $query->sortBy('price'),
            'price_desc'   => $query->sortByDesc('price'),
            default        => $query->sortByDesc('created_at'), // newest
        };

        // Convert back to collection with values() to re-index
        $listings = $query->values();
        $listingCount = $listings->count();

        return view('pages.properties', compact('listings', 'listingCount'));
    }
    public function property($id)
    {
        // For demonstration, we will use a static listing based on ID
        $listings = collect([
            (object) [
                'id' => 1,
                'name' => 'Maplewood Family House',
                'location' => 'Quezon City, Metro Manila',
                'price' => 7200000,
                'price_formatted' => '7,200,000',
                'image' => 'images/listing1.png',
                'bedroom' => 4,
                'sqft' => 250,
                'carpark' => 2,
                'category' => 'House & Lot',
                'type' => 'For Sale',
                'amenities' => [
                    'Swimming Pool',
                    'Gym',
                    'Playground',
                    '24/7 Security',
                    'Clubhouse',
                ],
                'overview' => 'This beautiful Maplewood Family House offers spacious living with 4 bedrooms and modern amenities. Located in the heart of Quezon City, it provides easy access to schools, shopping centers, and parks. The house features a large living area, a fully equipped kitchen, and a cozy backyard perfect for family gatherings.',
                'gallery_images' => [
                    'images/listing1.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                    'images/gallery-img3.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-02 10:15:23',
            ],
            (object) [
                'id' => 2,
                'name' => 'The Horizon Suites',
                'location' => 'Ortigas Center, Pasig City',
                'price' => 5600000,
                'price_formatted' => '5,600,000',
                'image' => 'images/listing2.png',
                'bedroom' => 3,
                'carpark' => 1,
                'sqft' => 980,
                'category' => 'Apartment',
                'type' => 'For Sale',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'The Horizon Suites offers modern apartment living in the heart of Ortigas Center, Pasig City. With 3 bedrooms and 980 sqft of space, it is perfect for families or professionals seeking comfort and convenience. Amenities include a fitness center, swimming pool, and 24/7 security.',
                'gallery_images' => [
                    'images/listing2.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-05 14:42:10',
            ],
            (object) [
                'id' => 3,
                'name' => 'Seaview Grand Villa',
                'location' => 'Lapu-Lapu City, Cebu',
                'price' => 15600000,
                'price_formatted' => '15,600,000',
                'image' => 'images/listing3.png',
                'bedroom' => 5,
                'sqft' => 1400,
                'carpark' => 3,
                'category' => 'Vacation Villa',
                'type' => 'For Rent',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'Experience luxury living at the Seaview Grand Villa in Lapu-Lapu City, Cebu. This stunning villa features 5 bedrooms, a spacious living area, and breathtaking sea views. Perfect for vacation getaways, it offers modern amenities including a private pool, fully equipped kitchen, and outdoor entertainment area.',
                'gallery_images' => [
                    'images/listing3.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-08 09:20:54',
            ],
            (object) [
                'id' => 4,
                'name' => 'MetroWork Commercial Hub',
                'location' => 'Makati Central Business District',
                'price' => 22300000,
                'price_formatted' => '22,300,000',
                'image' => 'images/listing4.png',
                'bedroom' => 0,
                'carpark' => 3,
                'sqft' => 2100,
                'category' => 'Commercial Spaces',
                'type' => 'For Rent',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'MetroWork Commercial Hub offers prime office spaces in the bustling Makati Central Business District. With 2100 sqft of flexible workspace, it is ideal for businesses seeking a prestigious address. The hub features modern facilities, ample parking, and easy access to public transportation.',
                'gallery_images' => [
                    'images/listing4.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-10 11:05:33',
            ],
            (object) [
                'id' => 5,
                'name' => 'Sunvale Green Estates',
                'location' => 'Dasmariñas City, Cavite',
                'price' => 3900000,
                'price_formatted' => '3,900,000',
                'image' => 'images/listing5.png',
                'bedroom' => 0,
                'carpark' => '',
                'sqft' => 300,
                'category' => 'Vacant Lot',
                'type' => 'For Rent',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'MetroWork Commercial Hub offers prime office spaces in the bustling Makati Central Business District. With 2100 sqft of flexible workspace, it is ideal for businesses seeking a prestigious address. The hub features modern facilities, ample parking, and easy access to public transportation.',
                'gallery_images' => [
                    'images/listing5.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-12 08:18:47',
            ],
            (object) [
                'id' => 6,
                'name' => 'Blue Ridge Condo Loft',
                'location' => 'BGC, Taguig City',
                'price' => 9800000,
                'price_formatted' => '9,800,000',
                'image' => 'images/listing6.png',
                'bedroom' => 2,
                'carpark' => 1,
                'sqft' => 620,
                'category' => 'Commercial Spaces',
                'type' => 'For Rent',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'MetroWork Commercial Hub offers prime office spaces in the bustling Makati Central Business District. With 2100 sqft of flexible workspace, it is ideal for businesses seeking a prestigious address. The hub features modern facilities, ample parking, and easy access to public transportation.',
                'gallery_images' => [
                    'images/listing6.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-15 16:30:12',
            ],
            (object) [
                'id' => 7,
                'name' => 'Palmcrest Suburban Home',
                'location' => 'Mandaue City, Cebu',
                'price' => 6400000,
                'price_formatted' => '6,400,000',
                'image' => 'images/listing7.png',
                'bedroom' => 3,
                'carpark' => 2,
                'sqft' => 350,
                'category' => 'House & Lot',
                'type' => 'For Sale',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'MetroWork Commercial Hub offers prime office spaces in the bustling Makati Central Business District. With 2100 sqft of flexible workspace, it is ideal for businesses seeking a prestigious address. The hub features modern facilities, ample parking, and easy access to public transportation.',
                'gallery_images' => [
                    'images/listing7.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-18 13:50:05',
            ],
            (object) [
                'id' => 8,
                'name' => 'Skylight Executive Studio',
                'location' => 'Davao City Center',
                'price' => 2800000,
                'price_formatted' => '2,800,000',
                'image' => 'images/listing8.png',
                'bedroom' => 1,
                'carpark' => 1,
                'sqft' => 280,
                'category' => 'Vacation Villa',
                'type' => 'For Sale',
                'amenities' => [
                    'Fitness Center',
                    'Swimming Pool',
                    '24/7 Security',
                    'Function Room',
                    'Children\'s Play Area',
                ],
                'overview' => 'MetroWork Commercial Hub offers prime office spaces in the bustling Makati Central Business District. With 2100 sqft of flexible workspace, it is ideal for businesses seeking a prestigious address. The hub features modern facilities, ample parking, and easy access to public transportation.',
                'gallery_images' => [
                    'images/listing8.png',
                    'images/gallery-img1.png',
                    'images/gallery-img2.png',
                    'images/gallery-img3.png',
                ],
                'created_at' => '2025-01-20 17:12:39',
            ],
        ]);

        $property = $listings->where('id', $id)->first();

        if (!$property) {
            abort(404);
        }

        return view('pages.property-singlepage', compact('property', 'listings'));
    }
}
