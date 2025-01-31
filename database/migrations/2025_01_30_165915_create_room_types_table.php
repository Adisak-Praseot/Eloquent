<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * สร้างตาราง room_types สำหรับเก็บข้อมูลประเภทห้อง
     */
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id เป็น primary key
            $table->string('type_name'); // คอลัมน์ type_name สำหรับเก็บชื่อประเภทห้อง
            $table->text('description')->nullable(); // คอลัมน์ description สำหรับเก็บคำอธิบายประเภทห้อง (สามารถเป็นค่า null ได้)
            $table->timestamps(); // สร้าง created_at และ updated_at โดยอัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     * ลบตาราง room_types ออกหากมีการ rollback migration
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types'); // ลบตาราง room_types ออก
    }
};
