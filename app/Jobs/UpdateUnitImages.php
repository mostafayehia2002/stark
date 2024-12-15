<?php
namespace App\Jobs;

use App\Models\Unit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UpdateUnitImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Unit $unit;
    /**
     * Create a new job instance.
     *
     * @param Unit $unit

     */
    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // Delete old images from storage and database
        foreach ($this->unit->images as $oldImage){
            // Delete the image file from storage
            if (Storage::disk('public')->exists($oldImage->url)) {
                Storage::disk('public')->delete($oldImage->url);
            }
            // Delete the image record from the database
            $oldImage->delete();
        }
    }

}
