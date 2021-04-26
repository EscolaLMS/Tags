<?php


namespace EscolaLms\Tags\Repository\Contracts;


use EscolaLms\Core\Repositories\Contracts\BaseRepositoryContract;
use EscolaLms\Tags\Dto\TagDto;

interface TagRepositoryContract extends BaseRepositoryContract
{
    public function insert(TagDto $tagDto);
}