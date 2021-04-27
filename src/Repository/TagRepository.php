<?php


namespace EscolaLms\Tags\Repository;


use EscolaLms\Core\Repositories\BaseRepository;
use EscolaLms\Tags\Dto\TagDto;
use EscolaLms\Tags\Models\Tag;
use EscolaLms\Tags\Repository\Contracts\TagRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class TagRepository extends BaseRepository implements TagRepositoryContract
{

    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'title'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable() : array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     * @return string
     */
    public function model() : string
    {
        return Tag::class;
    }

    /**
     * @param array $tagData
     * @return Tag
     */
    public function insert(array $tagData) : Tag
    {
        return $this->model->create($tagData);
    }

    /**
     * @param string $column
     * @param array $payload
     * @return bool|null
     */
    public function deleteWhereIn(string $column, array $payload): ?bool
    {
        return $this->model->newQuery()->whereIn($column, $payload)->delete();
    }
}