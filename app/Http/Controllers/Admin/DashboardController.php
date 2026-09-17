<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use App\Models\Category;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ================= STATISTIK PENGUNJUNG =================

        $visitorTotal = Visitor::count();

        $visitorToday = Visitor::whereDate('created_at', Carbon::today())
            ->count();

        $visitorLast7Days = Visitor::where('created_at', '>=', Carbon::today()->subDays(6))
            ->get()
            ->groupBy(function ($visitor) {
                return $visitor->created_at->format('Y-m-d');
            });

        $visitorChart = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $key = $date->format('Y-m-d');

            $visitorChart[] = [
                'date' => $date->format('d M'),
                'count' => $visitorLast7Days->get($key, collect())->count(),
            ];
        }

        return view('admin.dashboard', [

            // ================= ARTIKEL =================

            'articleCount' => Article::count(),

            'latestArticles' => Article::latest()
                ->take(5)
                ->get(),


            // ================= GALERI =================

            'photoCount' => Photo::count(),

            'latestPhotos' => Photo::latest()
                ->take(9)
                ->get(),


            // ================= KATEGORI =================

            'categoryCount' => Category::count(),


            // ================= KONTAK =================
            // sementara 0 karena belum ada Contact model

            'contactCount' => 0,


            // ================= ADMIN =================

            'adminCount' => User::where('is_admin', true)->count(),

            // ================= STATISTIK PENGUNJUNG =================

            'visitorTotal' => $visitorTotal,
            'visitorToday' => $visitorToday,
            'visitorChart' => $visitorChart,
        ]);
    }
}