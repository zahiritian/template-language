<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yaml;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the application dashboard.
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getResult(Request $request)
    {
        try {
            $file = base_path('file.yaml');
            if ($request->has('templateInput') && $request->has('dataInput')) {
                $value = $request->dataInput;

                if ($request->dataInput == 'true') {
                    $value = true;
                } elseif ($request->dataInput == 'false') {
                    $value = false;
                }

                $yaml = Yaml::dump([$request->templateInput => $value]);
                file_put_contents($file, $yaml);
            }

            $yamlContents = Yaml::parse(file_get_contents($file));

            return response()->json($yamlContents);
        } catch (\Exception $e) {
            return response()->json('An error occurred', 500);
        }
    }
}
