<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'about_us' => $this->about_us,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'fb_link' => $this->fb_link,
            'tw_link' => $this->tw_link,
            'link_appstore' => $this->link_appstore,
            'link_googleplay' => $this->link_googleplay,
            'link_appgallery' => $this->link_appgallery,
            'snapchat' => $this->snapchat,
            'tiktok' => $this->tiktok,
            'linkedin_link' => $this->linkedin_link,
            'inst_link' => $this->inst_link,
            'whatsapp' => $this->whatsapp,
        ];
    }
}
