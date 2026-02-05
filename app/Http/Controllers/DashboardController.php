<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Range for the trend chart (adjust to 14 if needed).
        $rangeDays = 30;
        $endDate = now()->startOfDay();
        $startDate = $endDate->copy()->subDays($rangeDays - 1);

        $driversCount = Person::drivers()->count();
        $ownersCount = Person::owners()->count();
        $vehiclesCount = Vehicle::count();

        $vehiclesByTypeRaw = Vehicle::query()
            ->select('vehicle_type', DB::raw('count(*) as total'))
            ->groupBy('vehicle_type')
            ->pluck('total', 'vehicle_type');

        $vehiclesByType = [
            Vehicle::TYPE_PRIVATE => (int) ($vehiclesByTypeRaw[Vehicle::TYPE_PRIVATE] ?? 0),
            Vehicle::TYPE_PUBLIC => (int) ($vehiclesByTypeRaw[Vehicle::TYPE_PUBLIC] ?? 0),
        ];

        $vehiclesPerDay = Vehicle::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate->copy()->endOfDay()])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'date')
            ->all();

        $trendLabels = [];
        $trendData = [];
        $cursor = $startDate->copy();

        for ($i = 0; $i < $rangeDays; $i++) {
            $dateKey = $cursor->format('Y-m-d');
            $trendLabels[] = $cursor->format('d/m');
            $trendData[] = (int) ($vehiclesPerDay[$dateKey] ?? 0);
            $cursor->addDay();
        }

        $topBrands = Vehicle::query()
            ->select('brand', DB::raw('count(*) as total'))
            ->groupBy('brand')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $topBrandLabels = $topBrands
            ->pluck('brand')
            ->map(fn ($brand) => $brand ?: 'Sin marca')
            ->values()
            ->all();

        $topBrandData = $topBrands
            ->pluck('total')
            ->map(fn ($total) => (int) $total)
            ->values()
            ->all();

        return view('dashboard', [
            'last_updated' => now()->format('d/m/Y H:i'),
            'range_days' => $rangeDays,
            'drivers_count' => $driversCount,
            'owners_count' => $ownersCount,
            'vehicles_count' => $vehiclesCount,
            'vehicles_by_type' => [
                'particular' => $vehiclesByType[Vehicle::TYPE_PRIVATE],
                'publico' => $vehiclesByType[Vehicle::TYPE_PUBLIC],
            ],
            'series_line' => [
                'labels' => $trendLabels,
                'data' => $trendData,
            ],
            'top_brands' => [
                'labels' => $topBrandLabels,
                'data' => $topBrandData,
            ],
            'has_vehicles_trend' => array_sum($trendData) > 0,
            'has_vehicles_by_type' => array_sum($vehiclesByType) > 0,
            'has_top_brands' => array_sum($topBrandData) > 0,
        ]);
    }
}
