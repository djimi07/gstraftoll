<?php

namespace App\Listeners;

use App\Models\Enums\NotificationStatus;
use App\Models\Notification;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\View;

class UserAuthenticated
{
    public function __construct()
    {
    }

    public function handle(Authenticated $authenticated): void
    {
        //dd($authenticated->user);
        $user = $authenticated->user;
         // get all data from menu.json file
        $filePathVertical = resource_path('navs/' . strtolower($user->role['name']) . '-vertical.php');


        $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        $verticalMenuData = $verticalMenuJson;


        $verticalMenuData = file_exists($filePathVertical)
            ? json_decode(require $filePathVertical,false)
            : json_decode($verticalMenuData);







//        $total_notifications = Notification::query()
//            ->where('receiver_id', $user['id'])
//            ->where('status', NotificationStatus::PENDING->value)
//            ->count();

        // Share below data to all rendered views
        View::share([

            'menuData' => [$verticalMenuData],
            //'total_notifications' => $total_notifications,
//            'top_notifications' => Notification::query()
//                ->where('receiver_id', $user['id'])
//                ->where('status', NotificationStatus::PENDING->value)
//                ->orderByDesc('notification_id')
//                ->limit(5)
//                ->get()
        ]);
    }
}
