<?php
namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $timeAgo = Carbon::parse($this->created_at)->diffForHumans();

        $dataArray = [
            'id'    => $this->id,
            'title' => $this->data['title'],
            'body' => $this->data['body'],
            'type'  => class_basename($this->type),
            'date'  => $timeAgo,
        ];
        // Define the keys you want to include
        $keys = ['order', 'post', 'comment', 'user', 'receive'];

        // Add non-null values to the array
        foreach ($keys as $key) {
            if (isset($this->data[$key])) {
                $dataArray[$key] = $this->data[$key];
            }
        }

        return $dataArray;
    }
}
