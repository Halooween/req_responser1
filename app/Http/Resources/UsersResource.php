<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           
                 "id"=> (string) $this->user_id,
                "types"=> "users",
                "attributes"=> [
                    "name"=> $this->name,
                    "age"=>$this->age,
                    "image"=> $this->image,
                    "bio"=> $this->bio  
                ],
                "message" => $this->message
            ];
                 
        
    }
}
