<?php

namespace App\Listeners;

use App\Events\AdWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdCheck
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdWasCreated  $event
     * @return void
     */
    public function handle(AdWasCreated $event)
    {
        $needsave=0;
        if(strpos($event->ad->text, 'дурак')!==false){
            $event->ad->text = str_replace('дурак','***', $event->ad->text);

$needsave=1;
        }
        if(strpos($event->ad->title, 'дурак')!==false){
            $event->ad->title = str_replace('дурак','***', $event->ad->title);
            $needsave=1;
    }
    if($needsave==1){
        $event->ad->save();
        }
    }
}
