<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Settings;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\CategoryResource;

class ChannelResource extends JsonResource
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
            'id'                => $this->id,
            'code'              => $this->code,
            'name'              => $this->name,
            'description'       => $this->description,
            'timezone'          => $this->timezone,
            'theme'             => $this->theme,
            'hostname'          => $this->hostname,
            'logo'              => $this->logo,
            'logo_url'          => $this->logo_url,
            'favicon'           => $this->favicon,
            'favicon_url'       => $this->favicon_url,
            'locales'           => $this->locales,
            'default_locale'    => $this->when($this->default_locale_id, new LocaleResource($this->default_locale)),
            'base_currency'     => $this->when($this->default_currency_id, new CurrencyResource($this->default_currency)),
            'root_category_id'  => $this->root_category_id,
            'root_category'     => $this->when($this->root_category_id, new CategoryResource($this->root_category)),
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
