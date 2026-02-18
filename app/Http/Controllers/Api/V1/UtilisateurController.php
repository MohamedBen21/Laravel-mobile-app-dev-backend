<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Utilisateur;
use App\Http\Requests\V1\StoreUtilisateurRequest;
use App\Http\Requests\V1\UpdateUtilisateurRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UtilisateurResource;
use App\Http\Resources\V1\UtilisateurCollection;
use App\Filters\V1\UtilisateurFilter;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Magasinier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Adress;
use Illuminate\Validation\Rule;
use App\Models\ShoppingCartItem;
use App\Models\Magasin;
use App\Models\Review;
use App\Models\Cart;
use App\Http\Controllers\Api\V1\ModelNotFoundException;
use Exception;

class UtilisateurController extends Controller
{

   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UtilisateurFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new UtilisateurCollection(Utilisateur::paginate()) ;
        }else{

            $utilisateurs= Utilisateur::where($queryItems)->paginate();

            return new UtilisateurCollection($utilisateurs->appends($request->query()));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUtilisateurRequest $request)
    {
        return new UtilisateurResource(Utilisateur::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        return new UtilisateurResource($utilisateur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUtilisateurRequest $request, Utilisateur $utilisateur)
    {
        $utilisateur->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }


    public function registerationGoogle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'exists:utilisateurs,Email']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $otp = mt_rand(1000, 9999);
        $us = Utilisateur::where('Email',$request->email)->first();
        
        $usid = $us->idUtilisateur;
        OtpCode::create([
            'idUtilisateur'=>$usid,
            'Email'=> $request->email,
            'Otp'=> $otp
        ]);
        //$request->session()->put('otp', $otp);
        
        Mail::raw('Hello your OTP code is : ' . $otp, function ($message) use ($request) {
            $message->to($request->email)->subject('Verify your email with an OTP code');
        });

        return response()->json(['message' => 'OTP sent to your email'], 200);
    }


    public function verifyEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'exists:utilisateurs,email'],
            'otp' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $storedOTP = OtpCode::where('Email',$request->email)->first()->Otp;


        if ($request->otp != $storedOTP) {
            return response()->json(['error' => 'Invalid OTP'], 422);
        }


        $utilisateur = Utilisateur::where('email', $request->email)->first();

        $token = $utilisateur->createToken('user_verification')->plainTextToken;

        return response()->json(['message' => 'Email verified Successfully', 'token' => $token], 200);
    }

    public function Register(Request $request)
    {
        $rules = [
            'Nom' => ['required', 'string'],
            'Prenom' => ['required', 'string'],
            'Email' => ['required', 'string', 'email','unique:utilisateurs,email'],
            'Password' => ['required', 'string'],
            'Genre' => ['required', 'string', Rule::in(['Male', 'Female'])],
            'dateDeNaissance' => ['required', 'date'],
            'userType' => ['required', 'string', Rule::in(['Client', 'Magasinier', 'Admin'])],
        ];

        $userType = $request->input('userType');

        if ($userType === 'Client') {
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
            $rules['clientImage'] = ['required', 'image','mimes:jpeg,png,jpg,gif','max:2048']; 
            $rules['postalCode'] = ['required', 'integer']; 
            $rules['Region'] = ['required', 'string']; 
            $rules['streetLine'] = ['required', 'string']; 
            $rules['houseNumber'] = ['required', 'integer']; 
            $rules['City'] = ['required', 'string']; 
            $rules['Country'] = ['required', 'string']; 

        } elseif ($userType === 'Admin') {
            $rules['Role'] = ['required', 'string'];
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
        } elseif ($userType === 'Magasinier') {
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
            $rules['imageMagasinier'] = ['required', 'image','mimes:jpeg,png,jpg,gif','max:2048']; 
            $rules['postalCode'] = ['required', 'integer']; 
            $rules['Region'] = ['required', 'string']; 
            $rules['streetLine'] = ['required', 'string']; 
            $rules['houseNumber'] = ['required', 'integer']; 
            $rules['City'] = ['required', 'string']; 
            $rules['Country'] = ['required', 'string']; 
        }

        $validator = Validator::make($request->all(),$rules);
        
        // $validator = Validator::make($request->all(), [
        //     'Nom' => ['required', 'string'],
        //     'Prenom' => ['required', 'string'],
        //     'Email' => ['required', 'string', 'email','unique:utilisateurs,email'],
        //     'Password' => ['required', 'string'],
        //     'Genre' => ['required', 'string','in:Male,Female'],
        //     'dateDeNaissance' => ['required'],
        //     // 'numTel' => ['required', 'integer'],
        //     'userType' => ['required', 'string', 'in:Client,Magasinier,Admin'],
        // ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        $imagePath = null;
    if ($request->hasFile('clientImage')) {
        $image = $request->file('clientImage');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    } elseif ($request->hasFile('imageMagasinier')) {
        $image = $request->file('imageMagasinier');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    }


        $utilisate = Utilisateur::create([
            'Nom'=>$request->Nom,
            'Prenom'=>$request->Prenom,
            'Email'=>$request->Email,
            'Password'=>Hash::make($request->Password),
            'Genre'=>$request->Genre,
            'dateDeNaissance'=>$request->dateDeNaissance,
            'numTel'=>$request->numTel,
            'userType'=>$request->userType,

        ]);
        $idUtilisateur = $utilisate->idUtilisateur;


        if ($userType === 'Client'){
            $adr = Adress::create([
                'postalCode'=>$request->postalCode,
                'Region'=>$request->Region,
                'streetLine'=>$request->streetLine,
                'houseNumber'=>$request->houseNumber,
                'City'=>$request->City,
                'Country'=>$request->Country,
            ]);
            $idAdr =$adr->idAdress; 


            // if ($request->hasFile('clientImage')) {
            //     $imagePath = $request->file('clientImage')->store('images'); 
            // } else {
            //     $imagePath = null; 
            // }
            
            Client::create([
                'idUtilisateur'=>$idUtilisateur,
                'idAdress'=>$idAdr,
                'Username'=>$request->Username,
                'clientImage'=>$imagePath,
                'buysCount'=>0
            ]);
        return response()->json(['Message'=>'Utilisateur and Client are created successfully'], 200);
        }elseif($userType === 'Admin'){
            Admin::create([
                'idUtilisateur'=>$idUtilisateur,
                'Role'=>$request->Role,
                'Username'=>$request->Username
            ]);
        return response()->json(['Message'=>'Utilisateur and Admin are created successfully'], 200);
        }elseif($userType === 'Magasinier'){
            $adr = Adress::create([
                'postalCode'=>$request->postalCode,
                'Region'=>$request->Region,
                'streetLine'=>$request->streetLine,
                'houseNumber'=>$request->houseNumber,
                'City'=>$request->City,
                'Country'=>$request->Country,
            ]);
            $idAdr =$adr->idAdress; 

            Magasinier::create([
                'idUtilisateur'=>$idUtilisateur,
                'idAdress'=>$idAdr,
                'Username'=>$request->Username,
                'imageMagasinier'=>$imagePath,
                'salesCount'=>0,
                'isValid'=>0
                

            ]);
            return response()->json(['Message'=>'Utilisateur and Magasinier are created successfully'], 200);
        }

         
    }


    public function Login(Request $request){
        $validator = Validator::make($request->all(), [
            'Email' => ['required', 'string', 'email', 'exists:utilisateurs,email'],
            'Password' => ['required', 'string']
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid credentials'], 422);
        }
    
        $utilisateur = Utilisateur::where('Email', $request->Email)->first();
    
        if (!$utilisateur) {
            return response()->json(['error' => ' Account does not exist '], 422);
        } else {
            if (!Hash::check($request->Password, $utilisateur->Password)) {
                return response()->json(['error' => 'Invalid credentials'], 422);
            } else {
                $token = $utilisateur->createToken('user_logged')->plainTextToken;
                return response()->json(['message' => 'User logged in successfully','token'=>$token], 200);

            }
        }

        
    }


    // public function logout($idUtilisateur){
    //     $utilisateur = Utilisateur::where('idUtilisateur',$idUtilisateur);
    //     $utilisateur->tokens()->delete();
        
    // }

    function Logout($idUtilisateur) {
        try {
          $utilisateur = Utilisateur::findOrFail($idUtilisateur);
          $utilisateur->tokens()->delete();
      
          return response()->json(['message' => 'Successfully logged out!'], 200);
        } catch (Exception $e) {
          return response()->json(['error' => 'User not found!'], 404);
        }
      }


    public function ShowReviews(Request $request){
        $review = Review::where('idClient',$request->idClient);
    }
    

    // public function AddToCart(Request $request){

    //     if(!$request->idCart){
    //        $cart = Cart::create([
    //             "idClient"=>$request->idClient
    //         ]);

    //         ShoppingCartItem::create([
    //             "idCart"=>$cart->idCart,
    //             "idProductItem"=>$cart->idProductItem,
    //             "qteProd"=>$cart->qteProd,

    //         ]);
    //     }else{
    //         ShoppingCartItem::create([
    //             "idCart"=>$request->idCart,
    //             "idProductItem"=>$cart->idProductItem,
    //             "qteProd"=>$cart->qteProd,

    //         ]);
    //     }



    //}


    public function DeleteProductFromCart( $idProductItem){
        $cartItem = ShoppingCartItem::where('idProductItem',$idProductItem)->delete();

        return response()->json(['message'=>'Item deleted successfully from the cart'], 200);
    }

    public function countClient(){

        $nbrClient = Client::count();

         return response()->json(['countClient' => $nbrClient]);
    }
    public function countMagasinier(){

        $nbrMagasinier = Magasinier::count();

         return response()->json(['countMagasinier' => $nbrMagasinier]);
    }

    public function countMagasin(){

        $nbrMagasin = Magasin::count();

         return response()->json(['countMagasin' => $nbrMagasin]);
    }

    public function deleteClient($idClient){
        $result = Client::where('idClient',$idClient)->delete();
        if(!$result){

            return ["message"=>"this Client is no longer existing"];
            

        }else{
            return ["message"=>"this Client has been deleted"];
        }
    }

    public function deleteMagasinier($idMagasinier){
        $result = Magasinier::where('idMagasinier',$idMagasinier)->delete();
        if(!$result){

            return ["message"=>"this Magasinier is no longer existing"];
            

        }else{
            return ["message"=>"this Magasinier has been deleted"];
        }
    }



    public function RegisterationWithFacebook(Request $request)
    {
        $rules = [
            'Nom' => ['required', 'string'],
            'Prenom' => ['required', 'string'],
            'Email' => ['required', 'string', 'email','unique:utilisateurs,email'],
            'Password' => ['required', 'string'],
            'Genre' => ['required', 'string', Rule::in(['Male', 'Female'])],
            'dateDeNaissance' => ['required', 'date'],
            'userType' => ['required', 'string', Rule::in(['Client', 'Magasinier', 'Admin'])],
        ];

        $userType = $request->input('userType');

        if ($userType === 'Client') {
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
            $rules['clientImage'] = ['required', 'string']; 
            $rules['postalCode'] = ['required', 'integer']; 
            $rules['Region'] = ['required', 'string']; 
            $rules['streetLine'] = ['required', 'string']; 
            $rules['houseNumber'] = ['required', 'integer']; 
            $rules['City'] = ['required', 'string']; 
            $rules['Country'] = ['required', 'string']; 

        } elseif ($userType === 'Admin') {
            $rules['Role'] = ['required', 'string'];
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
        } elseif ($userType === 'Magasinier') {
            $rules['Username'] = ['required', 'string','unique:clients,Username','unique:admins,Username','unique:magasiniers,Username'];
            $rules['postalCode'] = ['required', 'integer']; 
            $rules['Region'] = ['required', 'string']; 
            $rules['streetLine'] = ['required', 'string']; 
            $rules['houseNumber'] = ['required', 'integer']; 
            $rules['City'] = ['required', 'string']; 
            $rules['Country'] = ['required', 'string']; 
        }

        $validator = Validator::make($request->all(),$rules);
        
        // $validator = Validator::make($request->all(), [
        //     'Nom' => ['required', 'string'],
        //     'Prenom' => ['required', 'string'],
        //     'Email' => ['required', 'string', 'email','unique:utilisateurs,email'],
        //     'Password' => ['required', 'string'],
        //     'Genre' => ['required', 'string','in:Male,Female'],
        //     'dateDeNaissance' => ['required'],
        //     // 'numTel' => ['required', 'integer'],
        //     'userType' => ['required', 'string', 'in:Client,Magasinier,Admin'],
        // ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }


        $utilisate = Utilisateur::create([
            'Nom'=>$request->Nom,
            'Prenom'=>$request->Prenom,
            'Email'=>$request->Email,
            'Password'=>Hash::make($request->Password),
            'Genre'=>$request->Genre,
            'dateDeNaissance'=>$request->dateDeNaissance,
            'numTel'=>$request->numTel,
            'userType'=>$request->userType,

        ]);
        $idUtilisateur = $utilisate->idUtilisateur;


        if ($userType === 'Client'){
            $adr = Adress::create([
                'postalCode'=>$request->postalCode,
                'Region'=>$request->Region,
                'streetLine'=>$request->streetLine,
                'houseNumber'=>$request->houseNumber,
                'City'=>$request->City,
                'Country'=>$request->Country,
            ]);
            $idAdr =$adr->idAdress; 


            // if ($request->hasFile('clientImage')) {
            //     $imagePath = $request->file('clientImage')->store('images'); 
            // } else {
            //     $imagePath = null; 
            // }
            
            Client::create([
                'idUtilisateur'=>$idUtilisateur,
                'idAdress'=>$idAdr,
                'Username'=>$request->Username,
                'clientImage'=>$request->clientImage,
                'buysCount'=>0
            ]);
        return response()->json(['Message'=>'Utilisateur and Client are created successfully'], 200);
        }elseif($userType === 'Admin'){
            Admin::create([
                'idUtilisateur'=>$idUtilisateur,
                'Role'=>$request->Role,
                'Username'=>$request->Username
            ]);
        return response()->json(['Message'=>'Utilisateur and Admin are created successfully'], 200);
        }elseif($userType === 'Magasinier'){
            $adr = Adress::create([
                'postalCode'=>$request->postalCode,
                'Region'=>$request->Region,
                'streetLine'=>$request->streetLine,
                'houseNumber'=>$request->houseNumber,
                'City'=>$request->City,
                'Country'=>$request->Country,
            ]);
            $idAdr =$adr->idAdress; 

            Magasinier::create([
                'idUtilisateur'=>$idUtilisateur,
                'idAdress'=>$idAdr,
                'Username'=>$request->Username,
                'salesCount'=>0

            ]);
            return response()->json(['Message'=>'Utilisateur and Magasinier are created successfully'], 200);
        }

         
    }
}