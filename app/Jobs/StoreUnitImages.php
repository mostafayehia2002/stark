<?php

namespace App\Jobs;

use App\Models\Unit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreUnitImages implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public Unit $unit;
    public array $images;

    /**
     * Create a new job instance.
     *
     * @param Unit $unit
     * @param array $images
     */
    public function __construct(Unit $unit, array $images)
    {
        $this->unit = $unit;
        $this->images = $images;
    }

    /**
     * Execute the job.
     */

    public function handle():void
    {

        $this->unit->images()->createMany(array_map(function ($image) {
            return ['url' => $image];
        }, $this->images));
    }
}
