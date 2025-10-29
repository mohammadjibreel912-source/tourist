<?php

namespace App\Providers;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;
use Illuminate\Support\Facades\View;
use App\Models\Spot;
use App\Models\User;
use App\Models\Payment;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
  public function register(): void
{
    $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admim.index', function ($view) {

        $totalSpots = Spot::count();
        $totalUsers = User::count();
        $totalTickets = Payment::count();
        $dailyRevenue = Payment::whereDate('created_at', now())->sum('amount');
        $monthlyRevenue = Payment::whereMonth('created_at', now()->month)->sum('amount');

        // بيانات للرسوم البيانية الشهرية
        $monthlyRevenueChart = Payment::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $view->with([
            'totalSpots' => $totalSpots,
            'totalUsers' => $totalUsers,
            'totalTickets' => $totalTickets,
            'dailyRevenue' => $dailyRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'monthlyRevenueChart' => $monthlyRevenueChart,
        ]);
    });
    }
}
