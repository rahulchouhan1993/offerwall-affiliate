<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ChartController extends Controller
{
    public function chartData()
    {
        // Example data (can be fetched from a database or calculated dynamically)
        $labels = ['January', 'February', 'March', 'April', 'May'];
        $lineData = [10, 20, 15, 30, 25];
        $barData = [5, 15, 10, 25, 20];

        return response()->json([
            'labels' => $labels,
            'lineData' => $lineData,
            'barData' => $barData,
        ]);
    }
}

