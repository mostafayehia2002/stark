<?php

namespace App\Providers;

use App\Models\ContactUs;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // No changes here as no registration is needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Paginator::useBootstrapFive();
        try {
            // Check if database is connected
            DB::connection()->getPdo();

        if (Schema::hasTable('contact_us')) {
            $messagesCount = ContactUs::where('is_read', false)->latest()->get()->count();
            $messages = ContactUs::where('is_read', false)->latest()->take(5)->get();
            View::composer('*', function ($view) use ($messagesCount, $messages) {

                $view->with(['contacts_message_count' => $messagesCount, 'contacts_message' => $messages]);
            });
        }
        } catch (\Exception $e) {
            // Log or handle the exception as needed
        }
    }


}
