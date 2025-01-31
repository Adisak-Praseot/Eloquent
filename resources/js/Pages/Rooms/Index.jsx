import React from "react";
import { usePage } from "@inertiajs/react";
import { Bar } from "react-chartjs-2";
import {
  Chart as ChartJS, // เรียกใช้งานโมดูล Chart.js
  CategoryScale,    // เรียกใช้งานโมดูล CategoryScale
  LinearScale,    // เรียกใช้งานโมดูล LinearScale
  BarElement,    // เรียกใช้งานโมดูล BarElement
  Title,            // เรียกใช้งานโมดูล Title
  Tooltip,      // เรียกใช้งานโมดูล Tooltip
  Legend,   // เรียกใช้งานโมดูล
} from "chart.js";
// ลงทะเบียนโมดูล Chart.js
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

export default function Index() {
  const { bookings } = usePage().props;

  console.log(bookings); // Debug ข้อมูล

  // ประมวลผลข้อมูลการจองของลูกค้า
  const bookingCounts = bookings.reduce((acc, booking) => {
    acc[booking.customer_name] = (acc[booking.customer_name] || 0) + 1;
    return acc;
  }, {});

  const chartData = {
    labels: Object.keys(bookingCounts), // รายชื่อลูกค้า
    datasets: [
      {
        label: "จำนวนครั้งที่จองห้องพัก",
        data: Object.values(bookingCounts), // จำนวนครั้งที่ลูกค้าจอง
        backgroundColor: "rgba(75, 192, 192, 0.6)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
    ],
  };

  return (
    <div className="container mx-auto p-8 bg-gray-100 min-h-screen">
      {/* ส่วนหัว */}
      <div className="text-center mb-6">

        <p className="text-gray-600 mt-2">วิเคราะห์ข้อมูลการจองห้องพักของลูกค้า</p>
      </div>

      {/* กราฟแท่ง */}
      <div className="bg-white shadow-lg rounded-lg p-6 mb-8">
        <h2 className="text-2xl font-semibold text-gray-700 mb-4">🔹 กราฟจำนวนครั้งที่ลูกค้าจองห้องพัก</h2>
        <div className="flex justify-center">
          <div className="w-full max-w-3xl">
            <Bar data={chartData} />
          </div>
        </div>
      </div>

      {/* ตารางข้อมูล */}
      <div className="bg-white shadow-lg rounded-lg p-6">
        <h2 className="text-2xl font-semibold text-gray-700 mb-4">📋 รายการการจองห้องพัก</h2>
        {Array.isArray(bookings) && bookings.length > 0 ? (
          <table className="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
              <tr className="bg-blue-500 text-white">
                <th className="py-3 px-4 text-left">ชื่อของลูกค้า</th>
                <th className="py-3 px-4 text-left">หมายเลขโทรศัพท์</th>
                <th className="py-3 px-4 text-left">หมายเลขห้อง</th>
                <th className="py-3 px-4 text-left">วันที่เช็คอิน</th>
                <th className="py-3 px-4 text-left">วันที่เช็คเอาท์</th>
              </tr>
            </thead>
            <tbody>
              {bookings.map((booking, index) => (
                <tr key={index} className="border-b hover:bg-gray-100">
                  <td className="py-3 px-4">{booking.customer_name}</td>
                  <td className="py-3 px-4">{booking.customer_phone}</td>
                  <td className="py-3 px-4">{booking.room_number}</td>
                  <td className="py-3 px-4">{booking.check_in_date}</td>
                  <td className="py-3 px-4">{booking.check_out_date}</td>
                </tr>
              ))}
            </tbody>
          </table>
        ) : (
          <p className="text-center text-gray-600">ไม่มีการจองห้องพัก</p>
        )}
      </div>
    </div>
  );
}
