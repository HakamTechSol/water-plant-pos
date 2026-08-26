<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeController extends Controller
{
    public function index()
    {

        $Employee = DB::table('employees')
            ->leftJoin('expenses', 'employees.id', '=', 'expenses.emp_id')

            ->select('employees.id', 'employees.Emp_FName', 'employees.Emp_LName', 'employees.Emp_phone', 'employees.Emp_email', 'employees.emp_salary', 'users.name', DB::raw('SUM(expenses.expense_amount) as total_expenses'))
            ->leftJoin('users', 'users.id', '=', 'employees.created_by')
            ->groupBy('employees.id', 'employees.Emp_FName', 'employees.Emp_LName', 'employees.Emp_phone', 'employees.Emp_email', 'employees.emp_salary', 'users.name')
            ->get();

        // dd($Employee);

        $data = compact('Employee');

        return view('userlist')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fname' => 'required',
            'Lname' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
            'salary' => 'required',
            'hours_per_day' => 'required',
        ]);
        $employee = new employee();
        $employee->Emp_FName = $request->input('Fname');
        $employee->Emp_LName = $request->input('Lname');
        $employee->Emp_phone = $request->input('Phone');
        $employee->Emp_Email = $request->input('Email');
        $employee->emp_salary = $request->input('salary');
        $employee->hours_per_day = $request->input('hours_per_day');
        $employee->created_by = session('user_id');
        $employee->save();
        return redirect('/userlist')->with('success', 'Employee has been Successfully added');

    }

    public function edit($id)
    {
        $employee = employee::find($id);
        return view('edituser', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'FName' => 'required',
            'LName' => 'required',
            'phone' => 'required',
            'Email' => 'required|email',
            'salary' => 'required',
            'hours_per_day' => 'required',
        ]);
        $employee = employee::find($id);
        $employee->Emp_FName = $request->input('FName');
        $employee->Emp_LName = $request->input('LName');
        $employee->Emp_phone = $request->input('phone');
        $employee->Emp_Email = $request->input('Email');
        $employee->emp_salary = $request['salary'];
        $employee->hours_per_day = $request->input('hours_per_day');
        $employee->created_by = session('user_id');
        $employee->update();
        return redirect()->back()->with('success', 'Employee has been Successfully added');
    }

    public function destroy($id)
    {
        //    $id= $request->id;
        try {
            $category_del = DB::delete('delete from employees where id = ?', [$id]);
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
}
