<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $students=Student::orderBy('created_at', 'desc')->get();
            return response()->json($students, 200);
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del request
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|email|unique:students,email',
                'phone' => 'required|string|max:9',
                'birth_date' => 'required|date|before:today',
                'user_id' => 'required|exists:users,id',
            ], [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe tener un formato válido.',
                'email.unique' => 'El correo electrónico ya está registrado.',
                'phone.required' => 'El número de teléfono es obligatorio.',
                'phone.string' => 'Debe ingresar caracteres y no número',
                'phone.max' => 'El número no debe ser mayor a 9 caracteres.',
                'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
                'birth_date.date' => 'La fecha de nacimiento debe ser válida.',
                'birth_date.before' => 'La fecha de nacimiento no puede ser futura.',
                'enrollment_date.required' => 'La fecha de inscripción es obligatoria.',
                'user_id.exists' => 'El usuario no existe en la base de datos.',
            ]);

            $student=new Student();
            $student->first_name=$request->first_name;
            $student->last_name=$request->last_name;
            $student->email=$request->email;
            $student->phone=$request->phone;
            $student->birth_date=$request->birth_date;
            $student->user_id=$request->user_id;
            $student->save();
            return response()->json(["message"=>"Estudiante Registrado correctamente"], 200);

        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Datos inválidos.",
                "errors" => $e->errors()
            ], 422);
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => [$e]
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $student=Student::find($id);
            if (!empty($student) ) {
                return response()->json($student, 200);
            } else {
                return response()->json([
                    "message"=>"Estudiante no encontrado",
                    "errors" => ["No tenemos registro del estudiante"]
                    ], 404);
            }
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Inesperado, Comuniquese con su administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try{
            // Validar los datos del request
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|email|unique:students,email,'.$id,
                'phone' => 'required|string|max:9',
                'birth_date' => 'required|date|before:today',
                'user_id' => 'required|exists:users,id',
                'status' => 'required|boolean',
            ], [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe tener un formato válido.',
                'email.unique' => 'El correo electrónico ya está registrado.',
                'phone.required' => 'El número de teléfono es obligatorio.',
                'phone.max' => 'El número no debe ser mayor a 9 caracteres.',
                'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
                'birth_date.date' => 'La fecha de nacimiento debe ser válida.',
                'birth_date.before' => 'La fecha de nacimiento no puede ser futura.',
                'enrollment_date.required' => 'La fecha de inscripción es obligatoria.',
                'user_id.exists' => 'El usuario no existe en la base de datos.',
            ]);
            $student=Student::find($id);
            if (!empty($student) ) {
                $student->first_name=$request->first_name;
                $student->last_name=$request->last_name;
                $student->email=$request->email;
                $student->phone=$request->phone;
                $student->birth_date=$request->birth_date;
                $student->user_id=$request->user_id;
                $student->status=$request->status;
                $student->save();
                return response()->json(["message"=>"Estudiante actulizado correctamente"], 200);
            } else {
                return response()->json(["message"=>"Estudiante no encontrado"], 404);
            }
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Datos inválidos.",
                "errors" => $e->errors()
            ], 422);
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" =>[ "Error en el servidor"]
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $student=Student::find($id);
            if (!empty($student) ) {
                $student->delete();
                return response()->json(["message"=>"Estudiante eliminado"], 200);
            } else {
                return response()->json(["message"=>"Estudiante no encontrado"], 404);
            }
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        }
    }
}
