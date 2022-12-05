<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('items_id');

            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('items_id')->references('id')->on('items')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function store(Request $r) {
        $items = new Items($r→all());
        $items->productos()->attach($r->productos);
        $items->save();
    }
    
    public function update(Request $r, $id) {
        $items = Items::find($id);
        $items->fill($r->all());
        $items->productos()->sync($r->productos);
        $items->save();
    }
       
    public function destroy($id) {
        $items = Items::find($id);
        $items->productos()->detach();
        $items->delete();
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_items');
    }
};
