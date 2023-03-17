<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Imports\ExpenseImport;
use App\Models\Expense;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ExpenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */

    public function index(Request $request)
    {
        $expense = QueryBuilder::for(Expense::class)
        ->allowedFilters([
            AllowedFilter::scope('from'),AllowedFilter::scope('to'),AllowedFilter::scope('min'),AllowedFilter::scope('max'),'merchant','status'
        ])
        ->get();
        //$expense = Expense::latest()->get();
        $totalN = 0;
        foreach ($expense as $item) {
            $totalN += $item->total;
        }
        return view('index', compact('expense', 'totalN'));
    }

    public function store(Request $request)
    {
        $expenseFields = $request->validate([
            'date' => 'required',
            'merchant' => 'required',
            'total' => 'required',
            'comment' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $request->image->extension();
            $image->move(public_path('receipt'), $filename);

            $image = $filename;
        }
        $expense = Expense::create([
            'date' => $request->date,
            'merchant' => $request->merchant,
            'total' => $request->total,
            'comment' => $request->comment,
            'image' => isset($image) ? $image : '',
        ]);
        $expense->save();
        return redirect('/')->with('status', 'Expense added Successfully!');
    }

    public function update(Request $request, Expense $expense)
    {
        $expenseFields = $request->validate([
            'date' => 'required',
            'merchant' => 'required',
            'total' => 'required',
            'comment' => 'required',
        ]);
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $request->image->extension();
            $image->move(public_path('receipt'), $filename);

            $image = $filename;
            $expenseFields['image'] = $image;
        }
        $expense->update($expenseFields);
        return redirect('/')->with('status', 'Expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/')->with('status', 'Expense deleted successfully!');
    }

    public function importExpense(Request $request)
    {
        Excel::import(new ExpenseImport, $request->file('file'));
        return redirect('/')->with('status', 'Expense imported successfully!');
    }
}
