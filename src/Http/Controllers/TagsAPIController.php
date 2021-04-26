<?php

namespace EscolaLms\Tags\Http\Controllers;

use EscolaLms\Core\Http\Controllers\EscolaLmsBaseController;
use EscolaLms\Tags\Dto\TagDto;
use EscolaLms\Tags\Http\Request\TagInsertRequest;
use EscolaLms\Tags\Http\Resources\TagResource;
use EscolaLms\Tags\Services\Contracts\TagServiceContract;
use Illuminate\Http\JsonResponse;

class TagsAPIController extends EscolaLmsBaseController
{
    private TagServiceContract $tagService;

    public function __construct(
        TagServiceContract $tagService
    )
    {
        $this->tagService = $tagService;
    }

    /**
     * @param TagInsertRequest $tagInsertRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TagInsertRequest $tagInsertRequest) : JsonResponse
    {
        $tagDto = new TagDto($tagInsertRequest);
        $tags = $this->tagService->insert($tagDto);
        return TagResource::collection($tags)->response();
    }
}

