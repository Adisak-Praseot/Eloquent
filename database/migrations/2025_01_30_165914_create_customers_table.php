<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * สร้างตาราง customers สำหรับเก็บข้อมูลลูกค้า
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id เป็น primary key
            $table->string('name'); // คอลัมน์ name สำหรับเก็บชื่อของลูกค้า
            $table->string('email')->unique(); // คอลัมน์ email สำหรับเก็บอีเมล โดยต้องไม่ซ้ำกับอีเมลอื่น
            $table->string('phone')->nullable(); // คอลัมน์ phone สำหรับเก็บหมายเลขโทรศัพท์ (สามารถเป็นค่า null ได้)
            $table->text('address')->nullable(); // คอลัมน์ address สำหรับเก็บที่อยู่ (สามารถเป็นค่า null ได้)
            $table->timestamps(); // สร้าง created_at และ updated_at โดยอัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     * ลบตาราง customers ออกหากมีการ rollback migration
     */
    public function down(): void
    {
        Schema::dropIfExists('customers'); // ลบตาราง customers ออก
    }
};
