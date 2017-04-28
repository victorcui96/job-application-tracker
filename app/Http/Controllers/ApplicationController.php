<?php

namespace App\Http\Controllers;

// use the Application Model
use App\Application; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApplicationController extends Controller
{
   public function index () {
   	 $applications = Application::all();
   	 return Response::json($applications);
   }

   public function create (Request $request) {
   	 $new_app = Application::create($request->all());
   	 return Response::json(['created' => true]);

   } 

   public function show (Application $app) {
   	 return Response::json($app);
   }

   public function update (Request $request, Application $app) {
     $app->update($request->all());
     return Response::json(['updated' => true]);

   }

   public function destroy (Application $app) {
   	 $app->delete();
   	 return Response::json(['deleted' => true]);
   }
}
