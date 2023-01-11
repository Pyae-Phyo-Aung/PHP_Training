<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $studentInterface;

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }
    
    public function student()
    {
        return view('api.student');
    }
    public function major()
    {
        return view('api.major');
    }
}
