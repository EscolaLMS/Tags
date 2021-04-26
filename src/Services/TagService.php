<?php

namespace EscolaLms\Tags\Services;

use EscolaLms\Tags\Repository\Contracts\TagRepositoryContract;
use EscolaLms\Tags\Services\Contracts\TagServiceContract;

class TagService implements TagServiceContract
{
    protected TagRepositoryContract $tagRepositoryContract;

    public function __construct(
        TagRepositoryContract $tagRepositoryContract
    )
    {
        $this->tagRepositoryContract = $tagRepositoryContract;
    }

    public function insert($tagDto)
    {
        $tags = collect();
        foreach ($tagDto->getTags() as $tag) {
            if (isset($tag['title']) and $tag['title']) {
                $tagData = [
                    'morphable_id' => $tagDto->getModelId(),
                    'morphable_type' => $tagDto->getModelName(),
                    'title' => $tag['title']
                ];
                $tags->push($this->tagRepositoryContract->insert($tagData));
            }
        }
        return $tags;
    }
}