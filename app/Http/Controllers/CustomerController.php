<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = \App\Customer::all();

        // Check jika data customer tidak kosong , return 200
        if (count($customer) > 0) {
            return response()->json([
                "status" => [
                    "code" => 200,
                    "response" => "Success",
                    "message" => "Success get data"
                ],
                "result" => $customer
            ]);
        } else { // jika data customer kosong , return 204
            return response()->json([
                "status" => [
                    "code" => 204,
                    "response" => "Success",
                    "message" => "No Content"
                ],
                "result" => []
            ]);
        }
    }

    public function add(Request $request)
    {
        // Check jika method-nya post , maka jalankan code create
        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'gender' => 'required',
                'married' => 'required',
                'address' => 'required',
            ]);

            $project = \App\Customer::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'gender' => $validatedData['gender'],
                'married' => $validatedData['married'],
                'address' => $validatedData['address'],
            ]);

            if (!$project) {
                return response()->json([
                    "status" => [
                        "code" => 400,
                        "response" => "Failure",
                        "message" => "Bad Request"
                    ],
                    "result" => $project->messages()
                ]);
            } else {
                return response()->json([
                    "status" => [
                        "code" => 201,
                        "response" => "Success",
                        "message" => "Success Created New Customer"
                    ],
                    "result" => []
                ]);
            }
        } else { // Check jika method bukan "post", return 405
            return response()->json([
                "status" => [
                    "code" => 405,
                    "response" => "Failed",
                    "message" => "Method not Allowed"
                ],
                "result" => []
            ]);
        }
    }

    public function get($id) // Untuk edit dan show
    {
        $customer = \App\Customer::find($id);

        // Check jika customer tidak kosong , maka return 200
        if (!empty($customer)) {
            return response()->json([
                "status" => [
                    "code" => 200,
                    "response" => "Success",
                    "message" => "Success get data"
                ],
                "result" => $customer
            ]);
        } else { // Check jika customer kosong , maka retunr 404
            return response()->json([
                "status" => [
                    "code" => 404,
                    "response" => "Error",
                    "message" => "Data Not Found"
                ],
                "result" => []
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'gender' => 'required',
                'married' => 'required',
                'address' => 'required',
            ]);

            $customer = \App\Customer::find($id);
            $customer->name = $validatedData['name'];
            $customer->email = $validatedData['email'];
            $customer->password = $validatedData['password'];
            $customer->gender = $validatedData['gender'];
            $customer->married = $validatedData['married'];
            $customer->address = $validatedData['address'];
            $customer->save();

            if (!empty($customer)) {

                return response()->json([
                    "status" => [
                        "code" => 200,
                        "response" => "Success",
                        "message" => "Success Update Data"
                    ],
                    "result" => $customer
                ]);
            } else {
                return response()->json([
                    "status" => [
                        "code" => 404,
                        "response" => "Error",
                        "message" => "Data Not Found"
                    ],
                    "result" => []
                ]);
            }
        }
    }

    public function delete($id)
    {
        $customer = \App\Customer::find($id);

        // Check jika customer tidak kosong, maka jalan kan perintah delete dan return 200
        if (!empty($customer)) {
            $customer->delete();
            return response()->json([
                "status" => [
                    "code" => 200,
                    "response" => "Success",
                    "message" => "Success delete data"
                ],
                "result" => []
            ]);
        } else { // Check jika customer kosong , maka return 404
            return response()->json([
                "status" => [
                    "code" => 404,
                    "response" => "Error",
                    "message" => "Data Not Found"
                ],
                "result" => $customer
            ]);
        }
    }
}
