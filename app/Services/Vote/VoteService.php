<?php

namespace App\Services\Vote;

use App\Models\User;
use App\Repositories\Vote\VoteRepository;
use App\Core\Interfaces\VoteableInterface;
use App\Services\Vote\VoteServiceInterface;

class VoteService implements VoteServiceInterface
{
    protected $voteRepo;

    public function __construct(VoteRepository $voteRepo)
    {
        $this->voteRepo = $voteRepo;
    }

    /**
     * لیست تمام امتیازبندهی
     * @param array $filters
     * @return Paginator
     */
    public function list(array $filters)
    {
        return
            $this->voteRepo->query()
            ->filterBy($filters)
            ->paginate();
    }

    /**
     * ثبت امتیاز
     * @param VoteableInterface $voteable
     * @param string $ipv4
     * @param int $vote
     * @param User $user
     * @return void 
     */
    public function create(
        VoteableInterface $voteable,
        string $ipv4,
        int $vote,
        User $user = null
    ): void {
        $this->voteRepo->query()
            ->updateOrCreate([
                "voteable_id" => $voteable->viewable_id,
                "voteable_type" => $voteable->viewable_type,
                "user_id" => optional($user)->id,
                "ipv4" => $ipv4
            ], [
                "vote" => $vote
            ]);
    }
}
