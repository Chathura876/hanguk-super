<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reportcontroller extends Controller
{
    public function dailyReport()
    {
        // Fetch the relevant data
        $profits = $this->getProfitData(today()->startOfDay(), today()->endOfDay());

        // Load the view and pass the data
        $pdf = PDF::loadView('owner.sidebar_pages.sale.Profit_report', [
            'profits' => $profits['profits'],
            'totalProfit' => $profits['totalProfit'],
            'totalExpenses' => $profits['totalExpenses'],
            'netProfit' => $profits['netProfit'],
        ]);

        return $pdf->download('daily_report.pdf'); // Or use ->stream() to display in browser
    }

    public function weeklyReport(Request $request)
    {
        $profits7Day = $this->getProfitData(today(), today()->addDays(7));

        $pdf = PDF::loadView('owner.sidebar_pages.sale.Profit_report', compact('profits7Day'));
        return $pdf->download('weekly-profit-report.pdf');
    }

    public function monthlyReport(Request $request)
    {
        $profits30Day = $this->getProfitData(today(), today()->addDays(30));

        $pdf = PDF::loadView('owner.sidebar_pages.sale.Profit_report', compact('profits30Day'));
        return $pdf->download('monthly-profit-report.pdf');
    }

    protected function getProfitData($startDate, $endDate)
    {
        // Fetch profit data
        $profits = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
            ->select(
                'order_items.order_id',
                'order_items.product_id',
                'products.product_name',
                'products.bar_code as product_barcode',
                'order_items.quantity',
                'order_items.price as selling_price',
                'stocks.stock_price',
                'order_items.discount_price as discount',
                DB::raw('((order_items.price - stocks.stock_price) - order_items.discount_price) * order_items.quantity as profit')
            )
            ->whereBetween('order_items.date', [$startDate, $endDate])
            ->get();

        // Fetch total expenses for the same period (assuming you have an expenses table)
        $totalExpenses = DB::table('expenses')
            ->whereBetween('date', [$startDate, $endDate])
            ->sum('amount'); // Adjust 'amount' to match your expenses column name

        // Calculate total profit and net profit
        $totalProfit = $profits->sum(function($profit) {
            return $profit->profit;
        });
        $netProfit = $totalProfit - $totalExpenses;

        return [
            'profits' => $profits,
            'totalProfit' => $totalProfit,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
        ];
    }



}
