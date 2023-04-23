<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Support\Facades\Auth;


class announcementRepository {

    public function getPaginateAnnouncement($paginateNum){

        return Announcements::paginate($paginateNum);
    }

    public function getAllAnnouncement(){

        return Announcements::all();
    }

    public function storeAnnouncement(array $data){



        Announcements::create([
            'announcements_title' => $data['announcements_title'],
            'announcements_description' =>$data['announcements_description'],
            'user_id' => $data['user_id'],
        ]);
    }


    public function updateAnnouncement( $id, array $data){


        Announcements::find($id)->update([
            'announcements_title' => $data['announcements_title'],
            'announcements_description' =>$data['announcements_description'],
            'user_id' => $data['user_id'],
        ]);


    }

    public function editAnnouncement($id){

        return Announcements::find($id);
    }


    public function deleteMessages($AnnouncementId){

        $message = Announcements::find($AnnouncementId);

        $message->delete();


    }



}


