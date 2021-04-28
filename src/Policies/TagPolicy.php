<?php


namespace EscolaLms\Tags\Policies;


use EscolaLms\Core\Models\User;
use EscolaLms\Tags\Models\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Tag $tag
     * @return bool
     */
    public function update(User $user, Tag $tag)
    {
        return $user->can('update tags');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create tags');
    }

    /**
     * @param User $user
     * @param Tag $tag
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->can('delete tags');
    }
}