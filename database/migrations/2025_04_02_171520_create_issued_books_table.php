<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('issued_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->timestamp('issue_date')->useCurrent();
            $table->timestamp('return_date')->nullable();
            $table->boolean('ReturnStatus')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('issued_books');
    }
};



?>
