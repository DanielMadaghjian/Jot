<?php //allows you to format the contact

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'contact_id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'birthday' => $this->birthday->format('m/d/Y'),
                'company' => $this->company,
                'subject' => $this->subject,
                'location' => $this->location,
                'description' => $this->description,
                'image' => $this->image,
                'last_updated' => $this->updated_at->diffForHumans(), //"2 seconds ago"-example
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
