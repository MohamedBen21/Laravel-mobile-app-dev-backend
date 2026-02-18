<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class UtilisateurFilter extends ApiFilter{


        protected $safeParms = [
            'Nom'=>['eq'],
            'Prenom'=>['eq'],
            'Email'=>['eq'],
            'Password'=>['eq'],
            'Genre'=>['eq'],
            'dateDeNaissance'=>['eq','neq','gt','lt','lte','gte'],
            'userType'=>['eq']
            

        ];

        protected $columnMap = [];

        protected $operatorMap = [

            'eq'=>'=',
            'neq'=>'!=',
            'gt'=>'>',
            'lt'=>'<',
            'gte'=>'>=',
            'lte'=>'<='


        ];



       
    }




?>