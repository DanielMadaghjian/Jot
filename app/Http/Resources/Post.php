<?php //allows you to format the contact

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
                'post_id' => $this->id,
                'date' => $this->date->format('m/d/Y'),
                'subject' => $this->subject,
                'topic' => $this->topic,
                'takeaway' => $this->takeaway,
                'last_updated' => $this->updated_at->diffForHumans(), //"2 seconds ago"-example
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}