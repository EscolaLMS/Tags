<?php

namespace EscolaLms\Tags\Http\Controllers;

use EscolaLms\Core\Http\Controllers\EscolaLmsBaseController;
use EscolaLms\Tags\Dto\TagDto;
use EscolaLms\Tags\Http\Request\TagInsertRequest;
use EscolaLms\Tags\Http\Request\TagRemoveRequest;
use EscolaLms\Tags\Http\Resources\TagResource;
use EscolaLms\Tags\Models\Tag;
use EscolaLms\Tags\Repository\Contracts\TagRepositoryContract;
use EscolaLms\Tags\Services\Contracts\TagServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagsAPIController extends EscolaLmsBaseController
{
    private TagServiceContract $tagService;
    private TagRepositoryContract $tagRepository;

    public function __construct(
        TagServiceContract $tagService,
        TagRepositoryContract $tagRepository
    )
    {
        $this->tagService = $tagService;
        $this->tagRepository = $tagRepository;
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

    /**
     * Display a listing of the Tag.
     * GET|HEAD /tags
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $tags = $this->tagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return TagResource::collection($tags)->response();
    }

    /**
     * Display the specified Tag.
     * GET|HEAD /tags/{tag}
     *
     * @param $id
     * @return JsonResponse
     */
    public function show(Tag $tag): JsonResponse
    {
        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }
        return (new TagResource($tag))->response();
    }

    /**
     * @param TagRemoveRequest $tagRemoveRequest
     */
    public function destroy(TagRemoveRequest $tagRemoveRequest): JsonResponse
    {
        return $this->tagService->removeTags($tagRemoveRequest->input('tags')) ?
            response()->json(null, 200) :
            response()->json(null, 500);
    }
}

