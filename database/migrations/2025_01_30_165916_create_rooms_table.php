<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * สร้างตาราง rooms สำหรับเก็บข้อมูลห้องพัก
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id เป็น primary key
            $table->foreignId('room_type_id')->constrained(); // คอลัมน์ room_type_id เป็น foreign key เชื่อมโยงกับตาราง room_types
            $table->string('room_number'); // คอลัมน์ room_number สำหรับเก็บหมายเลขห้อง
            $table->enum('status', ['available', 'booked', 'maintenance']); // คอลัมน์ status ใช้สำหรับแสดงสถานะของห้อง (สามารถเป็น available, booked, หรือ maintenance)
            $table->timestamps(); // สร้าง created_at และ updated_at โดยอัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     * ลบตาราง rooms ออกหากมีการ rollback migration
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms'); // ลบตาราง rooms ออก
    }
};
