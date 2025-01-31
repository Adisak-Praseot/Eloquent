<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * สร้างตาราง bookings สำหรับเก็บข้อมูลการจองห้องพัก
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id เป็น primary key
            $table->foreignId('customer_id')->constrained(); // คอลัมน์ customer_id เป็น foreign key เชื่อมโยงกับตาราง customers
            $table->foreignId('room_id')->constrained(); // คอลัมน์ room_id เป็น foreign key เชื่อมโยงกับตาราง rooms
            $table->date('check_in_date'); // คอลัมน์วันที่เช็คอิน
            $table->date('check_out_date'); // คอลัมน์วันที่เช็คเอาท์
            $table->timestamps(); // สร้าง created_at และ updated_at โดยอัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     * ลบตาราง bookings ออกหากมีการ rollback migration
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings'); // ลบตาราง bookings ออก
    }
};
