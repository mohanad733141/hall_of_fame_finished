<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;


class messageRepository {

    public function getPaginateMessages($paginateNum){

        return Messages::paginate($paginateNum);
    }

    public function storeMessage(array $data){

        Messages::create([
            'phone_number' => $data['phone_number'],
            'first_name' =>$data['first_name'],
            'surname_name' => $data['surname_name'],
            'gmail' => $data['gmail'],
            'first_name' =>$data['first_name'],
            'message' => $data['message'],
        ]);


    }


    public function deleteMessages($MessagesId){

        $message = Messages::find($MessagesId);

        $message->delete();


    }




}
