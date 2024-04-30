<?php

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartment_sponsorship', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Apartment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Sponsorship::class)->constrained()->cascadeOnDelete();
            $table->dateTime('expiration')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_sponsorship');
    }
};
