<?php

    namespace App\Filters\V1;

    use Illuminate\Http\Request;
    use App\Filters\ApiFilter;


    class OtpCodeFilter extends ApiFilter{


        protected $safeParms = [
            'idOtpCode'=>['eq','lt','gt','neq','gte','lte'],
            'idUtilisateur'=>['eq','lt','gt','neq','gte','lte'],
            'Email'=>['eq'],
            'Otp'=>['eq','lt','gt','neq','gte','lte'],
            
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